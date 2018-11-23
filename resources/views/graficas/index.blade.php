
@extends('master')

@section('head')

@endsection

@section('contenido')
<title>Make Google Pie Chart in Laravel</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

<!-- Grafica de Generos -->
<script type="text/javascript">
 var generos = <?php echo $genero; ?>

 google.charts.load('current', {'packages':['corechart']});

 google.charts.setOnLoadCallback(drawChart);

 function drawChart()
 {
  var data = google.visualization.arrayToDataTable(generos);
  var options = {
    title : 'Porcentajes de genero de usuarios',
    is3D: true,
    slices: {
      0: { color: 'orange' },
      1: { color: 'green' }
    }
  };
  var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
  chart.draw(data, options);
 }
</script>

<!-- Mapa de paises con paquetes realizados -->
<script type="text/javascript">
  var paises = <?php echo $pais; ?>

  google.charts.load('current', {
    'packages':['geochart'],
      'mapsApiKey': 'AIzaSyDpx9sGl-aow6KIWf_j2DLSspROtqt6UtM'
  });

  google.charts.setOnLoadCallback(drawRegionsMap);

  function drawRegionsMap() {
    var data = google.visualization.arrayToDataTable(paises);

    var options = {
      region: '013',
      colorAxis: {colors: ['orange','green']},
     };

    var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

    chart.draw(data, options);
  }
</script>

<!-- Grafica de barras con el numero de paquetes realizados -->
<script type="text/javascript">
var paquetes = <?php echo $paquete; ?>

google.charts.load('current', {'packages':['bar']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable(paquetes);

  var options = {
    chart: {
      title: 'Viajes realizados',
      subtitle: 'Numero de paquetes realizados en el año 2018',
    },
    bars: 'vertical',
    vAxis: {format: 'decimal'},
    height: 400,
    colors: ['orange']
  };

  var chart = new google.charts.Bar(document.getElementById('chart_div'));

  chart.draw(data, google.charts.Bar.convertOptions(options));

  var btns = document.getElementById('btn-group');

  btns.onclick = function (e) {

    if (e.target.tagName === 'BUTTON') {
      options.vAxis.format = e.target.id === 'none' ? '' : e.target.id;
      chart.draw(data, google.charts.Bar.convertOptions(options));
    }
  }
}
</script>

<!-- Grafica con categorias de rutas -->
<script type="text/javascript">
var categorias = <?php echo $categorias; ?>

  google.charts.load("current", {packages:["corechart"]});
  google.charts.setOnLoadCallback(drawChart);
  function drawChart() {
    var data = google.visualization.arrayToDataTable(categorias);

    var options = {
      title: 'Paquetes turísticos por categoría',
      pieHole: 0.4,
    };

    var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
    chart.draw(data, options);
  }
</script>

<center>
<div id="piechart_3d" style="width:750px; height:450px;"></div>
<h4>Rutas Turísticas por país</h4>
<div id="regions_div" style="width: 900px; height: 500px;"></div>
<br>
<br>
<br>
<br>
<div id="chart_div" style="width: 900px; height: 400px;"></div>
<div id="donutchart" style="width: 900px; height: 500px;"></div>
</center>
@endsection
