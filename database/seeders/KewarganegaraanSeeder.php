<?php

namespace Database\Seeders;

use App\Models\Kewarganegaraan;
use Illuminate\Database\Seeder;

class KewarganegaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $warga = array('WNI', 'WNA');
        foreach($warga as $wn):
            Kewarganegaraan::create([
            'nama' => $wn
        ]);
        endforeach;
    }
}
