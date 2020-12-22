<?php

namespace Database\Factories;

use App\Models\Penduduk;
use App\Models\KartuKeluarga;
use App\Models\LevelPendidikan;
use App\Models\Pekerjaan;
use App\Models\Kewarganegaraan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class PendudukFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Penduduk::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker::create('id_ID');
        $agama = array('Islam', 'Katolik', 'Protestan', 'Hindu', 'Buddha', 'Konghucu');
        $gender = array('Laki-laki', 'Perempuan');
        $status_nikah = array('Belum Menikah', 'Menikah', 'Janda/Duda');
        $status_kel = array('Ayah', 'Ibu', 'Anak', 'Orang Tua');

        $levels = LevelPendidikan::all()->random(1);
        $jobs = Pekerjaan::all()->random(1);
        $warga = Kewarganegaraan::all()->random(1);
        $kartukeluarga = KartuKeluarga::all()->random(1);

        foreach ($levels as $level):
            foreach ($jobs as $job):
                foreach ($warga as $wn):
                    foreach ($kartukeluarga as $kk):
                        return [
                            'keluarga_id' => $kk->id,
                            'nama' => $faker->name,
                            'nik' => $faker->nik,
                            'tempat_lahir' => $faker->cityName,
                            'tanggal_lahir' => $faker->dateTimeBetween('1960-01-01', '2020-12-31')->format('Y-m-d'),
                            'agama' => $faker->randomElement($agama),
                            'jenis_kelamin' => $faker->randomElement($gender),
                            'level_pendidikan_id' => $level->id,
                            'pekerjaan_id' => $job->id,
                            'status_pernikahan' => $faker->randomElement($status_nikah),
                            'status_keluarga' => $faker->randomElement($status_kel),
                            'kewarganegaraan_id' => $wn->id,
                            'ayah' => $faker->firstNameMale,
                            'ibu' => $faker->firstNameFemale
                        ];
                    endforeach;
                endforeach;
            endforeach;
        endforeach;
    }
}
