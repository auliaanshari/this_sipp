<?php

namespace Database\Factories;

use App\Models\KartuKeluarga;
use App\Models\Jorong;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class KartuKeluargaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = KartuKeluarga::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create('id_ID');
        $jorongs = Jorong::all()->random(1);
        foreach ($jorongs as $jorong):
            return [
                'jorong_id' => $jorong->id,
                'tanggal_pencatatan' => $faker->dateTimeBetween('2000-01-01', '2020-12-31')->format('Y-m-d'),
                'no' => $faker->nik
            ];
        endforeach;
    }
}
