@extends('master')

@section('head')
@section('Title','Empresas de Transporte')

@endsection

@section('contenido')
<div class="row">
  @if(session('status'))
    <br>
     <script type="text/javascript">
    alertify.success("{{ session('status') }}");
    </script>
  @endif
  @if(session('fallo'))
    <br>
    <script type="text/javascript">
   alertify.error("{{ session('fallo') }}");
   </script>
  @endif
  @if(session('status') == 'Guardado con éxito')
    <div class="box box-solid collapsed-box">
  @else
    <div class="box box-solid">
  @endif
  <div class="col-md-6 col-md-offset-1">
    <div class="">
      <div class="box-header">
        <h3 class="box-title">Información básica</h3>
              <div class="box-body">
                <form method="post" action="{{action('EmpresaAlquilerTransporteController@update', $IdEmpresaAlquilerTransporte)}}">
                  @csrf
                  <input name="_method" type="hidden" value="PATCH">
                  <div class="form-group has-feedback{{ $errors->has('nombreempresa') ? ' has-error' : '' }}">
                    <label for="nombreempresa">Nombre de la empresa </label>
                    <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-road"></span></span>
                    <input id="nombreempresa" title="Nombre de empresa" value="{{ $empresalquiler->NombreEmpresaTransporte }}" placeholder="{{ $empresalquiler->NombreEmpresaTransporte }}" type="text" class="form-control" name="nombreempresa" value="{{ old('nombreempresa') }}" required autofocus>
                    </div>
                    @if ($errors->has('nombreempresa'))
                    <span class="help-block">{{ $errors->first('nombreempresa') }}</span>
                    @endif
                  </div>
                  <div class="form-group has-feedback{{ $errors->has('nombrecontacto') ? ' has-error' : '' }}">
                    <label for="nombrecontacto">Nombre del contacto </label>
                    <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-user-circle"></span></span>
                    <input id="nombrecontacto" title="Nombre de contacto" value="{{ $empresalquiler->NombreContacto }}" placeholder="{{ $empresalquiler->NombreContacto }}" type="text" class="form-control" name="nombrecontacto" value="{{ old('nombrecontacto') }}" >
                    </div>
                    @if ($errors->has('nombrecontacto'))
                    <span class="help-block">{{ $errors->first('nombrecontacto') }}</span>
                    @endif
                  </div>
                  <div class="form-group has-feedback{{ $errors->has('numerotelefono') ? ' has-error' : '' }}">
                    <label for="numerotelefono">Teléfono de contacto </label>
                    <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                    <input id="numerotelefono" title="No. Teléfono" value="{{ $empresalquiler->NumeroTelefonoContacto }}" placeholder="{{ $empresalquiler->NumeroTelefonoContacto }}" type="number" min="00000000" max="99999999" class="form-control" name="numerotelefono"  required>
                    </div>
                    @if ($errors->has('numerotelefono'))
                    <span class="help-block">{{ $errors->first('numerotelefono') }}</span>
                    @endif
                  </div>
                  <div class="form-group has-feedback{{ $errors->has('emailempresa') ? ' has-error' : '' }}">
                    <label for="emailempresa">Correo electrónico</label>
                    <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                    <input id="emailempresa" title="Correo electrónico" value="{{ $empresalquiler->EmailEmpresaTransporte }}" placeholder="{{ $empresalquiler->EmailEmpresaTransporte }}" type="email" class="form-control" name="emailempresa"  required>
                    </div>
                    @if ($errors->has('emailempresa'))
                    <span class="help-block">{{ $errors->first('emailempresa') }}</span>
                    @endif
                  </div>
                  <div class="form-group has-feedback{{ $errors->has('observacionesempresa') ? ' has-error' : '' }}">
                    <label for="observacionesempresa">Observaciones</label>
                    <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-sticky-note"></span></span>
                    <textarea id="observacionesempresa" title="Observaciones" value="{{ $empresalquiler->ObservacionesEmpresaTransporte }}" placeholder="{{ $empresalquiler->ObservacionesEmpresaTransporte }}" type="observacionesempresa" class="form-control" name="observacionesempresa" >{{ $empresalquiler->ObservacionesEmpresaTransporte }}</textarea>
                    </div>
                    @if ($errors->has('observacionesempresa'))
                    <span class="help-block">{{ $errors->first('observacionesempresa') }}</span>
                    @endif
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-info center-block">Guardar</button>
                    </div>
                    <!-- /.col -->
                  </div>
                </form>


              </div>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="">
      <div class="box-header">
        <h3 class="box-title">Conductores de  {{$empresalquiler->NombreEmpresaTransporte}}</h3>
              <div class="box-body">
                  <form class="form-horizontal" role="form" method="POST" action="{{route('adminEmpresaTransporte.conductor.add', $empresalquiler) }}" >

                  {{ csrf_field() }}
                  <fieldset>
                  <div class="col-md-12">
                 <div class="form-group has-feedback{{ $errors->has('conductor') ? ' has-error' : '' }}">
                   <label for="nombreempresa">Nombre de conductor </label>
                   <div class="input-group">
                   <span class="input-group-addon"><span class="fa fa-id-card"></span></span>
                    <input id="conductor" title="Nombre del conductor" type="text" class="form-control" name="conductor" value="{{ old('conductor') }}" required autofocus>
                  </div>
                    @if ($errors->has('conductor'))
                    <span class="help-block">{{ $errors->first('conductor') }}</span>
                    @endif
                  </div>
                </div>
                    <button type="submit" class="btn btn-info center-block">Agregar conductor</button>


                </fieldset>
                </form>

                <div class="row">

                  @if (count($conductores) === 0)
                    <br>
                    <p>No hay conductores registrados<p>
                  @elseif (count($conductores) >= 1)
                  <h3 class="box-title"> </h3>
                  <table class="table table-striped table-bordered" >
                    <thead class="thead-dark">
                      <tr>
                      <th>Nombre</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($conductores as $conductor)
                       <tr>
                         <td>{{ $conductor->NombreConductor }}</td>
                       </tr>
                    @endforeach
                    </tbody>
                  </table>
                  @endif


                </div>
              </div>
      </div>
    </div>
  </div>

</div>
@endsection
