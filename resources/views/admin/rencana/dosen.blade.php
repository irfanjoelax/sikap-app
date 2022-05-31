@extends('layouts.app')

@section('content')
   <section class="section">
      <div class="section-header">
         <h3 class="page__heading">Rencana Dosen</h3>
      </div>
      <div class="section-body">
         <livewire:admin.rencana.dosen-index />
      </div>
   </section>

   {{-- modal detail--}}
   <div class="modal fade" id="detailModal" data-keyboard="false" data-backdrop="static">
      <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
         <livewire:dosen.rencana-detail-modal/>
      </div>
   </div>
@endsection

@section('scripts')
<script>
   window.livewire.on('showModalDetail', () => {
      $('#detailModal').modal('show')
   });
   window.livewire.on('hideModalDetail', () => {
      $('#detailModal').modal('hide')
   });
</script>
@endsection
