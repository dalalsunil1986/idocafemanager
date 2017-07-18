@extends('layouts.master')

@section('title')
	Your Cafe - Daftar Order
@endsection

@section('content')
    <div class="row">
        @if(count($orders)>0)
            @foreach($orders as $order)
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                                @if($order->table_number == 0)
                                <h4>Free-Table</h4>
                                @else
                                <h4>Table No. {{ $order->table_number }}</h4>
                                @endif
                            <p>Name : <b>{{ $order->customer_name }}</b> | People Count : <b>{{ $order->people_count }}</b> <br> Status : <b>{{ $order->status }}</b></p>
                        </div>
                        <div class="panel-body">

                                <b>Ordered Menus :</b>
                            <ul>
                            @foreach($orderController->getOrderMenu($order->id) as $orderMenu)
                                <li>
                                    <input type="checkbox" > {{ $orderMenu->name }} | Qty : ( {{ $orderMenu->qty }} )
                                </li>
                            @endforeach
                            </ul>
                            <a class="btn btn-black" href="{{ route('deliver.order', ['id' => $order->id ]) }}">Deliver Order</a>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
            <div class="col-md-12">
                <div align="center">
                    <h3>There is No Orders yet.</h3>
                </div>
            </div>
        @endif
    </div>
@endsection