<?php

namespace Database\Factories;

use App\Models\Nagari;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class NagariFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Nagari::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create('ne_NP');
        return [
            'nama' => $faker->cityName
        ];
    }
}
