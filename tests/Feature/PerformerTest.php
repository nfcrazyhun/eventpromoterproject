<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\Performer;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class PerformerTest extends TestCase
{
    public function test_unauthenticated_user_cannot_see_performers()
    {
        $user = User::factory()->create();

        $response = $this->get(route('performers.index'));

        $response
            ->assertStatus(302);
    }

    public function test_user_can_see_performers_index()
    {
        $user = User::factory()->create();
        $performers = performer::factory(2)->create();

        $this->actingAs($user);

        $response = $this->get(route('performers.index'));

        $response
            ->assertOk()
            ->assertSee([
                $performers[0]->name,
                Str::limit($performers[0]->description,end:''),
            ])
            ->assertSee([
                $performers[1]->name,
                Str::limit($performers[1]->description,end:''),
            ])
        ;
    }

    public function test_user_can_see_performers_show()
    {
        $user = User::factory()->create();
        $performer = Performer::factory()->create();

        $events = Event::factory(2)->create();
        $performer->events()->attach($events->pluck('id'));

        $this->actingAs($user);

        $response = $this->get(route('performers.show', $performer->id));

        $response
            ->assertOk()
            ->assertSee([
                $performer->name,
                $performer->description,
            ])
            ->assertSee([
                $events[0]->name,
                $events[1]->name,
            ])
        ;
    }
}
