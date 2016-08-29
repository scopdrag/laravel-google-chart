 @include('LaravelGoogleChart::includes.package_loader')
<div id="chart_{!! $id !!}"></div>
<script type="text/javascript">
    google.charts.setOnLoadCallback(function() {
    var data = google.visualization.arrayToDataTable({!!json_encode($data)!!});
    var options = {!! json_encode($options) !!};
    var material = new google.visualization.CandlestickChart(document.getElementById('chart_{!! $id !!}'));
    material.draw(data, options);
    });
</script> 