@extends('layouts.master')

@section('title')
    Your Cafe - Laporan
@endsection

@section('content')
    <div class="row">
        @include('reports.partials.graph2')
    </div>

    <div class="row">
        <div class="col-md-12">
            @include('reports.partials.graph3')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @include('reports.partials.graph4')
        </div>
    </div>

    <div class="row">
        @include('reports.partials.graph1')
    </div>

@endsection

@section('script')
    @include('reports.partials.morrisData')
@endsection