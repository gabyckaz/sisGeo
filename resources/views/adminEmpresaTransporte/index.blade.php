@extends('master')

@section('head')
@section('Title','Empresas de Transporte')

@endsection

@section('contenido')
<div class="row">
  <div class="col-md-7 col-md-offset-2">
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
    @if($errors->has('numeroTelefono'))
      <div class="box box-solid">
    @else
      <div class="box box-solid collapsed-box">
    @endif

      <div class="box-header">
        <h3 class="box-title">Registrar nueva empresa de transporte</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
        </div>
        </div>
              <div class="box-body">

                <form action="{{ route('adminEmpresaTransporte.store') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="row">
                  <div class="form-group col-md-6 has-feedback{{ $errors->has('nombreempresa') ? ' has-error' : '' }}">
                    <label for="nombreempresa">Nombre de la empresa *</label>
                    <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-road"></span></span>
                     <input id="nombreempresa" type="text" class="form-control" name="nombreempresa" value="{{ old('nombreempresa') }}" placeholder="" required autofocus>
                   </div>
                    @if ($errors->has('nombreempresa'))
                    <span class="help-block">{{ $errors->first('nombreEmpresa') }}</span>
                    @endif
                  </div>
                  <div class="form-group col-sm-6 has-feedback{{ $errors->has('nombrecontacto') ? ' has-error' : '' }}">
                    <label for="nombrecontacto">Nombre del contacto *</label>
                    <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-user-circle"></span></span>
                    <input id="nombrecontacto" type="nombrecontacto" class="form-control" name="nombrecontacto"  value="{{ old('nombrecontacto') }}" required placeholder="">
                  </div>
                    @if ($errors->has('nombrecontacto'))
                    <span class="help-block">{{ $errors->first('nombrecontacto') }}</span>
                    @endif
                  </div>
                  <div class="form-group col-sm-6 has-feedback{{ $errors->has('numeroTelefono') ? ' has-error' : '' }}">
                    <label for="numeroTelefono">Teléfono de contacto *</label>
                    <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                    <input id="numeroTelefono" type="number" min="00000000" max="99999999" class="form-control" name="numeroTelefono" value="{{ old('numeroTelefono') }}" placeholder="(Sin guiones. Ej: 22324560) " required>
                    </div>
                    @if ($errors->has('numeroTelefono'))
                    <span class="help-block">{{ $errors->first('numeroTelefono') }}</span>
                    @endif
                  </div>

                  <div class="form-group col-sm-6 has-feedback{{ $errors->has('emailempresa') ? ' has-error' : '' }}">
                    <label for="emailempresa">Correo electrónico *</label>
                    <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                    <input id="emailempresa" type="email" class="form-control" name="emailempresa" value="{{ old('emailempresa') }}" placeholder="" required>
                  </div>
                    @if ($errors->has('emailempresa'))
                    <span class="help-block">{{ $errors->first('emailempresa') }}</span>
                    @endif
                  </div>
                  <div class="form-group col-sm-12 has-feedback{{ $errors->has('observacionesempresa') ? ' has-error' : '' }}">
                    <label for="observacionesempresa">Observaciones</label>
                    <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-sticky-note"></span></span>
                    <textarea id="observacionesempresa" type="observacionesempresa" class="form-control" name="observacionesempresa" value="{{ old('observacionesempresa') }}" placeholder="Observaciones" >{{ old('observacionesempresa') }}</textarea>
                  </div>
                    @if ($errors->has('observacionesempresa'))
                    <span class="help-block">{{ $errors->first('observacionesempresa') }}</span>
                    @endif
                  </div>
                </div>
                  <div class="row">
                    <div class="col-md-10 col-md-offset-4">
                      <button type="submit" class="btn btn-info ">Registrar</button>
                      <button type="reset" class="btn btn-warning ">Limpiar</button>
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

  <div class="col-md-7 col-md-offset-2">
    <div class="">
      <div class="box-header">
        <h3 class="box-title">Listado de Empresas</h3>
        </div>
              <div class="box-body">
               <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" >
                  <thead class="thead-dark">
                    <tr>

                    <th class="text-center">@sortablelink('NombreEmpresaTransporte','Nombre')</th>
                    <th class="text-center">Nombre de Contacto</th>
                    <th class="text-center">Teléfono</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Opciones</th>

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
                </div>
              <center>{!! $empresalquiler->appends(\Request::except('page'))->render() !!}</center>
            </div>
      </div>
    </div>
</div>
@endsection
