<?php

namespace Tests\Feature;

use App\Models\Partner;
use Faker\Provider\Lorem;
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
                    'uuid',
                    'name',
                    'description',
                    'tax_number',
                    'www',
                    'created_at',
                    'updated_at'
                ]
            );
    }

    /**
     * Testing the partner addition request failure after passing incorrect tax number.
     *
     * @return void
     */
    public function testPartnerNotCreatedBecauseOfWrongTaxNumber()
    {
        $faker = $this->getFaker();
        $data = [
            'name'  => $faker->firstName . ' ' . $faker->lastName,
            'description' => Lorem::text($faker->numberBetween(5, 512)),
            'tax_number' => '53532532',
            'www' => $faker->url()
        ];

        $this->json('post', 'api/v1/partners', $data)
            ->assertStatus(422)
            ->assertJsonStructure(
                [
                    "errors" => [
                        "tax_number"
                    ]
                ]
            );
    }

    /**
     * Testing the partner update request with correct data.
     *
     * @return void
     */
    public function testPartnerUpdatedSuccessfully()
    {
        $partnerObj = Partner::factory()->create();
        $faker = $this->getFaker();
        $data = [
            'name'  => $faker->firstName . ' ' . $faker->lastName,
            'description' => Lorem::text($faker->numberBetween(5, 512)),
            'tax_number' => $faker->numberBetween(5000000000, 9000000000),
            'www' => $faker->url()
        ];

        $this->json('put', 'api/v1/partners/' . $partnerObj->uuid, $data)
            ->assertStatus(201)
            ->assertJsonStructure(
                [
                    'id',
                    'uuid',
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
