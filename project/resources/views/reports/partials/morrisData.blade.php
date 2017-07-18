<script type="text/javascript">
    $(function() {
        // Area Chart
        Morris.Area({
            element: 'morris-area-chart',
            data: [
                {
                    date: 'last',
                    income: 2778,
                }],
            xkey: 'date',
            ykeys: ['income'],
            labels: ['income'],
            pointSize: 2,
            hideHover: 'auto',
            resize: true
        });
    });

</script>