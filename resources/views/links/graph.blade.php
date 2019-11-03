<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title">
        <a href="{{ $link->getCompleteShorturl() }}" target="_blank">{{ $link->getCompleteShorturl() }}</a><br>
    </h4>
</div>
<div class="modal-body text-center">
    @if (count($logs)==0)
        Aucune donnée disponible
    @else
        <canvas id="myChart" style="height:230px"></canvas>
    @endif
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Fermer</button>
</div>
@if (count($logs)>0)
    <script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var timeFormat = 'YYYY-MM-DD';

    var myChart = new Chart(ctx, {
        type: 'line',
        data:{
            datasets:[{
                data: @json($logs)
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                    }
                }],
                xAxes: [{
                    type:'time',
                    time: {
                        parser: timeFormat,
                        round: 'day',
                        tooltipFormat: 'DD/MM/YY',
                        displayFormats: {
                            'hour': 'HH:mm',
                            'day': 'DD/MM/YY',
                            'week': 'DD/MM/YY',
                            'month': 'DD/MM/YY',

                        }
                    },
                    scaleLabel: {
                        display: true,
                        labelString: 'Date'
                    }
                }]
            }
        }
    });
</script>
@endif
