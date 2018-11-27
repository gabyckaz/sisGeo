@extends('master')

@section('head')
@section('Title')
<STRONG>Transportes</STRONG>

@endsection

@section('contenido')
<div class="row">
  <div class="col-md-7 col-md-offset-2"><!-- Vista create -->
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
    @if($errors->has('placa'))
      <div class="box box-solid">
    @else
      <div class="box box-warning collapsed-box">
    @endif
      <div class="box-header">
        <h3 class="box-title"><STRONG>Agregar nueva unidad de transporte</STRONG></h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
        </div>
      </div>
      <div class="box-body">
        <form action="{{ route('adminTransporte.store') }}" method="POST">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="empresalquiler">Empresa</label>
                <select class="form-control" name="empresalquiler">
                  @foreach($empresalquiler as $empresa)
                    <option value="{{ $empresa->IdEmpresaTransporte }}" {{ old('empresalquiler') == $empresa->IdEmpresaTransporte ? 'selected' : '' }}>{{ $empresa->NombreEmpresaTransporte }}</option>
                  @endforeach
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tipotransporte">Tipo de transporte</label>
                <select class="form-control" name="tipotransporte">
                  @foreach($tipotransportes as $tipotransporte)
                    <option value="{{ $tipotransporte->IdTipoTransporte }}" {{ old('tipotransporte') == $tipotransporte->IdTipoTransporte ? 'selected' : '' }} >{{ $tipotransporte->NombreTipoTransporte }}</option>
                  @endforeach
                </select>
              </div>
            </div>
           </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="marca">Marca</label>
                <select  class="form-control" name="marca">
                  <option value="Toyota" {{ old('marca') == 'Toyota' ? 'selected' : '' }}>Toyota</option>
                  <option value="Blue Bird" {{ old('marca') == 'Blue Bird' ? 'selected' : '' }} >Blue Bird</option>
                  <option value="Ford" {{ old('marca') == 'Ford' ? 'selected' : '' }}>Ford</option>
                  <option value="Mercedez Benz" {{ old('marca') == 'Mercedez Benz' ? 'selected' : '' }} >Mercedez Benz</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="modelo">Modelo</label>
                <select  class="form-control" name="modelo">
                  <option value="Coaster" {{ old('modelo') == 'Coaster' ? 'selected' : '' }}>Coaster</option>
                  <option value="Hiace" {{ old('modelo') == 'Hiace' ? 'selected' : '' }} >Hiace</option>
                  <option value="All American" {{ old('modelo') == 'All American' ? 'selected' : '' }}>All American</option>
                  <option value="Ford B series" {{ old('modelo') == 'Ford B series' ? 'selected' : '' }} >Ford B series</option>
                </select>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="color">Color</label>
                <select  class="form-control" name="color">
                  <option value="Negro"  {{ old('color') == 'Negro' ? 'selected' : '' }} style="background-color: Black;color: #FFFFFF;">Negro</option>
                  <option value="Gris"  {{ old('color') == 'Gris' ? 'selected' : '' }} style="background-color: Gray;">Gris</option>
                  <option value="Blanco"  {{ old('color') == 'Blanco' ? 'selected' : '' }} style="background-color: White;">Blanco</option>
                  <option value="Amarillo"  {{ old('color') == 'Amarillo' ? 'selected' : '' }} style="background-color: Yellow;">Amarillo</option>
                  <option value="Anaranjado"  {{ old('color') == 'Anaranjado' ? 'selected' : '' }} style="background-color: Orange;">Anaranjado</option>
                  <option value="Beige"  {{ old('color') == 'Beige' ? 'selected' : '' }} style="background-color: Beige;">Beige</option>
                </select>
              </div>
            </div>
            <div class="col-md-4 has-feedback{{ $errors->has('placa') ? ' has-error' : '' }}">
              <label for="placa">Placa</label>
              <div class="input-group">
              <span class="input-group-addon">#</span></span>
              <input id="placa" type="text" class="form-control" name="placa" placeholder="Ej: B776123" size="7" required>
            </div>
              @if ($errors->has('placa'))
              <span class="help-block">{{ $errors->first('placa') }}</span>
              @endif
            </div>
            <div class="form-group col-md-4 has-feedback{{ $errors->has('numeroasientos') ? ' has-error' : '' }}">
              <label for="numeroasientos">No. Asientos</label>
              <div class="input-group">
              <span class="input-group-addon"><span class="fa fa-bus"></span></span>
              <input id="numeroasientos" type="number" min="10" class="form-control" name="numeroasientos" value="{{ old('numeroasientos') }}" placeholder="No. de asientos" required>
            </div>
              @if ($errors->has('numeroasientos'))
              <span class="help-block">{{ $errors->first('numeroasientos') }}</span>
              <span class="help-block">Tiene que ser de 1 a más asientos</span>
              @endif
            </div>
          </div>
          <div class="row">
            <label class=" col-md-12">Características</label>
            <div class="form-group col-md-3">
              <label class="">
              <input class="form-group" name="ac" type="checkbox" value="si" @if(old('ac')=="si") checked @endif checked>
              <i class="fa fa-thermometer-half"></i> Aire Acondicionado</label>
            </div>
            <div class="form-group col-md-3">
              <label class="" >
              <input class="form-group" name="tv" type="checkbox" value="si" @if(old('tv')=="si") checked @endif  checked >
              <i class="fa fa-television"></i> TV</label>
            </div>
            <div class="form-group col-md-3">
              <label  class=" form-group">
              <input  class="form-group" name="wifi" type="checkbox" value="si" @if(old('wifi')=="si") checked @endif  checked >
              <i class="fa fa-wifi"  title="Wifi"></i> Wifi</label>
            </div>
            <div class="form-group col-md-3">
              <label  class=" form-group">
              <input  class="form-group" name="asientos" type="checkbox" value="si" @if(old('wifi')=="si") checked @endif  checked >
              <i class="fa fa-user"  title="asientos"></i> Asientos Reclinables</label>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-12 has-feedback{{ $errors->has('observacionestransporte') ? ' has-error' : '' }}">
              <label for="observacionestransporte">Observaciones - <span style="color:gray"><i>Opcional</i></span></label>
              <div class="input-group">
                <span class="input-group-addon"><span class="fa fa-sticky-note"></span></span>
                <textarea id="observacionestransporte" type="text" class="form-control" name="observacionestransporte" placeholder="Observaciones">{{ old('observacionestransporte') }}</textarea>
              </div>
              @if ($errors->has('observacionestransporte'))
                <span class="help-block">{{ $errors->first('observacionestransporte') }}</span>
              @endif
            </div>
          </div>
          <div class="row">
            <div class="col-md-10 col-md-offset-4">
              <button type="submit" class="btn btn-info"><STRONG>Registrar</STRONG></button>
              <button type="reset" class="btn btn-warning"><STRONG>Limpiar</STRONG></button>
            </div>
          </div>
        </form>
      </div>
      </div>
  </div><!-- Fin de vista create -->
  <div class="col-md-7  col-md-offset-2"><!-- Vista index -->
    <div class="box box-warning">
      <div class="box-header">
        <h3 class="box-title"><STRONG>Listado de unidades de transporte</STRONG></h3>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover" id='tablaadminTransporte'>
            <thead class="thead-dark">
              <tr>
                <th class="text-center">Empresa</th>
                <th class="text-center">Tipo</th>
                <th class="text-center">No. Asientos</th>
                <th class="text-center">Extras</th>
                <th class="text-center">Observaciones</th>
                <th class="text-center">Opciones</th>
              </tr>
            </thead>
            <tbody>
              @foreach($transportes as $transporte)
                <tr>
                  <td>{{ $transporte->EmpresaAlquilerTransporte->NombreEmpresaTransporte }}</td>
                  <td>{{ $transporte->tipotransporte->NombreTipoTransporte}} </td>
                  <td>{{ $transporte->NumeroAsientos }}</td>
                  <td>@if($transporte->TieneAC=='si') <i class="fa fa-thermometer-half" aria-hidden="true" title="Aire acondicionado" ></i>@endif @if($transporte->TieneTV=='si') <i class="fa fa-television" aria-hidden="true" title="TV"></i>@endif @if($transporte->TieneWifi=='si') <i class="fa fa-wifi" aria-hidden="true" title="Wifi"></i>@endif  @if($transporte->TieneAsientos=='si') <i class="fa fa-user" aria-hidden="true" title="asientos"></i>@endif</td>
                  <td>{{ $transporte->ObservacionesTransporte }}</td>
                  <td><a class="btn btn-warning btn-sm fa fa-cog btn-block" title="Editar"
                                       href="{{ route('adminTransporte.edit', $transporte )}}"></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div><!-- Fin de vista index -->
</div>
@endsection
