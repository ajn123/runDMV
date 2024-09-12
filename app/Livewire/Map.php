<?php

namespace App\Livewire;

use App\Mail\RaceCreated;
use App\Models\Club;
use App\Models\Race;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Livewire\Component;

class Map extends Component implements HasForms, HasActions
{

    use InteractsWithActions;
    use InteractsWithForms;

    public function clubAction(): Action
    {
        return ViewAction::make('viewClub')
            ->record(function (array $arguments) {
                return Club::find($arguments['id']);
            })->label("Run Club In The DMV")
            ->form([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255)
                    ->url(),
                TextInput::make('website')
                    ->required()
                    ->maxLength(255)->url(),
                TextInput::make('instagram')
                    ->required()
                    ->maxLength(255),
            ]);

    }

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
