@extends('layouts.app')

@section('content')
   <section class="section">
      <div class="section-header">
         <h3 class="page__heading">Kegiatan</h3>
      </div>
      <div class="section-body">
         <livewire:admin.kegiatan-index />
      </div>
   </section>
@endsection

@section('scripts')
<script>
   window.livewire.on('backTop', () => {
      $("html, body").animate({scrollTop: 0}, 500);
   });
</script>
@endsection