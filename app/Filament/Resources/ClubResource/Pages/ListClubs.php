<?php

namespace App\Filament\Resources\ClubResource\Pages;

use App\Filament\Resources\ClubResource;
use App\Filament\Widgets\StatsOverview;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListClubs extends ListRecords
{
    protected static string $resource = ClubResource::class;

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
