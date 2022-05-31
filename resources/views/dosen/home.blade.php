@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Dosen Home</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-calendar-alt"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Rencana</h4>
                            </div>
                            <div class="card-body">{{ $totalRencana }}</div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Grafik Progres Rencana</h4>
                        </div>
                        <div class="card-body">
                            @foreach ($dataRencana as $item)
                            @php
                                $progres = $item->laporan->sum('jumlah');
                                $target  = $item->target;
                                $hitung  = ceil(($progres / $target) * 100);
                            @endphp
                            <div class="mb-4">
                                <div class="text-small float-right font-weight-bold text-muted">
                                    {{ $progres }} / {{ $target }} <span class="text-primary">({{ $hitung }}%)</span>
                                </div>
                                <div class="font-weight-bold mb-1">{{ $item->kegiatan->judul }}</div>
                                <div class="progress" data-height="10">
                                    <div class="progress-bar" role="progressbar" data-width="{{ $hitung }}%" aria-valuenow="{{ $hitung }}" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>                          
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

