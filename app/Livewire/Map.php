<?php

namespace App\Livewire;

use App\Models\Club;
use Livewire\Component;

class Map extends Component
{


    public $lat = 38.904974072966;
    public $lng = -77.003001885428;


    public $clubs;

    public function mount()
    {
        $this->clubs = Club::all();
    }


    public function render()
    {
        return view('livewire.map', [
            'clubs' => Club::all()
        ]);
    }
}
