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
    public function definition()
    {
        return [
            'title'=> $this->faker->sentence(3),
            'description'=> $this->faker->paragraph(3),
            'tags' => 'laravel, php, javascript',
            'email' => $this->faker->email(),
            'company' => $this->faker->company(),
            'website' => $this->faker->url(),
            'location' => $this->faker->city(),
        ];
    }
}
