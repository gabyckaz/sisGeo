@extends('master')

@section('head')

@endsection

@section('contenido')
<title>Make Google Pie Chart in Laravel</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
<script type="text/javascript">
 var analytics = <?php echo $genero; ?>

 google.charts.load('current', {'packages':['corechart']});

 google.charts.setOnLoadCallback(drawChart);

 function drawChart()
 {
  var data = google.visualization.arrayToDataTable(analytics);
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

<div id="piechart_3d" style="width:750px; height:450px;">
</div>
@endsection
