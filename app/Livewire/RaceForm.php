<?php

namespace App\Livewire;

use App\Mail\RaceCreated;
use App\Models\Race;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Concerns\InteractsWithFormActions;
use Filament\Support\Enums\MaxWidth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\HtmlString;
use Livewire\Component;

class RaceForm extends Component implements HasForms, HasActions
{

    use InteractsWithActions;
    use InteractsWithForms;


    public function submitRaceAction(): Action
    {
        return Action::make('SubmitRace')
            ->color('success')
            ->button()
            ->label("Request A Race to be Added")
            ->form(Race::getForm())
            ->slideOver(true)->after(function ()
            {
                Mail::to('ajn123@vt.edu')->send(new RaceCreated());

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
