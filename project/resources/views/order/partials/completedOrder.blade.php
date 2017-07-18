
<div class="panel panel-default">
    <div class="panel-heading">
        <h4>RIWAYAT ORDER</h4>
    </div>
    <div class="panel-body">
        @if(($orderController->getCompletedOrder())!=null)
        <table class="table table-bordered">
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Tgl.</th>
                <th>Checkin</th>
                <th>Checkout</th>
                <th>Total Harga</th>
            </tr>
            <?php $counterCompletedOrder = 1; ?>
            @foreach($orderController->getCompletedOrder() as $completedOrder)
                <tr>
                    <td>{{ $counterCompletedOrder }}</td>
                    <td>{{ $completedOrder->customer_name }}</td>
                    <td>{{ $completedOrder->date }}</td>
                    <td>{{ $completedOrder->checkin }}</td>
                    <td>{{ $completedOrder->checkout }}</td>
                    <td>{{ $completedOrder->total_price }}</td>
                </tr>
                <?php $counterCompletedOrder++; ?>
            @endforeach

        </table>
            @else
                <div align="center">
                    <h4>Belum Ada Order</h4>
                </div>
            @endif
    </div>
</div>