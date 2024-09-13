<?php

namespace App\Livewire;

use App\Enums\Distances;
use App\Models\Race;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateRangeFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class RacesTable extends DataTableComponent
{
    protected $model = Race::class;

    public function configure(): void
    {
        $this->setSearchLive();
        $this->setSearchEnabled();
        $this->setTrimSearchStringEnabled();
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function ($row) {
                return route('race-show',
                    Race::find($row['id']));
            });
    }

    public function builder(): Builder
    {
        return Race::enabled();
    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Distances', 'distances')
                ->options(array_column(Distances::cases(), 'value'))->filter(function (Builder $builder, string $value) {
                    $builder->whereJsonContains('distances', Distances::cases()[$value]);
                }),
            DateRangeFilter::make('Date', 'date')->config([
                'min' => '1900-01-01',  // Earliest Acceptable Date
                'max' => '2100-12-31', // Latest Acceptable Date
                'pillFormat' => 'd M Y', // Format for use in Filter Pills
                'placeholder' => 'Enter Date', // A placeholder value
            ])->filter(function (Builder $builder, array $dateRange) { // Expects an array.
                $builder->whereDate('date', '>=', $dateRange['minDate']) // minDate is the start date selected
                    ->whereDate('date', '<=', $dateRange['maxDate']); // maxDate is the end date selected
            }),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')->hideIf(true),
            Column::make('Name', 'name')
                ->sortable()->searchable(),
            Column::make('Date', 'date')->sortable()->searchable()->format(function ($v) {
                return $v->format('l, jS \\of F Y');
            }),
            Column::make('Website', 'website'),

        ];
    }
}
