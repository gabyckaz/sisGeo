@extends('master')

@section('head')
@section('Title')
<STRONG>Empresas de Transporte</STRONG>
@endsection

@section('contenido')
<div class="row">
  <div class="col-md-7 col-md-offset-2">
    @if(session('status'))
      <br>
       <script type="text/javascript">
      alertify.success('<h4><i class="icon fa fa-check"></i> Alert!</h4> {{ session("status") }}');
      </script>
    @endif
    @if(session('fallo'))
      <br>
      <script type="text/javascript">
     alertify.error('<h4><i class="icon fa fa-ban"></i> Alert!</h4> {{session("fallo") }}');
     </script>
    @endif

    <!-- Validaciones para que si hay un error, quede a la vista y no se cierre el box -->
    @if($errors->has('numeroTelefono') || $errors->has('nombreEmpresa') ||
        $errors->has('nombreContacto') || $errors->has('emailEmpresa') || $errors->has('observacionesEmpresa'))
      <div class="box box-solid">
    @else
      <div class="box box-warning collapsed-box">
    @endif

      <div class="box-header">
        <h3 class="box-title"><STRONG>Registrar nueva empresa de transporte</STRONG></h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
        </div>
      </div>
        <div class="box-body">
          <form action="{{ route('adminEmpresaTransporte.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
              <div class="form-group col-md-6 has-feedback{{ $errors->has('nombreEmpresa') ? ' has-error' : '' }}">
                <label for="nombreEmpresa">Nombre de la empresa</label>
                <div class="input-group">
                  <span class="input-group-addon"><span class="fa fa-road"></span></span>
                  <input id="nombreEmpresa" type="text" class="form-control" name="nombreEmpresa" value="{{ old('nombreEmpresa') }}" placeholder="" required autofocus>
                </div>
                @if ($errors->has('nombreEmpresa'))
                  <span class="help-block">{{ $errors->first('nombreEmpresa') }}</span>
                @endif
              </div>
              <div class="form-group col-sm-6 has-feedback{{ $errors->has('nombreContacto') ? ' has-error' : '' }}">
                <label for="nombreContacto">Nombre del contacto</label>
                <div class="input-group">
                  <span class="input-group-addon"><span class="fa fa-user-circle"></span></span>
                  <input id="nombreContacto" type="nombreContacto" class="form-control" name="nombreContacto"  value="{{ old('nombreContacto') }}" required placeholder="">
                </div>
                @if ($errors->has('nombreContacto'))
                  <span class="help-block">{{ $errors->first('nombreContacto') }}</span>
                @endif
              </div>
              <div class="form-group col-sm-3">
                <label for="codigoArea">Código de país</label>
                  <div class="input-group">
                           <select class="form-control" name="codigoArea" id="codigoArea" value="{{ old('codigoArea') }}">
                            <option value="503" >503 - El Salvador</option>
                            <option value="501" >501 - Belice</option>
                            <option value="502" >502 - Guatemala</option>
                            <option value="504" >504 - Honduras</option>
                            <option value="505" >505 - Nicaragua</option>
                            <option value="506" >506 - Costa Rica</option>
                          </select>
                    </div>
                </div>
              <div class="form-group col-sm-4 has-feedback{{ $errors->has('numeroTelefono') ? ' has-error' : '' }}">
                <label for="numeroTelefono">Teléfono de contacto</label>
                <div class="input-group">
                  <span class="input-group-addon"><span class="fa fa-phone"></span></span>
                  <input id="numeroTelefono" type="number" min="00000000" max="99999999" class="form-control" name="numeroTelefono" value="{{ old('numeroTelefono') }}" placeholder="(Ej: 22324560) " required>
                </div>
                  @if ($errors->has('numeroTelefono'))
                    <span class="help-block">{{ $errors->first('numeroTelefono') }}</span>
                  @endif
              </div>
              <div class="form-group col-sm-5 has-feedback{{ $errors->has('emailEmpresa') ? ' has-error' : '' }}">
                <label for="emailEmpresa">Correo electrónico</label>
                <div class="input-group">
                  <span class="input-group-addon"><span class="fa fa-envelope"></span></span>
                  <input id="emailEmpresa" type="email" class="form-control" name="emailEmpresa" value="{{ old('emailEmpresa') }}" placeholder="" required>
                </div>
                @if ($errors->has('emailEmpresa'))
                  <span class="help-block">{{ $errors->first('emailEmpresa') }}</span>
                @endif
              </div>
              <div class="form-group col-sm-12 has-feedback{{ $errors->has('observacionesEmpresa') ? ' has-error' : '' }}">
                <label for="observacionesEmpresa">Observaciones - <span style="color:gray"><i>Opcional</i></span></label>
                <div class="input-group">
                  <span class="input-group-addon"><span class="fa fa-sticky-note"></span></span>
                  <textarea id="observacionesEmpresa" type="observacionesEmpresa" class="form-control" name="observacionesEmpresa" value="{{ old('observacionesEmpresa') }}" placeholder="Observaciones" >{{ old('observacionesEmpresa') }}</textarea>
                </div>
                @if ($errors->has('observacionesEmpresa'))
                  <span class="help-block">{{ $errors->first('observacionesEmpresa') }}</span>
                @endif
              </div>
            </div>
            <div class="row">
              <div class="col-md-10 col-md-offset-4">
                <button type="submit" class="btn btn-info "><STRONG>Registrar</STRONG></button>
                <button type="reset" class="btn btn-warning "><STRONG>Limpiar</STRONG></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-7 col-md-offset-2">
    <div class="box box-warning">
      <div class="box-header">
        <h3 class="box-title"><STRONG>Listado de Empresas</STRONG>
        <a class="btn btn-info" href="{{ route('adminEmpresaTransporte.reporte') }}">PDF</a></h3>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover" id='tablaadminEmpresa'>
            <thead class="thead-dark">
              <tr>
                <th class="text-center">Nombre de Empresa</th>
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
                  <td><a class="btn btn-warning btn-sm fa fa-cog btn-block" title="Editar"
                                     href="{{ route('adminEmpresaTransporte.edit', $empresa )}}"></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
