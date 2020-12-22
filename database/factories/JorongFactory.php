<?php

namespace Database\Factories;

use App\Models\Jorong;
use App\Models\Nagari;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class JorongFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jorong::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create('ne_NP');
        $nagaris = Nagari::all()->random(1);
        foreach ($nagaris as $nagari):
        return [
            'nagari_id' => $nagari->id,
            'nama' => $faker->district
        ];
        endforeach;
    }
}
