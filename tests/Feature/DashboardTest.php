<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DashboardTest extends TestCase
{
    public function test_can_see_dashboard()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->get(route('dashboard'));

        $response
            ->assertOk()
            ->assertSee("You're logged in!", escape:false);
    }

    public function test_unauthenticated_user_cannot_see_dashboard()
    {
        $user = User::factory()->create();

        $response = $this->get(route('dashboard'));

        $response
            ->assertStatus(302)
            ->assertDontSee('You are logged in!');
    }
}
