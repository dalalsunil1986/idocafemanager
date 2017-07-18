<div class="panel panel-default">
    <div class="panel-heading">
        <h4>ORDER SAAT INI</h4>
    </div>
    <div class="panel-body">
        @if(count($orders)>0)
            @foreach($orders as $order)
                <div class="col-md-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">

                            @if($order->table_number == 0)
                                <h4>Meja-Bebas</h4>
                            @else
                                <h4>Meja Nomor. {{ $order->table_number }}</h4>
                            @endif
                            <p>Nama : <b>{{ $order->customer_name }}</b> | Jumlah Orang : <b>{{ $order->people_count }}</b> <br>Status : <b>{{ $order->status }}</b></p>

                        </div>
                        <div class="panel-body">

                            <b>Menu yang di Order :</b>
                            <ul>
                                @foreach($orderController->getOrderMenu($order->id) as $orderMenu)
                                    <li>
                                       {{ $orderMenu->name }} | Qty : ( {{ $orderMenu->qty }} ) | {{ ($orderMenu->price)*($orderMenu->qty) }}
                                    </li>
                                @endforeach
                            </ul>
                            <b>Total Harga :</b><br>
                            <span style="font-weight: bold; font-size: medium; color: #2ca02c; margin-left: 20px;">Rp. {{ $order->total_price }}</span>
                            <br><button type="button" class="btn btn-black pull-right" data-toggle="modal" data-target="#paymentModal{{ $order->id }}">
                                Bayar
                            </button>


                            <!-- Modal -->
                            <div class="modal fade" id="paymentModal{{ $order->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="paymentModalLabel{{ $order->id }}">Detail Pembayaran</h4>
                                        </div>
                                        <div class="modal-body">
                                            <p><b>Nama : {{ $order->customer_name }} | {{ $order->date }}</b></p>
                                            <table class="table table-bordered">
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Menu</th>
                                                    <th>Qty.</th>
                                                    <th>Price</th>
                                                    <th>Total</th>
                                                </tr>
                                                <?php $count = 1; ?>
                                                @foreach($orderController->getOrderMenu($order->id) as $orderMenu)
                                                    <tr>
                                                        <td>{{ $count }}</td>
                                                        <td>{{ $orderMenu->name }}</td>
                                                        <td>{{ $orderMenu->qty }}</td>
                                                        <td>{{ $orderMenu->price }}</td>
                                                        <td>{{ ($orderMenu->price)*($orderMenu->qty) }}</td>
                                                    </tr>
                                                    <?php $count++; ?>
                                                @endforeach
                                                <tr>
                                                    <td colspan="4" align="right"><b><i>TOTAL HARGA :</i></b></td>
                                                    <td align="left"><b>Rp.<i style="font-size: large; color: #2ca02c;">{{ $order->total_price }}</i></b></td>

                                                </tr>
                                            </table>
                                        </div>
                                        <div class="modal-footer">
                                            <form class="form" action="{{ route('pay.order') }}" method="POST">
                                                <div class="form-group">
                                                    <label>Amount of Money :</label>
                                                    <input type="number" name="amountMoney">
                                                    <input type="hidden" name="idOrder" value="{{ $order->id }}">
                                                </div>

                                                <button type="submit" class="btn btn-primary">Proses Pembayaran</button>
                                                {{ csrf_field() }}
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            @else
            <div class="col-md-12">
                <div align="center">
                    <h4>Belum Ada Order</h4>
                </div>
            </div>
        @endif
    </div>
</div>