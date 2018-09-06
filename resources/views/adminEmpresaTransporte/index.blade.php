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
    <div class="box box-warning collapsed-box">
      <div class="box-header with-border">
        <h3 class="box-title">Registrar nueva empresa de transporte</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
        </div><!-- /.box-tools -->
        </div>
              <div class="box-body">

                <form action="{{ route('adminEmpresaTransporte.store') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="row">
                  <div class="form-group col-md-6 has-feedback{{ $errors->has('nombreempresa') ? ' has-error' : '' }}">
                    <label for="nombreempresa">Nombre de la empresa *</label>
                    <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-road"></span></span>
                     <input id="nombreempresa" type="text" class="form-control" name="nombreempresa"  placeholder="" required autofocus>
                   </div>
                    @if ($errors->has('nombreempresa'))
                    <span class="help-block">{{ $errors->first('nombreempresa') }}</span>
                    @endif
                  </div>
                  <div class="form-group col-sm-6 has-feedback{{ $errors->has('nombrecontacto') ? ' has-error' : '' }}">
                    <label for="nombrecontacto">Nombre del contacto *</label>
                    <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-user-circle"></span></span>
                    <input id="nombrecontacto" type="nombrecontacto" class="form-control" name="nombrecontacto"  placeholder="">
                  </div>
                    @if ($errors->has('nombrecontacto'))
                    <span class="help-block">{{ $errors->first('nombrecontacto') }}</span>
                    @endif
                  </div>
                  <div class="form-group col-sm-6 has-feedback{{ $errors->has('numerotelefono') ? ' has-error' : '' }}">
                    <label for="numerotelefono">Teléfono de contacto *</label>
                    <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                    <input id="numerotelefono" type="number" min="00000000" max="99999999" class="form-control" name="numerotelefono" placeholder="(Sin guiones. Ej: 22324560) " required>
                    </div>
                    @if ($errors->has('numerotelefono'))
                    <span class="help-block">{{ $errors->first('numerotelefono') }}</span>
                    @endif
                  </div>

                  <div class="form-group col-sm-6 has-feedback{{ $errors->has('emailempresa') ? ' has-error' : '' }}">
                    <label for="emailempresa">Correo electrónico *</label>
                    <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                    <input id="emailempresa" type="email" class="form-control" name="emailempresa" placeholder="" required>
                  </div>
                    @if ($errors->has('emailempresa'))
                    <span class="help-block">{{ $errors->first('emailempresa') }}</span>
                    @endif
                  </div>
                  <div class="form-group col-sm-12 has-feedback{{ $errors->has('observacionesempresa') ? ' has-error' : '' }}">
                    <label for="observacionesempresa">Observaciones</label>
                    <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-sticky-note"></span></span>
                    <textarea id="observacionesempresa" type="observacionesempresa" class="form-control" name="observacionesempresa" placeholder="Observaciones" ></textarea>
                  </div>
                    @if ($errors->has('observacionesempresa'))
                    <span class="help-block">{{ $errors->first('observacionesempresa') }}</span>
                    @endif
                  </div>
                </div>
                  <div class="row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-info center-block">Registrar</button>
                    </div>

                    <!-- /.col -->
                  </div>
              </form>



      </div>
      <div class="box-footer">
      * Estos campos son obligatorios
      </div>
    </div>
  </div>

  <div class="col-md-8  col-md-offset-2">
    <div class="box box-warning">
      <div class="box-header">
        <h3 class="box-title">Empresas</h3>
        </div>
              <div class="box-body">

                <table class="table table-striped table-bordered" >
                  <thead class="thead-dark">
                    <tr>

                    <th>@sortablelink('NombreEmpresaTransporte','Nombre')</th>
                    <th>Nombre de Contacto</th>
                    <th>Teléfono</th>
                    <th>Email</th>
                    <th>Opciones</th>

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
                             <a class="btn btn-warning btn-sm fa fa-cog btn-block" title="Editar"
                                     href="{{ route('adminEmpresaTransporte.edit', $empresa )}}"></a>
                          {{--   <a class="btn btn-primary btn-sm fa fa-user-plus" title="Empleados"
                                     href="{{  route('adminTipoTransporte.edit', $empresa )}}"></a>--}}
                            </td>
                        </tr>
                    @endforeach

                  </tbody>
                </table>
                {!! $empresalquiler->appends(\Request::except('page'))->render() !!}
              </div>
      </div>
    </div>
</div>
@endsection
