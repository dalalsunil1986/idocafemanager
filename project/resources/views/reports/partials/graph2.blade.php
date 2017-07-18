@if(count($yesterdayIncome)>0)
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div align="center">
                    <h1>Penghasilan Hari Ini</h1>
                </div>
            </div>

            <div class="panel-body">
                <div align="center">
                    <h1 style="color:#2ca02c;">
                        @if(!null($todayIncome))
                            <b><i>Rp.{{ $todayIncome['0']->todays_income }},-</i></b>
                        @else
                            <b><i>Belum ada Penghasilan</i></b>
                        @endif
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div align="center">
                    <h1>Penghasilan Kemarin</h1>
                </div>
            </div>

            <div class="panel-body">
                <div align="center">
                    <h1 style="color:#2ca02c;">
                        @if(!null($todayIncome))
                            <b><i>Rp.{{ $todayIncome['0']->todays_income }},-</i></b>
                        @else
                            <b><i>Belum Ada Penghasilan</i></b>
                        @endif
                    </h1>
                </div>
            </div>
        </div>
    </div>
@else
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div align="center">
                    <h1>Penghasilan Hari Ini</h1>
                </div>
            </div>

            <div class="panel-body">
                <div align="center">
                    <h1 style="color:#2ca02c;"><b><i>Rp.{{ $todayIncome['0']->todays_income }},-</i></b></h1>
                </div>
            </div>
        </div>
    </div>
@endif