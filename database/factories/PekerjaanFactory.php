<?php

namespace Database\Factories;

use App\Models\Pekerjaan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

class PekerjaanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Pekerjaan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // $faker = Faker::create('en_US');
        // $job = array("Belum/ Tidak Bekerja", "Mengurus Rumah Tangga", "Pelajar/ Mahasiswa", "Pensiunan",
        //     "Pewagai Negeri Sipil", "Petani/ Pekebun", "Peternak", "Nelayan/ Perikanan", "Karyawan Swasta",
        //     "Karyawan Honorer", "Buruh Harian Lepas", "Pembantu Rumah Tangga", "Seniman", "Wartawan", 
        //     "Juru Masak", "Duta Besar", "Dosen", "Guru", "Pilot", "Pengacara", "Arsitek", "Dokter", "Bidan", 
        //     "Perawat", "Psikiater/ Psikolog", "Penyiar Televisi", "Pelaut", "Sopir", "Paranormal", "Pedagang", "Wiraswasta");
        return [
            // 'nama' => $faker->randomElement($job)
        ];
    }
}
