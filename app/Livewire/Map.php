<?php

namespace App\Livewire;

use App\Models\Club;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class Map extends Component implements HasActions, HasForms
{
    use InteractsWithActions;
    use InteractsWithForms;

    public function clubAction(): Action
    {
        return ViewAction::make('viewClub')
            ->record(function (array $arguments) {
                return Club::find($arguments['id']);
            })->label('Run Club In The DMV')
            ->form([
                TextInput::make('name'),
                TextInput::make('website'),
                TextInput::make('instagram'),
            ]);

    }

    public $lat = 38.904974072966;

    public $lng = -77.003001885428;

    public $clubs;

    public function mount()
    {
        $this->clubs = Club::enabled()->get();
    }

    public function render()
    {
        return view('livewire.map', [
            'clubs' => Club::enabled()->get(),
        ]);
    }
}
