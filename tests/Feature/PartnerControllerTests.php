<?php

namespace Tests\Feature;

use Faker\Provider\Lorem;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PartnerControllerTests extends TestCase
{
    /**
     * Testing the partner addition request with correct data.
     *
     * @return void
     */
    public function testPartnerCreatedSuccessfully()
    {
        $faker = $this->getFaker();
        $data = [
            'name'  => $faker->firstName . ' ' . $faker->lastName,
            'description' => Lorem::text($faker->numberBetween(5, 512)),
            'tax_number' => $faker->numberBetween(5000000000, 9000000000),
            'www' => $faker->url()
        ];

        $this->json('post', 'api/v1/partners', $data)
            ->assertStatus(201)
            ->assertJsonStructure(
                [
                    'id',
                    'name',
                    'description',
                    'tax_number',
                    'www',
                    'created_at',
                    'updated_at'
                ]
            );
    }

}
