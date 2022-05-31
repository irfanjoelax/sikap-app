<?php

namespace Database\Seeders;

use App\Models\Kegiatan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //============== pengajaran
        Kegiatan::create([
            'judul' => Str::title('membuat bahan ajar'),
            'indikator_id' => 1,
            'satuan' => 'Semester',
        ]);
        Kegiatan::create([
            'judul' => Str::title('proses'),
            'indikator_id' => 1,
            'satuan' => 'Semester',
        ]);
        Kegiatan::create([
            'judul' => Str::title('UTS'),
            'indikator_id' => 1,
            'satuan' => 'Semester',
        ]);
        Kegiatan::create([
            'judul' => Str::title('UAS'),
            'indikator_id' => 1,
            'satuan' => 'Semester',
        ]);
        Kegiatan::create([
            'judul' => Str::title('laporan'),
            'indikator_id' => 1,
            'satuan' => 'Semester',
        ]);

        //============== penelitian
        Kegiatan::create([
            'judul' => Str::title('pengajuan judul'),
            'indikator_id' => 2,
            'satuan' => 'Dokumen',
        ]);
        Kegiatan::create([
            'judul' => Str::title('pengajuan izin'),
            'indikator_id' => 2,
            'satuan' => 'Dokumen',
        ]);
        Kegiatan::create([
            'judul' => Str::title('penulisan proposal'),
            'indikator_id' => 2,
            'satuan' => 'Dokumen',
        ]);
        Kegiatan::create([
            'judul' => Str::title('penelitian lapangan'),
            'indikator_id' => 2,
            'satuan' => 'Dokumen',
        ]);
        Kegiatan::create([
            'judul' => Str::title('laporan penelitian'),
            'indikator_id' => 2,
            'satuan' => 'Dokumen',
        ]);
        Kegiatan::create([
            'judul' => Str::title('publikasi jurnal'),
            'indikator_id' => 2,
            'satuan' => 'Dokumen',
        ]);

        //============== pengabdian
        Kegiatan::create([
            'judul' => Str::title('pengajuan judul'),
            'indikator_id' => 3,
            'satuan' => 'Kegiatan',
        ]);
        Kegiatan::create([
            'judul' => Str::title('pengajuan izin'),
            'indikator_id' => 3,
            'satuan' => 'Kegiatan',
        ]);
        Kegiatan::create([
            'judul' => Str::title('penulisan proposal'),
            'indikator_id' => 3,
            'satuan' => 'Kegiatan',
        ]);
        Kegiatan::create([
            'judul' => Str::title('penelitian lapangan'),
            'indikator_id' => 3,
            'satuan' => 'Kegiatan',
        ]);
        Kegiatan::create([
            'judul' => Str::title('laporan penelitian'),
            'indikator_id' => 3,
            'satuan' => 'Kegiatan',
        ]);
        Kegiatan::create([
            'judul' => Str::title('publikasi jurnal'),
            'indikator_id' => 3,
            'satuan' => 'Kegiatan',
        ]);

        //============== bimbingan karya ilmiah
        Kegiatan::create([
            'judul' => Str::title('pengajuan judul'),
            'indikator_id' => 4,
            'satuan' => 'Mahasiswa',
        ]);
        Kegiatan::create([
            'judul' => Str::title('pemeriksaan karya ilmiah'),
            'indikator_id' => 4,
            'satuan' => 'Mahasiswa',
        ]);
        Kegiatan::create([
            'judul' => Str::title('keabsahan bimbingan'),
            'indikator_id' => 4,
            'satuan' => 'Mahasiswa',
        ]);
        Kegiatan::create([
            'judul' => Str::title('laporan hasil'),
            'indikator_id' => 4,
            'satuan' => 'Mahasiswa',
        ]);
        Kegiatan::create([
            'judul' => Str::title('ujian karya ilmiah'),
            'indikator_id' => 4,
            'satuan' => 'Mahasiswa',
        ]);

        //============== tugas tambahan umum
        Kegiatan::create([
            'judul' => Str::title('terlaksana program pengembangan lembaga'),
            'indikator_id' => 5,
            'satuan' => 'Kegiatan',
        ]);
        Kegiatan::create([
            'judul' => Str::title('pendampingan kegiatan ekstra kurikuler'),
            'indikator_id' => 5,
            'satuan' => 'Kegiatan',
        ]);
        Kegiatan::create([
            'judul' => Str::title('aktif sebagai peserta kegiatan berbasis'),
            'indikator_id' => 5,
            'satuan' => 'Kali',
        ]);
    }
}
