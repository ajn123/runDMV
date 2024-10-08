<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ClubResource\Pages;
use App\Filament\Widgets\StatsOverview;
use App\Models\Club;
use Cheesegrits\FilamentGoogleMaps\Fields\Map;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ClubResource extends Resource
{
    protected static ?string $model = Club::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        $clubForm = Club::getForm();
        $clubForm[] = Checkbox::make('enabled');
        $clubForm[] = TextInput::make('geocomplete');
        $clubForm[] = Map::make('location')->mapControls([
            'mapTypeControl' => true,
            'scaleControl' => true,
            'rotateControl' => true,
            'fullscreenControl' => true,
            'searchBoxControl' => false, // creates geocomplete field inside map
            'zoomControl' => false,
        ])
            ->height(fn () => '400px') // map height (width is controlled by Filament options)
            ->defaultZoom(10) // default zoom level when opening form
            ->autocomplete('geocomplete') // field on form to use as Places geocompletion field
            ->defaultLocation([38.904974072966, -77.003001885428]) // default for new forms
            ->clickable(true);

        return $form->schema($clubForm);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable(),
            ])
            ->filters([
                Tables\Filters\Filter::make('enabled')->default(),
                Filter::make('disabled')->query(fn (Builder $query): Builder => $query->where('enabled', false))
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [



        ];
    }



    public static function getPages(): array
    {
        return [
            'index' => Pages\ListClubs::route('/'),
            'create' => Pages\CreateClub::route('/create'),
            'edit' => Pages\EditClub::route('/{record}/edit'),
        ];
    }
}
