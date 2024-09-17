<?php

namespace App\Filament\Resources\RaceResource\Pages;

use App\Filament\Resources\RaceResource;
use App\Filament\Widgets\StatsOverview;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRaces extends ListRecords
{
    protected static string $resource = RaceResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getHeaderWidgets(): array
    {
        return [StatsOverview::class];
    }


}
