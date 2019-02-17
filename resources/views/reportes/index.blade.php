
@extends('master')

@section('head')
@section('Title')
<STRONG>Reportes</STRONG>
@endsection

@section('contenido')

<div class="row">
  <div class="col-md-6">

    <div class="box box-warning">
      <div class="box-header">
        <h3 class="box-title"><STRONG>Reportes Generales</STRONG></h3>
      </div>
      <div class="box-body">
    <div class="list-group">
      <a title="Descargar como PDF" href="{{ route('adminRutaTuristica.reporte')}}" class="list-group-item list-group-item-action">Listado Rutas Turísticas</a>
      <a title="Descargar como PDF" href="{{ route('adminEmpresaTransporte.reporte') }}" class="list-group-item list-group-item-action">Empresas de Transporte</a>
      <a title="Descargar como PDF" href="{{ route('adminPaquete.costos.reporte')}}" class="list-group-item list-group-item-action">Paquetes más costos</a>
    </div>
  </div>
  </div>
  </div>

  <div class="col-md-6">
    <div class="box box-warning">
      <div class="box-header">
        <h3 class="box-title"><STRONG>Reportes específicos</STRONG></h3>
      </div>
      <div class="box-body">
        <form role="form" method="POST" action="{{route('reportes.show') }}" >
          {!! method_field('PUT') !!}
          {{ csrf_field()  }}
            <div class="form-group">
              <label for="tiporeporte">Tipo de reporte</label>
              <select  class="form-control" name="tiporeporte">
                <option value="Paquetesrealizados" {{ old('tiporeporte') == 'Paquetesrealizados' ? 'selected' : '' }}>Paquetes realizados</option>
                <option value="Pagos" {{ old('tiporeporte') == 'Pagos' ? 'selected' : '' }} >Pagos registrados</option>
                <option value="Usuarios" {{ old('tiporeporte') == 'Usuarios' ? 'selected' : '' }}>Usuarios registrados</option>
              </select>
            </div>

          <div class="col-md-6">
            <div class="form-group has-feedback{{ ( $errors->has('fechaInicio')) ? ' has-error' : '' }}">
              <label for="fechadesalida">Fecha de Inicio</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input name="fechaInicio" type="date" class="form-control pull-right" id="fechaInicio"  value="{{$todayDate = date("Y-m-d")}}" placeholder="d-m-Y" required>
                </div>
                @if ($errors->has('fechaInicio'))
                  <span class="help-block">{{ $errors->first('fechaInicio') }}</span>
                @endif
            </div>
          </div>

          <div class="col-md-6">
              <div class="form-group has-feedback{{ ( $errors->has('fechaFin')) ? ' has-error' : '' }}">
                <label for="fechaderegreso">Fecha de Fin</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input name="fechaFin" type="date" class="form-control pull-right" id="fechaFin" value="{{$todayDate = date("Y-m-d")}}" placeholder="Fecha de Regreso" required>
                  </div>
                  @if ($errors->has('fechaFin'))
                    <span class="help-block">{{ $errors->first('fechaFin') }}</span>
                  @endif
            </div>
          </div>
          <br><br><br><br><br><br>
          <div class="form-group" style="text-align:center">
            <button type="submit" class="btn btn-info">Consultar</button>
          </div>
      </form>
    </div>
    </div>
  </div>
</div>

@endsection
