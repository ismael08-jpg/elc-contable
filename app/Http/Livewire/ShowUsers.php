<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Usuario;

class ShowUsers extends Component
{
    public $message = "Esto se buscar";

    public function render()
    {
        $usuarios = Usuario::all(); 
        return view('livewire.show-users', compact('usuarios'))
        ->layout('layouts.master');
    }
}
