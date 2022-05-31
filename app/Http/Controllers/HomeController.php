<?php

namespace App\Http\Controllers;

use App\Charts\IndikatorChart;
use App\Charts\TugasChart;
use App\Models\Indikator;
use App\Models\Tugas;

class HomeController extends Controller
{
    public function index()
    {
        $arrColor = [
            '#6777ef', '#fc544b', '#47c363', '#ffa426', '#34395e'
        ];


        $dataTugas = Tugas::withCount('rencana_dosen')->get();
        $tugasChart = new TugasChart;
        $tugasChart->labels($dataTugas->pluck('nama'));
        $tugasChart->dataset('Grafik Tugas', 'doughnut', $dataTugas->pluck('rencana_dosen_count'))->backgroundColor($arrColor);


        $dataIndikator = Indikator::withCount('rencana_dosen')->get();
        $indikatorChart = new IndikatorChart;
        $indikatorChart->labels($dataIndikator->pluck('point'));
        $indikatorChart->dataset('Grafik Indikator', 'bar', $dataIndikator->pluck('rencana_dosen_count'))->backgroundColor($arrColor);

        return view('admin.home', [
            'tugasChart' => $tugasChart,
            'indikatorChart' => $indikatorChart,
        ]);
    }
}
