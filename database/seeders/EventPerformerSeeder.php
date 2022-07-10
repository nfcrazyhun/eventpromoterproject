<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Performer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EventPerformerSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = Event::all();
        $performers = Performer::all();

        foreach ($events as $event) {
            // Pick random performers
            $randomPerformers = $performers->random( rand(1,2) )->pluck('id');

            // Attach performers to the event
            $event->performers()->attach($randomPerformers);
        }
    }
}
