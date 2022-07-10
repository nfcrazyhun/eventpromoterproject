<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\Performer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class EventTest extends TestCase
{
    public function test_unauthenticated_user_cannot_see_events()
    {
        $user = User::factory()->create();

        $response = $this->get(route('events.index'));

        $response
            ->assertStatus(302);
    }

    public function test_user_can_see_events_index()
    {
        $user = User::factory()->create();
        $events = Event::factory(2)->create();

        $performers = Performer::factory(2)->create();
        $events[0]->performers()->attach($performers->pluck('id'));

        $this->actingAs($user);

        $response = $this->get(route('events.index'));

        $response
            ->assertOk()
            ->assertSee([
                $events[0]->name,
                Str::limit($events[0]->description,end:''),
                $events[0]->starts_at,
                $events[0]->price,
                $events[0]->location->name,
                $performers[0]->name,
                $performers[1]->name,
            ])
            ->assertSee([
                $events[1]->name,
                Str::limit($events[1]->description,end:''),
            ])
        ;
    }

    public function test_user_can_see_events_show()
    {
        $user = User::factory()->create();
        $event = Event::factory()->create();

        $performers = Performer::factory(2)->create();
        $event->performers()->attach($performers->pluck('id'));

        $this->actingAs($user);

        $response = $this->get(route('events.show', $event->id));

        $response
            ->assertOk()
            ->assertSee([
                $event->name,
                $event->description,
                $event->starts_at,
                $event->price,
                $event->location->name,
                $performers[0]->name,
                $performers[1]->name,
            ])
        ;
    }
}
