<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div align="center">
                <h4>Laporan Bulanan</h4>
            </div>
        </div>


    </div>

    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <tr>
                        <th>Tahun</th>
                        <th>Bulan</th>
                        <th>Total Penghasilan</th>
                    </tr>

                    @foreach($allReports as $allReport)
                        <tr>
                            <td>{{ $allReport->year }}</td>
                            <td>{{ $allReport->month }}</td>
                            <td>{{ $allReport->total_income }}</td>
                        </tr>
                    @endforeach
                </table>
                <br>
                {{ $allReports->links() }}
            </div>
        </div>
    </div>
</div>
