@extends('layouts.master')

@section('title')
    Your - Keuangan
@endsection

@section('content')
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Tambah Transaksi</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ route('add.finances') }}" method="POST">
                        <div class="form-group">
                            <label for="desc">Jumlah Uang (Rp.) :</label>
                            <input class="form-control" type="number" name="amount" id="amount">
                        </div>
                        <div class="form-group">
                            <label for="desc">Deskripsi :</label>
                            <input class="form-control" type="text" name="desc" id="desc">
                        </div>
                        <div class="form-group">
                            <label for="type">Tipe :</label>
                            <select class="form-control" name="type" id="type">
                                <option value="income" selected>Pemasukan</option>
                                <option value="expense">Pengeluaran</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-black">
                        </div>
                        {{ csrf_field() }}
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Saldo Saat Ini</h3>
                </div>
                <div class="panel-body">
                    <h2><b>Rp.{{ ($totalIncome['0']->totalIncome)-($totalExpense['0']->totalExpense) }},-</b></h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Pemasukan Bulan Ini</h3>
                </div>
                <div class="panel-body">
                    @if(($financesIncome)!=null)
                    <table class="table table-bordered">
                        <tr>
                            <th>No. </th>
                            <th>Tanggal</th>
                            <th>Jumlah Uang</th>
                            <th>Deskripsi</th>
                        </tr>
                        <?php $count1=1; ?>
                        @foreach($financesIncome as $financeIncome)
                            <tr>
                                <td>{{ $count1 }}</td>
                                <td>{{ $financeIncome->date }}</td>
                                <td>{{ $financeIncome->amount }}</td>
                                <td>{{ $financeIncome->description }}</td>
                            </tr>
                            <?php $count1++; ?>
                        @endforeach

                    </table>
                    @else
                        <h4>Belum ada Pemasukan</h4>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3>Pengeluaran Bulan Ini</h3>
                </div>
                <div class="panel-body">
                    @if(($financesExpense)!=null)
                        <table class="table table-bordered">
                            <tr>
                                <th>No. </th>
                                <th>Tanggal</th>
                                <th>Jumlah Uang</th>
                                <th>Deskripsi</th>
                            </tr>
                            <?php $count2=1; ?>
                            @foreach($financesExpense as $financeExpense)
                                <tr>
                                    <td>{{ $count2 }}</td>
                                    <td>{{ $financeExpense->date }}</td>
                                    <td>{{ $financeExpense->amount }}</td>
                                    <td>{{ $financeExpense->description }}</td>
                                </tr>
                                <?php $count2++; ?>
                            @endforeach

                        </table>
                    @else
                        <h4>Belum ada Pengeluaran</h4>
                    @endif
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')

@endsection