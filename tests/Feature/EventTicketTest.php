<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class EventTicketTest extends TestCase
{
    public function test_unauthenticated_user_cannot_buy_ticket()
    {
        $event = Event::factory()->create();

        $response = $this->post(
            route('events.ticket.store', $event),
            []
        );

        $response
            ->assertStatus(302);
    }

    public function test_user_can_buy_ticket()
    {
        $user = User::factory()->create();
        $event = Event::factory()->create();

        $this->actingAs($user);

        $response = $this->post(
            route('events.ticket.store', $event),
            ['quantity' => 1],
        );

        $response
            ->assertRedirect(route('tickets.index'))
            ->assertSessionHas('success',"Ticket purchased successfully!")
        ;

        $this->assertDatabaseHas(app(Ticket::class)->getTable(), [
            'user_id' => $user->id,
            'event_id' => $event->id,
        ]);
    }
}
