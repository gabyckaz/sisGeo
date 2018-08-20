@extends('master')

@section('head')
<h1>Hola Mundo</h1>

@endsection

@section('contenido')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    @if(session('status'))
      <br>
        <div class="alert alert-success alert-dismissible fade in" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" style="text-decoration: none">&times;</a>
          {{ session('status') }}
        </div>
    @endif
    @if(session('fallo'))
      <br>
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" style="text-decoration: none">&times;</a>
          {{ session('fallo') }}
      </div>
    @endif
    <div class="box box-info collapsed-box">
      <div class="box-header with-border">
        <h3 class="box-title">Registrar nueva empresa de transporte</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div><!-- /.box-tools -->
        </div>
              <div class="box-body">

                <form action="{{ route('adminEmpresaTransporte.store') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="form-group has-feedback{{ $errors->has('nombreempresa') ? ' has-error' : '' }}">
                    <input id="nombreempresa" type="text" class="form-control" name="nombreempresa"  placeholder="Nombre de la empresa" required autofocus>
                    <span class="glyphicon glyphicon-road form-control-feedback"></span>
                    @if ($errors->has('nombreempresa'))
                    <span class="help-block">{{ $errors->first('nombreempresa') }}</span>
                    @endif
                  </div>
                  <div class="form-group has-feedback{{ $errors->has('nombrecontacto') ? ' has-error' : '' }}">
                    <input id="nombrecontacto" type="nombrecontacto" class="form-control" name="nombrecontacto"  placeholder="Nombre del contacto">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if ($errors->has('nombrecontacto'))
                    <span class="help-block">{{ $errors->first('nombrecontacto') }}</span>
                    @endif
                  </div>
                  <div class="form-group has-feedback{{ $errors->has('numerotelefono') ? ' has-error' : '' }}">
                    <input id="numerotelefono" type="number" min="00000000" max="99999999" class="form-control" name="numerotelefono" placeholder="Teléfono de contacto. Ej: 22331100" required>
                    <span class="glyphicon glyphicon-earphone form-control-feedback"></span>
                    @if ($errors->has('numerotelefono'))
                    <span class="help-block">{{ $errors->first('numerotelefono') }}</span>
                    @endif
                  </div>

                  <div class="form-group has-feedback{{ $errors->has('emailempresa') ? ' has-error' : '' }}">
                    <input id="emailempresa" type="email" class="form-control" name="emailempresa" placeholder="Email" required>
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('emailempresa'))
                    <span class="help-block">{{ $errors->first('emailempresa') }}</span>
                    @endif
                  </div>
                  <div class="form-group has-feedback{{ $errors->has('observacionesempresa') ? ' has-error' : '' }}">
                    <textarea id="observacionesempresa" type="observacionesempresa" class="form-control" name="observacionesempresa" placeholder="Observaciones" ></textarea>
                    <span class="glyphicon glyphicon-bookmark form-control-feedback"></span>
                    @if ($errors->has('observacionesempresa'))
                    <span class="help-block">{{ $errors->first('observacionesempresa') }}</span>
                    @endif
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-info btn-block btn-flat">Registrar</button>
                    </div>

                    <!-- /.col -->
                  </div>
              </form>



      </div>
    </div>
  </div>

  <div class="col-md-8  col-md-offset-2">
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Empresas</h3>
        </div>
              <div class="box-body">

                <table class="table table-striped table-bordered" >
                  <thead class="thead-dark">
                    <tr>

                    <th>Nombre</th>
                    <th>Nombre de Contacto</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th></th>

                    </tr>
                  </thead>
                  <tbody>
                  @foreach($empresalquiler as $empresa)
                     <tr>
                       <td>{{ $empresa->NombreEmpresaTransporte }}</td>
                       <td>{{ $empresa->NombreContacto }}</td>
                       <td>{{ $empresa->NumeroTelefonoContacto }}</td>
                        <td>{{ $empresa->EmailEmpresaTransporte }}</td>
                           <td>
                             <a class="btn btn-primary btn-sm fa fa-pencil-square-o btn-block" title="Editar"
                                     href="{{ route('adminEmpresaTransporte.edit', $empresa )}}"></a>
                          {{--   <a class="btn btn-primary btn-sm fa fa-user-plus" title="Empleados"
                                     href="{{  route('adminTipoTransporte.edit', $empresa )}}"></a>--}}
                            </td>
                        </tr>
                    @endforeach

                  </tbody>
                </table>

              </div>
      </div>
    </div>
</div>
@endsection
