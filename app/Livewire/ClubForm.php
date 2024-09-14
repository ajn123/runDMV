<?php

namespace App\Livewire;

use App\Enums\DaysOfTheWeek;
use App\Mail\RaceCreated;
use App\Models\Club;
use Filament\Actions\Action;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class ClubForm extends Component implements HasActions, HasForms
{
    use InteractsWithActions;
    use InteractsWithForms;

    public function submitClubAction(): Action
    {
        return CreateAction::make('SubmitClub')
            ->model(Club::class)
            ->color('success')
            ->button()
            ->label('Request A Club to be Added')
            ->form(
                [
                    TextInput::make('name')->required(),
                    RichEditor::make('description')->label('Description - meeting location, special events, etc...'),
                    TextInput::make('website')->prefix('https://'),
                    TextInput::make('instagram')->prefix('@'),
                    CheckboxList::make('day_of_week')->options(DaysOfTheWeek::class)->label('Which days does your club meet:'),
                ]
            )
            ->slideOver(true)->after(function (Club $club) {
                $club->enabled = false;
                $club->save();
                Mail::to('ajn123@vt.edu')->send(new RaceCreated);

                Notification::make()
                    ->title('Club Submitted - Pending Approval From Admin')
                    ->success()
                    ->send();
            });
    }

    public function render()
    {
        return view('livewire.club-form');
    }
}
