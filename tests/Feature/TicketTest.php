<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TicketTest extends TestCase
{
    public function test_unauthenticated_user_cannot_see_tickets()
    {
        $user = User::factory()->create();

        $response = $this->get(route('tickets.index'));

        $response
            ->assertStatus(302);
    }

    public function test_user_can_see_their_tickets()
    {
        $user = User::factory()->create();

        $events = Event::factory(2)->create();

        $tickets = array();
        foreach($events as $event){
            $tickets[] = Ticket::factory()->create([
                'event_id' => $event,
                'user_id' => $user,
                'price' => $event->price,
            ]);
        }

        $this->actingAs($user);

        $response = $this->get(route('tickets.index'));

        $response
            ->assertOk()
            ->assertSee([
                $tickets[0]->id,
                $tickets[0]->owner->name,
                $tickets[0]->event->name,
                $tickets[0]->price,
            ])
            ->assertSee([
                $tickets[1]->id,
                $tickets[1]->owner->name,
                $tickets[1]->event->name,
                $tickets[1]->price,
            ])
        ;
    }
}
