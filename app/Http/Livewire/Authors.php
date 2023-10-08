<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Authors extends Component
{
    public function render()
    {
        return view('livewire.authors', [
            'authors' => User::where('id', '!=', auth()->id())->get(),
        ]);
    }
}
