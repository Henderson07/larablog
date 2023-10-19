<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Nette\Utils\Random;
use Illuminate\Support\Facades\Mail;
use Livewire\WithPagination;

class Authors extends Component
{
    use WithPagination;
    public $name, $email, $username, $author_type, $direct_publisher;
    public $search;
    public $perPage = 4;
    protected $listeners = [
        'resetForms'
    ];
    public function mount()
    {
        $this->resetPage();
    }
    public function updatingSearch(){
        $this->resetPage();
    }
    public function resetForms()
    {
        $this->name = $this->email = $this->username = $this->author_type = $this->direct_publisher = null;
        $this->resetErrorBag();
    }
    public function addAuthor()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username|min:6|max:20',
            'author_type' => 'required',
            'direct_publisher' => 'required',
        ], [
            'author_type.required' => 'Escolha o tipo de autor',
            'direct_publisher.required' => 'Especifique os acessos de publicação do autor',
        ]);

        // if ($this->isOnline()) {
        $default_password = Random::generate(8);

        $author = new User();
        $author->name = $this->name;
        $author->email = $this->email;
        $author->username = $this->username;
        $author->password = Hash::make($default_password);
        $author->type = $this->author_type;
        $author->direct_publish = $this->direct_publisher;
        $saved = $author->save();

        $data = array([
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'password' => $default_password,
            'url' => route('author.profile'),
        ]);

        $author_email = $this->email;
        $author_name = $this->name;

        if ($saved) {
            // Mail::send('emails.new-author-email-template', $data, function ($message) use ($author_email, $author_name) {
            //     $message->from('noreply@example.com', 'Blog');
            //     $message->to($author_email, $author_name)
            //         ->subject('Criação de conta');
            // });

            session()->flash('success', 'Novo autor criado com sucesso');
            $this->name = $this->email = $this->username = $this->author_type = $this->direct_publisher = null;
            $this->dispatchBrowserEvent('hide_add_author_modal');
        } else {
            session()->flash('error', 'Algo deu errado');
        }
        // } else {
        //     session()->flash('error', 'Você está offline, verifique sua conexão e tente novamente mais tarde.');
        // }
    }
    public function render()
    {
        return view('livewire.authors', [
            'authors' => User::search(trim($this->search))->where('id', '!=', auth()->id())->paginate($this->perPage),
        ]);
    }
}
