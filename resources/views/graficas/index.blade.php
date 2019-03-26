
@extends('master')

@section('head')
@section('Title')
<STRONG>Estadísticas</STRONG>
@endsection

@section('contenido')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
function imprSelec(grafica_generos)
{
  var ficha=document.getElementById(grafica_generos);
  var ventimp=window.open(' ','popimpr');
  ventimp.document.write(ficha.innerHTML);
  ventimp.document.close();
  ventimp.print();
  ventimp.close();
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
      colorAxis: {colors: ['orange','green']}
     };
    var chart = new google.visualization.GeoChart(document.getElementById('mapa_paises'));
    chart.draw(data, options);
  }
</script>

<!-- Gráfica de Generos -->
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
  google.visualization.events.addListener(chart, 'ready', function () {
    document.getElementById('grafica_generos_png').outerHTML = '<a href="' + chart.getImageURI() + '"> <i class="fa fa-file-image-o" aria-hidden="true"></i> Exportar imagen</a>';
  });
  chart.draw(data, options);
 }
</script>

<!-- Gráfica con categorias de rutas -->
<script type="text/javascript">
  var categorias = <?php echo $categorias; ?>

    google.charts.load("current", {packages:["corechart"]});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable(categorias);
      var options = {
        title: 'Paquetes turísticos por categoría',
        is3D: true,
        colors: ['orange','green','#5dcaba','#2c8f4f','#f8d895','#64ab7d']
      };

      var chart = new google.visualization.PieChart(document.getElementById('grafica_categorias'));
      google.visualization.events.addListener(chart, 'ready', function () {
        document.getElementById('grafica_categorias_png').outerHTML = '<a href="' + chart.getImageURI() + '"> <i class="fa fa-file-image-o" aria-hidden="true"></i> Exportar imagen</a>';
      });
      chart.draw(data, options);
    }
</script>

<!-- Gráfica de Tipos de pago -->
<script type="text/javascript">
 var tipos = <?php echo $tipospago; ?>

 google.charts.load('current', {'packages':['corechart']});
 google.charts.setOnLoadCallback(drawChart);

 function drawChart()
 {
  var data = google.visualization.arrayToDataTable(tipos);
  var options = {
    title : 'Tipos de pagos registrados',
    is3D: true,
    slices: {
      0: { color: 'orange' },
      1: { color: 'green' },
      2: { color: '#2c8f4f' }
    }
  };
  var chart = new google.visualization.PieChart(document.getElementById('grafica_tipos'));
  google.visualization.events.addListener(chart, 'ready', function () {
    document.getElementById('grafica_tipos_png').outerHTML = '<a href="' + chart.getImageURI() + '"> <i class="fa fa-file-image-o" aria-hidden="true"></i> Exportar imagen</a>';
  });
  chart.draw(data, options);
 }
</script>

<!-- Gráfica nuevos usuarios por mes -->
<script type="text/javascript">
  var nuevos_usuarios = <?php echo $nuevos_usuarios; ?>

  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable(nuevos_usuarios);
    var options = {
      chart: {
        title: 'Nuevos usuarios',
        subtitle: 'Número de usuarios registrados mensualmente',
      },
      bars: 'vertical',
      vAxis: {format: 'decimal'},
      height: 400,
      colors: ['orange']
    };
    var chart = new google.charts.Bar(document.getElementById('grafica_nuevos_usuarios'));
    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>

<!-- Gráfica de barras con el numero de paquetes realizados -->
<script type="text/javascript">
  var paquetes = <?php echo $paquete; ?>

  google.charts.load('current', {'packages':['bar']});
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {
    var data = google.visualization.arrayToDataTable(paquetes);
    var options = {
      chart: {
        title: 'Viajes realizados',
        subtitle: 'Número de paquetes realizados',
      },
      bars: 'vertical',
      vAxis: {format: 'decimal'},
      height: 400,
      colors: ['orange']
    };
    var chart = new google.charts.Bar(document.getElementById('grafica_paquetes'));
    chart.draw(data, google.charts.Bar.convertOptions(options));
  }
</script>

