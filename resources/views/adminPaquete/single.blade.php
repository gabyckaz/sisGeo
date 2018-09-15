@extends('master')

@section('head')
@section('Title', $paquete->NombrePaquete)

@endsection

@section('contenido')
<div class="row">
    <div class="col-md-6"><!-- columna izquierda -->
          <!-- Que solo muestre 1 foto al inicio -->
      @foreach ($imagen as $key=>$imagenes)
        <?php  ++$key?>
          <a href="{{asset('storage/imagenesPaquete')}}/{{$imagenes->Imagen1}}">
              <img src="{{asset('storage/imagenesPaquete')}}/{{$imagenes->Imagen1}}" style=" margin-left: auto; margin-right: auto; display: block;"    >
          </a>
        @if($key == 1)
          @break
        @endif
      @endforeach

      @foreach ($imagen as $imagenes)
        <a href="{{asset('storage/imagenesPaquete')}}/{{$imagenes->Imagen1}}">
          <img src="{{asset('storage/imagenesPaquete')}}/{{$imagenes->Imagen1}}"  style="width: 200px; height: 200px; border: 334px vspace=10" class="img-responsive img-rounded col-md-4" >
        </a>
      @endforeach

    </div><!-- Fin de columna izquierda -->
      <div class="col-md-6"><!-- columna derecha -->
        <div class="box box-solid">
  <div class="box-header with-border">
    <h3 class="box-title"></h3>
    <span class="col-md-6 col-md-offset-3 label label-success pull-center"><h4>{{$paquete->ruta->pais->nombrePais}}</h4></span>
  </div>
  <!-- /.box-header -->
  <div class="box-body">
    <div class="box-group" id="accordion">
      <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
      <div class="panel box box-success">
        <div class="box-header with-border">
          <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
              Datos generales
            </a>
          </h4>
        </div>
        <div id="collapseOne" class="panel-collapse collapse in">
          <div class="box-body">
           {{$paquete->ruta->DatosGenerales}}
          </div>
        </div>
      </div>
      <div class="panel box box-success">
        <div class="box-header with-border">
          <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
              Descripción
            </a>
          </h4>
        </div>
        <div id="collapseTwo" class="panel-collapse collapse">
          <div class="box-body">
            {{$paquete->ruta->DescripcionRutaTuristica}}
          </div>
        </div>
      </div>
      <div class="panel box box-success">
        <div class="box-header with-border">
          <h4 class="box-title">
            <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
              Itinerario
            </a>
          </h4>
        </div>
        <div id="collapseThree" class="panel-collapse collapse">
          <div class="box-body">
            {{ $paquete->Itinerario}}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.box-body -->
</div>
<!-- /.box -->
        <table style="width:100%">
        <tr>
        <th>Salida</th>
        <th>Regreso</th>
        </tr>
        <tr>
        <td>{{ $paquete->FechaSalida}}</td>
        <td>{{ $paquete->FechaRegreso}}</td>
        </tr>
        <tr>
        <td>{{ $paquete->HoraSalida}} a.m.</td>
        <td></td>
        </tr>
        </table>
        <br>
        <p><b>Lugar de Regreso:</b> {{ $paquete->LugarRegreso}} </p>
        <br>

        <h3 style="text-align:center;"><b>Dificultad:</b> {{ $paquete->Dificultad}}</h3>
        <div style="text-align:center;"><h3>$<b>{{ $paquete->Precio}}</b> por persona</h3></div>
      </div><!-- Fin de columna derecha -->
  </div>
@endsection
