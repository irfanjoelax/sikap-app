<?php

namespace Database\Seeders;

use App\Models\Indikator;
use Illuminate\Database\Seeder;

class IndikatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Indikator::create([
            'point' => 'Pengajaran',
            'tugas_id' => 1,
        ]);
        Indikator::create([
            'point' => 'Penelitian',
            'tugas_id' => 1,
        ]);
        Indikator::create([
            'point' => 'Pengabdian',
            'tugas_id' => 1,
        ]);
        Indikator::create([
            'point' => 'Bimbingan Karya Ilmiah',
            'tugas_id' => 1,
        ]);
        Indikator::create([
            'point' => 'Umum',
            'tugas_id' => 2,
        ]);
    }
}
