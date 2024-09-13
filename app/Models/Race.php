<?php

namespace App\Models;

use App\Enums\Distances;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Race extends RunningModel
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        'distances' => 'array',
        'date' => 'datetime',
    ];

    public static function getForm(): array
    {
        return [
            TextInput::make('name')->required(),
            DatePicker::make('date')->required(),
            TextInput::make('website')->prefix('https://'),
            TextInput::make('description'),
            CheckboxList::make('distances')->options(Distances::class),
        ];
    }
}
