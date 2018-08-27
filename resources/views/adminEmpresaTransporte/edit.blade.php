@extends('master')

@section('head')


@endsection

@section('contenido')
<div class="row">
  <div class="col-md-6 col-md-offset-1">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Empresa de transporte</h3>
              <div class="box-body">
                <form method="post" action="{{action('EmpresaAlquilerTransporteController@update', $IdEmpresaAlquilerTransporte)}}">
                  @csrf
                  <input name="_method" type="hidden" value="PATCH">
                  <div class="form-group has-feedback{{ $errors->has('nombreempresa') ? ' has-error' : '' }}">
                    <input id="nombreempresa" title="Nombre de empresa" value="{{ $empresalquiler->NombreEmpresaTransporte }}" placeholder="{{ $empresalquiler->NombreEmpresaTransporte }}" type="text" class="form-control" name="nombreempresa" value="{{ old('nombreempresa') }}" required autofocus>
                    <span class="glyphicon glyphicon-road form-control-feedback"></span>
                    @if ($errors->has('nombreempresa'))
                    <span class="help-block">{{ $errors->first('nombreempresa') }}</span>
                    @endif
                  </div>
                  <div class="form-group has-feedback{{ $errors->has('nombrecontacto') ? ' has-error' : '' }}">
                    <input id="nombrecontacto" title="Nombre de contacto" value="{{ $empresalquiler->NombreContacto }}" placeholder="{{ $empresalquiler->NombreContacto }}" type="text" class="form-control" name="nombrecontacto" value="{{ old('nombrecontacto') }}" >
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('nombrecontacto'))
                    <span class="help-block">{{ $errors->first('nombrecontacto') }}</span>
                    @endif
                  </div>
                  <div class="form-group has-feedback{{ $errors->has('numerotelefono') ? ' has-error' : '' }}">
                    <input id="numerotelefono" title="No. Teléfono" value="{{ $empresalquiler->NumeroTelefonoContacto }}" placeholder="{{ $empresalquiler->NumeroTelefonoContacto }}" type="number" min="00000000" max="99999999" class="form-control" name="numerotelefono"  required>
                    <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                    @if ($errors->has('numerotelefono'))
                    <span class="help-block">{{ $errors->first('numerotelefono') }}</span>
                    @endif
                  </div>
                  <div class="form-group has-feedback{{ $errors->has('emailempresa') ? ' has-error' : '' }}">
                    <input id="emailempresa" title="Correo electrónico" value="{{ $empresalquiler->EmailEmpresaTransporte }}" placeholder="{{ $empresalquiler->EmailEmpresaTransporte }}" type="email" class="form-control" name="emailempresa"  required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('emailempresa'))
                    <span class="help-block">{{ $errors->first('emailempresa') }}</span>
                    @endif
                  </div>
                  <div class="form-group has-feedback{{ $errors->has('observacionesempresa') ? ' has-error' : '' }}">
                    <textarea id="observacionesempresa" title="Observaciones" value="{{ $empresalquiler->ObservacionesEmpresaTransporte }}" placeholder="{{ $empresalquiler->ObservacionesEmpresaTransporte }}" type="observacionesempresa" class="form-control" name="observacionesempresa" ></textarea>
                    <span class="glyphicon glyphicon-bookmark form-control-feedback"></span>
                    @if ($errors->has('observacionesempresa'))
                    <span class="help-block">{{ $errors->first('observacionesempresa') }}</span>
                    @endif
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-primary btn-block btn-flat">Guardar</button>
                    </div>
                    <!-- /.col -->
                  </div>
                </form>


              </div>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Conductores de  {{$empresalquiler->NombreEmpresaTransporte}}</h3>
              <div class="box-body">
                  <form class="form-horizontal" role="form" method="POST" action="{{route('adminEmpresaTransporte.conductor.add', $empresalquiler) }}" >

                  {{ csrf_field() }}
                  <fieldset>
                  <div class="col-md-12">
                 <div class="form-group has-feedback{{ $errors->has('conductor') ? ' has-error' : '' }}">
                    <input id="conductor" title="Nombre del conductor" type="text" class="form-control" name="conductor" value="{{ old('conductor') }}" required autofocus>
                    <span class="fa fa-id-card-o form-control-feedback"></span>
                    @if ($errors->has('conductor'))
                    <span class="help-block">{{ $errors->first('conductor') }}</span>
                    @endif
                  </div>
                </div>
                    <button type="submit" class="btn btn-default btn-block btn-flat">Agregar conductor</button>


                </fieldset>
                </form>

                <div class="row">

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


                </div>
              </div>
      </div>
    </div>
  </div>

</div>
@endsection
