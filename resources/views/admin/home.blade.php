@extends('layouts.app')

@section('content')
<section class="section">
    <x-widget-bar></x-widget-bar>
    <div class="row">
        <div class="col-lg-5">
            <div class="card">
                <div class="card-body">
                    {!! $tugasChart->container() !!}
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card">
                <div class="card-body">
                    {!! $indikatorChart->container() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
{!! $tugasChart->script() !!}
{!! $indikatorChart->script() !!}
@endsection