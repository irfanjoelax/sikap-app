@extends('layouts.app')

@section('content')
   <section class="section">
      <div class="section-header">
         <h3 class="page__heading">Daftar User</h3>
      </div>
      <div class="section-body">
         <livewire:admin.user-index />
      </div>
   </section>
@endsection
