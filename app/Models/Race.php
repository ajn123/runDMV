<?php

namespace App\Models;

use App\Enums\DateFormats;
use App\Enums\Distances;
use Carbon\Carbon;
use Filament\Forms\Components\CheckboxList;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
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
            RichEditor::make('description'),
            CheckboxList::make('distances')->options(Distances::class),
        ];
    }

    public function scopeInFuture(Builder $query)
    {
        $query->where('date', '>=', Carbon::now()->toDateString());
    }

    public function date(): Attribute
    {
        return Attribute::make(
            get: fn($date) => (new Carbon($date))->format(DateFormats::FullDateDay->value)
        );
    }
}
