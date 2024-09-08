<?php

namespace App\Livewire;

use App\Models\Club;
use Livewire\Component;

class ClubItem extends Component
{
    public Club $club;

    public function render()
    {
        return view('livewire.club-item');
    }
}
