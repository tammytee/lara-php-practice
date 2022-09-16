<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Chirps extends Component
{
    public function render()
    {
        return view('livewire.chirps')
            ->layout('layouts.app', ['header' => 'Chirps'])
            ->section('slot');
    }
}
