<?php

namespace Database\Seeders;

use App\Models\Club;
use Illuminate\Database\Seeder;

class ClubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $clubs = [
            [
                'id' => 1,
                'name' => 'NOMA Run Club',
                'description' => null,
                'geocomplete' => '201 M St NE, Washington, DC 20002, USA',
                'website' => 'www.nomarunclub.com',
                'instagram' => 'nomarunclub',
                'latitude' => 38.904974072966,
                'longitude' => -77.003001885428,
                'created_at' => '2024-09-03T17:36:04.000000Z',
                'updated_at' => '2024-09-06T03:32:45.000000Z',
                'location' => [
                    'lat' => 38.904974072966,
                    'lng' => -77.003001885428,
                ],
            ],
            [
                'id' => 2,
                'name' => 'Vienna Run Club',
                'description' => null,
                'geocomplete' => '111 Maple Ave W, Vienna, VA 22180, USA',
                'website' => 'viennarunclub.com/',
                'instagram' => null,
                'latitude' => 38.90146463507,
                'longitude' => -77.265775384131,
                'created_at' => '2024-09-04T04:38:07.000000Z',
                'updated_at' => '2024-09-04T04:38:07.000000Z',
                'location' => [
                    'lat' => 38.90146463507,
                    'lng' => -77.265775384131,
                ],
            ],
            [
                'id' => 3,
                'name' => 'North East Track Club',
                'description' => null,
                'geocomplete' => 'Georgia Ave Petworth Station, District of Freedom#8573311~!#, Washington, DC 20036, USA',
                'website' => 'netrackclub.com/',
                'instagram' => 'ne_trackclub',
                'latitude' => 38.9071923,
                'longitude' => -77.0368707,
                'created_at' => '2024-09-04T04:39:36.000000Z',
                'updated_at' => '2024-09-04T04:39:36.000000Z',
                'location' => [
                    'lat' => 38.9071923,
                    'lng' => -77.0368707,
                ],
            ],
            [
                'id' => 4,
                'name' => 'District Race Collective',
                'description' => null,
                'geocomplete' => '1001 Rhode Island Ave NE, Washington, DC 20018, USA',
                'website' => 'districtrunningcollective.com/',
                'instagram' => 'districtrunningcollective',
                'latitude' => 38.9220943,
                'longitude' => -76.9915849,
                'created_at' => '2024-09-04T04:41:07.000000Z',
                'updated_at' => '2024-09-04T04:41:07.000000Z',
                'location' => [
                    'lat' => 38.9220943,
                    'lng' => -76.9915849,
                ],
            ],
            [
                'id' => 5,
                'name' => 'Ballston Runaways',
                'description' => null,
                'geocomplete' => '4100 Wilson Blvd, Arlington, VA 22203, USA',
                'website' => null,
                'instagram' => 'theballstonrunaways',
                'latitude' => 38.8795741,
                'longitude' => -77.109491,
                'created_at' => '2024-09-04T04:42:41.000000Z',
                'updated_at' => '2024-09-04T04:42:41.000000Z',
                'location' => [
                    'lat' => 38.8795741,
                    'lng' => -77.109491,
                ],
            ],
            [
                'id' => 6,
                'name' => 'DC Run Crew',
                'description' => null,
                'geocomplete' => '3242 Banneker Dr NE, Washington, DC 20018, USA',
                'website' => 'dcruncrew.com/',
                'instagram' => 'dcruncrew',
                'latitude' => 38.9260376,
                'longitude' => -76.9615037,
                'created_at' => '2024-09-04T04:48:23.000000Z',
                'updated_at' => '2024-09-04T04:48:23.000000Z',
                'location' => [
                    'lat' => 38.9260376,
                    'lng' => -76.9615037,
                ],
            ],
        ];

        foreach ($clubs as $i => $club) {
            if (! Club::find($club['id'])) {
                $club = Club::create($club);
                $club->save();
            }
        }
    }
}
