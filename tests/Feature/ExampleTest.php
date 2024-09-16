<?php


use function Pest\Livewire\livewire;

it('Can View All The Clubs', function () {
    $clubs = \App\Models\Club::factory()->count(10)->create();

    livewire(\App\Filament\Resources\ClubResource\Pages\ListClubs::class)
        ->assertCanSeeTableRecords($clubs);
});

it('can create a club', function () {
    $newData = \App\Models\Club::factory()->make();

    livewire(\App\Filament\Resources\ClubResource\Pages\CreateClub::class)
        ->fillForm([
            'name' => $newData->name,
            'description' => $newData->description,
        ])
        ->call('create')
        ->assertHasNoFormErrors();

    $this->assertDatabaseHas(\App\Models\Club::class, [
        'name' => $newData->name,
        'description' => $newData->description,
    ]);
});


it('Can View All The Races', function () {
    $races = \App\Models\Race::factory()->count(10)->create();

    livewire(\App\Filament\Resources\RaceResource\Pages\ListRaces::class)
        ->assertCanSeeTableRecords($races);
});

it('can create a race', function () {
    $newData = \App\Models\Race::factory()->make();
    $now = \Carbon\Carbon::now();

    livewire(\App\Filament\Resources\RaceResource\Pages\CreateRace::class)
        ->fillForm([
            'name' => $newData->name,
            'date' => $now,
        ])
        ->call('create')
        ->assertHasNoFormErrors();


    $this->assertDatabaseHas(\App\Models\Race::class, [
        'name' => $newData->name,
    ]);
});
