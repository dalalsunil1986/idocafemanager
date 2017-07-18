
<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Penghasilan Minggu Ini</h3>
        </div>
        <div class="panel-body">
            <div class="ct-chart ct-perfect-fourth"></div>
        </div>

    </div>

</div>

<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Jumlah Pelanggan Minggu Ini</h3>
        </div>
        <div class="panel-body">
            <div class="ct-chart-people ct-perfect-fourth"></div>
        </div>

    </div>

</div>

<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Makanan yang Laku</h3>
        </div>
        <div class="panel-body">
            <div class="ct-chart-pie-foods ct-perfect-fourth"></div>
        </div>

    </div>

</div>

<div class="col-md-6">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3>Minuman Yang Laku</h3>
        </div>
        <div class="panel-body">
            <div class="ct-chart-pie-drinks ct-perfect-fourth"></div>
        </div>

    </div>

</div>

<script type="text/javascript">
    var dataPeople = {
        labels: [
            @foreach($peopleCountReports as $peopleCountReport)
                    '{{ $peopleCountReport->date }}',
            @endforeach
        ],
        series: [
            [@foreach($peopleCountReports as $peopleCountReport) {{ $peopleCountReport->total_people }}, @endforeach],
        ]
    };

    // We are setting a few options for our chart and override the defaults
    var optionsPeople = {
        // Don't draw the line chart points
        showPoint: true,
        // Disable line smoothing
        lineSmooth: true,
        // X-Axis specific configuration
        axisX: {
            // We can disable the grid for this axis
            showGrid: true,
            // and also don't show the label
            showLabel: true
        },
        // Y-Axis specific configuration
        axisY: {
            onlyInteger:true,
            // Lets offset the chart a bit from the labels
            offset: 60,
            // The label interpolation function enables you to modify the values
            // used for the labels on each axis. Here we are converting the
            // values into million pound.
            labelInterpolationFnc: function(value) {
                return value + ' People';
            }
        }
    };

    // All you need to do is pass your configuration as third parameter to the chart function
    new Chartist.Line('.ct-chart-people', dataPeople, optionsPeople);
</script>

<script type="text/javascript">
    var dataIncome = {
        labels: [
            @foreach($orderReports as $order)
                    '{{ $order->date }}',
            @endforeach
        ],
        series: [
            [@foreach($orderReports as $order) {{ $order->total_income }}, @endforeach],
        ]
    };

    // We are setting a few options for our chart and override the defaults
    var optionsIncome = {
        // Don't draw the line chart points
        showPoint: true,
        // Disable line smoothing
        lineSmooth: true,
        // X-Axis specific configuration
        axisX: {
            // We can disable the grid for this axis
            showGrid: true,
            // and also don't show the label
            showLabel: true
        },
        // Y-Axis specific configuration
        axisY: {
            // Lets offset the chart a bit from the labels
            offset: 60,
            // The label interpolation function enables you to modify the values
            // used for the labels on each axis. Here we are converting the
            // values into million pound.
            labelInterpolationFnc: function(value) {
                return 'Rp.' + value;
            }
        }
    };

    // All you need to do is pass your configuration as third parameter to the chart function
    new Chartist.Line('.ct-chart', dataIncome, optionsIncome);
</script>

<script type="text/javascript">
    new Chartist.Pie('.ct-chart-pie-foods', {
        labels: [@foreach($bestFoods as $bestFood)'{{ $bestFood->name }}',@endforeach],
        series: [@foreach($bestFoods as $bestFood){{ $bestFood->totalFoods }},@endforeach]
    });
</script>

<script type="text/javascript">
    new Chartist.Pie('.ct-chart-pie-drinks', {
        labels: [@foreach($bestDrinks as $bestDrink)'{{ $bestDrink->name }}',@endforeach],
        series: [@foreach($bestDrinks as $bestDrink){{ $bestDrink->totalDrinks }},@endforeach]
    });
</script>