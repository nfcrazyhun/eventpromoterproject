<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $locations = Location::all();

        foreach ( range(1,10) as $index) {
            Event::factory()->create( ['location_id' => $locations->random()] );
        }
    }
}
