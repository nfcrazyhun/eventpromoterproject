<?php

namespace Database\Seeders;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TicketSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = Event::inRandomOrder()->take(2)->get();
        $user = User::first();

        foreach($events as $event){
            Ticket::factory()->create([
                'event_id' => $event,
                'user_id' => $user,
                'price' => $event->price,
            ]);
        }
    }
}
