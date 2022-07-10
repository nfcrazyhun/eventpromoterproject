<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\Location;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Str;
use Tests\TestCase;

class LocationTest extends TestCase
{
    public function test_unauthenticated_user_cannot_see_locations()
    {
        $user = User::factory()->create();

        $response = $this->get(route('locations.index'));

        $response
            ->assertStatus(302);
    }

    public function test_user_can_see_locations_index()
    {
        $user = User::factory()->create();
        $locations = Location::factory(2)->create();

        $this->actingAs($user);

        $response = $this->get(route('locations.index'));

        $response
            ->assertOk()
            ->assertSee([
                $locations[0]->name,
                Str::limit($locations[0]->description,end:''),
            ])
            ->assertSee([
                $locations[1]->name,
                Str::limit($locations[1]->description,end:''),
            ])
        ;
    }

    public function test_user_can_see_locations_show()
    {
        $user = User::factory()->create();
        $location = Location::factory()->create();
        $events = Event::factory(2)->create(['location_id' => $location->id]);

        $this->actingAs($user);

        $response = $this->get(route('locations.show', $location->id));

        $response
            ->assertOk()
            ->assertSee([
                $location->name,
                $location->description,
            ])
            ->assertSee([
                $events[0]->name,
                $events[1]->name,
            ])
        ;
    }
}
