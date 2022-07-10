<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'location_id' => fn() => Location::factory()->create(),  // fn() Trick to prevent Factory to create a new model when location_id is already provided.
            'name' => fake()->words(asText: true),
            'description' => fake()->paragraphs(nb: 1, asText: true),
            'price' => fake()->numberBetween(0,10000),
            'starts_at' => now(),
        ];
    }
}
