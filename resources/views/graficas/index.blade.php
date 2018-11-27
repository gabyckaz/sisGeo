
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
  var chart = new google.visualization.PieChart(document.getElementById('grafica_generos'));
//   google.visualization.events.addListener(chart, 'ready', function () {
//   grafica_generos.innerHTML = '<img src="' + chart.getImageURI() + '">';
//   console.log(grafica_generos.innerHTML);
// });
  chart.draw(data, options);
  document.getElementById('png').outerHTML = '<a href="' + chart.getImageURI() + '">Otra forma de impresion</a>';
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
    var chart = new google.visualization.GeoChart(document.getElementById('mapa_paises'));
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
  var chart = new google.charts.Bar(document.getElementById('grafica_paquetes'));
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

<script type="text/javascript">
var costos = <?php echo $costos; ?>

google.charts.load('current', {'packages':['bar']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {
  var data = google.visualization.arrayToDataTable(costos);
  var options = {
    chart: {
      title: 'Gastos realizados',
      subtitle: 'Costo en dólares de transporte',
    },
    bars: 'vertical',
    vAxis: {format: 'decimal'},
    height: 400,
    colors: ['orange']
  };

  var chart = new google.charts.Bar(document.getElementById('grafica_costos'));
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

    var chart = new google.visualization.PieChart(document.getElementById('grafica_categorias_1'));
    chart.draw(data, options);
  }
</script>

<!-- Para imprimir gráfica -->
<script type="text/javascript">
function imprSelec(grafica_generos)
{var ficha=document.getElementById(grafica_generos);var ventimp=window.open(' ','popimpr');ventimp.document.write(ficha.innerHTML);ventimp.document.close();ventimp.print();ventimp.close();}
</script>

<center>
<div id="grafica_generos" style="width:750px; height:450px;"></div>
<a href="javascript:imprSelec('grafica_generos')">Imprimir gráfica</a>
<div id='png'></div>
<h4>Rutas Turísticas por país</h4>
<div id="mapa_paises" style="width: 900px; height: 500px;"></div>
<br>
<br>
<br>
<br>
<div id="grafica_paquetes" style="width: 900px; height: 400px;"></div>
<div id="grafica_costos" style="width: 900px; height: 400px;"></div>
<div id="grafica_categorias_1" style="width: 900px; height: 500px;"></div>
</center>
@endsection
