<?php

namespace Database\Factories;

use Faker\Provider\Lorem;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Uuid;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Partner>
 */
class PartnerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => (string) Uuid::uuid4(),
            'name'  => $this->faker->firstName . ' ' . $this->faker->lastName,
            'description' => Lorem::text($this->faker->numberBetween(5, 512)),
            'tax_number' => $this->faker->numberBetween(5000000000, 9000000000),
            'www' => $this->faker->url()
        ];
    }
}
