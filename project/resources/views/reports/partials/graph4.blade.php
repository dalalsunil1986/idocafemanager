<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div align="center">
                <h4>Laporan Harian</h4>
            </div>
        </div>


    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tr>
                        <th>Tanggal</th>
                        <th>Total Penghasilan</th>
                    </tr>

                    @foreach($dailyReports as $dailyReport)
                        <tr>
                            <td>{{ $dailyReport->date }}</td>
                            <td>{{ $dailyReport->total_income }}</td>
                        </tr>
                    @endforeach
                </table>
                <br>
                {{ $dailyReports->links() }}
            </div>
        </div>
    </div>
</div>
