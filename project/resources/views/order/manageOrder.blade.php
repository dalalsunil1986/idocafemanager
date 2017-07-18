@extends('layouts.master')

@section('title')
	Your Cafe - Kelola Order
@endsection

@section('content')

    <div class="row">
        <div class="col-md-12">
            @include('order.partials.orderForm')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @include('order.partials.payment')
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            @include('order.partials.completedOrder')
        </div>
    </div>

@endsection

@section('script')
    @include('order.partials.orderScript')
@endsection