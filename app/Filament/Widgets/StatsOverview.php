<?php

namespace App\Filament\Widgets;

use App\Models\Club;
use App\Models\Race;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Races To Review', Race::disabled()->count())->color('success'),
            Stat::make('Clubs To Review', Club::disabled()->count())->color('success')
        ];
    }
}
