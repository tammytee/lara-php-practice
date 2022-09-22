<?php

namespace App\Http\Livewire;

use App\Models\Chirp;
use Livewire\Component;

class Chirps extends Component
{
    public Chirp $chirp;

    protected $rules = [
        'chirp.message' => 'required|string',
    ];

    public function __construct()
    {
        $this->chirp = new Chirp();
    }

    public function saveChirp()
    {
        $this->validate();

        auth()->user()->chirps()->save($this->chirp);

        $this->chirp->save();

        $this->reset();
    }

    public function deleteChirp(Chirp $chirp)
    {
        $chirp->delete();
    }

    public function render()
    {
        return view('livewire.chirps', [
            'chirps' => Chirp::all()->sortByDesc('created_at'),
        ])
        ->layout('layouts.app', ['header' => 'Chirps'])
        ->section('slot');
    }
}
