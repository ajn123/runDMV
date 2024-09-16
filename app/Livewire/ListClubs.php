<?php

namespace App\Livewire;

use App\Mail\RaceCreated;
use App\Models\Club;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Actions\CreateAction;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Livewire\Component;

class ListClubs extends Component
{


    public function render()
    {
        return view('livewire.list-clubs');
    }
}
