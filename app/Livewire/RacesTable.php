<?php

namespace App\Livewire;

use App\Enums\Distances;
use App\Models\Race;
use Illuminate\Database\Eloquent\Builder;
use Livewire\Component;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class RacesTable extends DataTableComponent
{
    protected $model = Race::class;

    public function configure(): void
    {



        $this->setSearchLive();
        $this->setSearchEnabled();
        $this->setTrimSearchStringEnabled();
        $this->setPrimaryKey('id');
//            ->setTableRowUrl(function($row) {
//                return route('admin.users.show', $row);
//            });
    }

    public function builder(): Builder
    {
        return Race::enabled();
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Distances', 'distances')
                ->options(array_column(Distances::cases(), "value"))->filter(function (Builder $builder, string $value) {
                    $builder->whereJsonContains('distances', Distances::cases()[$value] );
                })
        ];
    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'name')
                ->sortable()->searchable(),
            Column::make('Date', 'date')->sortable(),
            Column::make('Website', 'website'),

        ];
    }
}
