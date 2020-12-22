<?php

namespace Database\Seeders;

use App\Models\KartuKeluarga;
use App\Models\Jorong;
use Illuminate\Database\Seeder;

class KartuKeluargaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KartuKeluarga::factory()->count(30)->create();
    }
}
