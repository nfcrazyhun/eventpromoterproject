<?php

namespace Database\Factories;

use App\Models\Event;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fn() => User::factory()->create(),  // fn() Trick to prevent Factory to create a new model when this field is already provided.
            'event_id' => fn() => Event::factory()->create(),  // fn() Trick to prevent Factory to create a new model when this field is already provided.
            'price' => fake()->numberBetween(0,10000),
        ];
    }
}