<!-- Gráfica de costos de transporte mensuales -->
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
  }
</script>


<div class="row">
  <div class="col-md-6">
    <div class="box box-warning collapsed-box">
      <div class="box-header">
        <h3 class="box-title"><STRONG>Cumpleañeros de {{$mes_actual}}: </STRONG></h3>
        <span data-toggle="tooltip" title="3 New Messages" class="badge bg-yellow"><STRONG>{{$total_cumples}}</STRONG></span>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover" id=tablaCumples>
            <thead class="thead-dark">
              <tr>
                <th class="text-center">Nombre</th>
                <th class="text-center">Email</th>
                <th class="text-center">Fecha</th>
              </tr>
            </thead>
            <tbody>
              @foreach($cumples as $cumple)
                <tr>
                  <td>{{$cumple->PrimerNombrePersona}} {{$cumple->PrimerApellidoPersona}}</td>
                  <td>{{$cumple->email}}</td>
                  <td>{{$cumple->FechaNacimiento}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-6">
    <div class="box box-warning collapsed-box">
      <div class="box-header">
        <h3 class="box-title"><STRONG>Últimos usuarios registrados</STRONG></h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
        </div>
      </div>
      <div class="box-body no-padding">
        <ul class="users-list clearfix">
          @foreach($usuarios as $usuario)
          <li>
            <img src="{{ Storage::url( $usuario->avatar ) }}" class="img-circle" alt="User Image" style="height: 50px; width:50px; ">
            <p>{{$usuario->name}}</p>
            <span class="users-list-date" style=" font-size: 10pt">{{$usuario->fecha}}</span>
          </li>
          @endforeach
        </ul>
      </div>
      <!-- <div class="box-footer text-center">
        <a href="{{ route('adminUser.index') }}">Ver todos</a>
      </div> -->
    </div>
  </div>
</div>

<!-- Para imprimir gráfica -->
<div class="row">
  <div class="col-md-12">
    <p class="text-center"><b>Rutas Turísticas por país</b></p>
    <center>
    <div id="mapa_paises" style="width: 900px; height: 500px;"></div>
    <a href="javascript:imprSelec('mapa_paises')"><i class="fa Example of download fa-download"></i> Imprimir gráfica</a>
  </center>
    <br><br>
    <br>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div id="grafica_generos" style="width:640px; height:400px;"></div>
    <a href="javascript:imprSelec('grafica_generos')"><i class="fa Example of download fa-download"></i> Imprimir gráfica</a>
    <div id='grafica_generos_png'></div>
    <br><br><br>
    <div id="grafica_tipos" style="width: 640px; height: 400px;"></div>
    <a href="javascript:imprSelec('grafica_tipos')"><i class="fa Example of download fa-download"></i> Imprimir gráfica</a>
    <div id='grafica_tipos_png'></div>
  </div>
  <div class="col-md-6">
    <div id="grafica_categorias" style="width: 640px; height: 400px;"></div>
    <a href="javascript:imprSelec('grafica_categorias')"><i class="fa Example of download fa-download"></i> Imprimir gráfica</a>
    <div id='grafica_categorias_png'></div>
  </div>
</div>
<div class="row">
  <div class="col-md-12">
    <br><br><br><br>
    <center><div id="grafica_nuevos_usuarios" style="width: 1000px; height: 450px;"></div></center>
    <a href="javascript:imprSelec('grafica_nuevos_usuarios')"><i class="fa Example of download fa-download"></i> Imprimir gráfica</a>
  </div>
  <div class="col-md-12">
    <br><br><br><br>
    <center><div id="grafica_paquetes" style="width: 1000px; height: 450px;"></div></center>
    <a href="javascript:imprSelec('grafica_paquetes')"><i class="fa Example of download fa-download"></i> Imprimir gráfica</a>
  </div>
  <div class="col-md-12">
    <br><br><br><br>
    <center><div id="grafica_costos" style="width: 1000px; height: 450px;"></div></center>
    <a href="javascript:imprSelec('grafica_costos')"><i class="fa Example of download fa-download"></i> Imprimir gráfica</a>
  </div>
</div>

@endsection
