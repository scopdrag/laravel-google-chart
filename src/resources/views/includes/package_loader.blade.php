<script>
    document.addEventListener("DOMContentLoaded", function (event) {
        if (!google.charts.loadedCurrently) {
            google.charts.load('current', {packages: ['corechart', 'bar', 'annotationchart', 'treemap', 'wordtree']});
            google.charts.loadedCurrently = true;
        }
    });
</script>
@yield('content')

