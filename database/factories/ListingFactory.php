<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'zimmer' => $this->faker->numberBetween(1, 5),
            'badezimmer' => $this->faker->numberBetween(1, 3),
            'wohnflaeche' => $this->faker->numberBetween(500, 3000),
            'stadt' => $this->faker->stadt,
            'plz' => $this->faker->postcode,
            'strasse' => $this->faker->streetName,
            'preis' => $this->faker->numberBetween(10000, 1000000),
             'by_user_id'=> $this->faker->numberBetween(2,5),
            
        ];
    }
}
