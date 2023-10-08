<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Authors extends Component
{
    public $name, $email, $username, $author_type, $direct_publisher;
    protected $listeners = [
        'resetForms'
    ];
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
            'username' => 'required|unique:users,username|min:6|max|20',
            'author_type' => 'required',
            'direct_publisher' => 'required',
        ], [
            'author_type.required' => 'Escolha o tipo de autor',
            'direct_publisher.required' => 'Especifique os acessos de publicação do autor',
        ]);
    }
    public function render()
    {
        return view('livewire.authors', [
            'authors' => User::where('id', '!=', auth()->id())->get(),
        ]);
    }
}
