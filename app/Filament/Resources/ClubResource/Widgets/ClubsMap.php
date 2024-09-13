<?php

namespace App\Filament\Resources\ClubResource\Widgets;

use App\Models\Club;
use Cheesegrits\FilamentGoogleMaps\Actions\GoToAction;
use Cheesegrits\FilamentGoogleMaps\Actions\RadiusAction;
use Cheesegrits\FilamentGoogleMaps\Columns\MapColumn;
use Cheesegrits\FilamentGoogleMaps\Filters\MapIsFilter;
use Cheesegrits\FilamentGoogleMaps\Filters\RadiusFilter;
use Cheesegrits\FilamentGoogleMaps\Widgets\MapTableWidget;
use Filament\Actions\Action;
use Filament\Infolists\Components\TextEntry;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;

class ClubsMap extends MapTableWidget
{
    protected static ?string $heading = 'Club Map';

    protected static ?int $sort = 1;

    protected int|string|array $columnSpan = 'full';

    protected static ?string $pollingInterval = null;

    protected static ?bool $clustering = true;

    protected static ?string $mapId = 'incidents';

    protected static ?string $markerAction = 'markerAction';

    protected function getTableQuery(): Builder
    {
        return \App\Models\Club::query()->latest();
    }

    public function markerAction(): Action
    {
        return Action::make('markerAction')
            ->label('Details')
            ->infolist([
                \Filament\Infolists\Components\Section::make([
                    TextEntry::make('name'),
                    TextEntry::make('instagram')->url(fn ($record) => 'https://instagram.com/'.$record->instagram),
                    TextEntry::make('website')->url(fn ($record) => 'https://'.$record->website),
                ])
                    ->columns(1),
            ])
            ->record(function (array $arguments) {
                return array_key_exists('model_id', $arguments) ? Club::find($arguments['model_id']) : null;
            })
            ->modalSubmitAction(false);
    }

    protected function getTableColumns(): array
    {
        return [
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('instagram')->url(fn ($record) => 'https://instagram.com/'.$record->instagram),

            Tables\Columns\TextColumn::make('website')->url(fn ($record) => 'https://'.$record->website),

            MapColumn::make('location')
                ->extraImgAttributes(
                    fn ($record): array => ['title' => $record->latitude.','.$record->longitude]
                )
                ->height('150')
                ->width('250')
                ->type('hybrid')
                ->zoom(15),
        ];
    }

    protected function getTableFilters(): array
    {
        return [
            RadiusFilter::make('location')
                ->section('Radius Filter')
                ->selectUnit(),
            MapIsFilter::make('map'),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Tables\Actions\ViewAction::make(),
            //Tables\Actions\EditAction::make(),
            GoToAction::make()
                ->zoom(14),
            //RadiusAction::make(),
        ];
    }

    protected function getViewData(): array
    {
        return [
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('instagram')->url(fn ($record) => 'https://instagram.com/'.$record->instagram),
            Tables\Columns\TextColumn::make('website')->url(fn ($record) => 'https://'.$record->website),

        ];
    }

    protected function getData(): array
    {
        $locations = $this->getRecords();

        $data = [];

        foreach ($locations as $location) {
            $data[] = [
                'location' => [
                    'lat' => $location->latitude ? round(floatval($location->latitude), static::$precision) : 0,
                    'lng' => $location->longitude ? round(floatval($location->longitude), static::$precision) : 0,
                ],
                'id' => $location->id,
            ];
        }

        return $data;
    }
}
