<?php

namespace Database\Seeders;

use App\Models\Tugas;
use Illuminate\Database\Seeder;

class TugasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tugas::create([
            'nama' => 'Utama'
        ]);

        Tugas::create([
            'nama' => 'Tambahan'
        ]);
    }
}
