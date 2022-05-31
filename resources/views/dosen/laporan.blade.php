@extends('layouts.app')

@section('content')
   <section class="section">
      <div class="section-header">
         <h3 class="page__heading">Laporan</h3>
      </div>
      <div class="section-body">
         <livewire:dosen.laporan-create/>
      </div>
   </section>
@endsection