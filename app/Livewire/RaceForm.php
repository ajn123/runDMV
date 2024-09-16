<?php

namespace App\Livewire;

use App\Actions\DisableModel;
use App\Mail\RaceCreated;
use App\Models\Race;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Actions\CreateAction;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class RaceForm extends Component implements HasActions, HasForms
{
    use InteractsWithActions;
    use InteractsWithForms;

    private DisableModel $model;

    public function boot(DisableModel $model)
    {
        $this->model = $model;
    }

    public function submitRaceAction(): Action
    {
        return CreateAction::make('SubmitRace')
            ->model(Race::class)
            ->color('success')
            ->button()
            ->label('Request A Race to be Added')
            ->form(Race::getForm())
            ->slideOver(true)->after(function (Race $race) {
                $this->model->handle($race);

                //Mail::to('ajn123@vt.edu')->send(new RaceCreated($race));

                Notification::make()
                    ->title('Race Submitted - Pending Approval From Admin')
                    ->success()
                    ->send();

            });

    }

    public function render()
    {
        return view('livewire.race-form');
    }
}
