@extends('master')

@section('head')

@section('Title')
<strong>Asignación de transporte y conductor</strong>
@endsection

@section('contenido')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    @if(session('status'))
      <br>
      <script type="text/javascript">
        alertify.success('<h4><i class="icon fa fa-ban"></i> Alert!</h4> {{ session('status') }}');
      </script>
    @endif
    @if(session('fallo'))
      <br>
      <script type="text/javascript">
        alertify.error('<h4><i class="icon fa fa-ban"></i> Alert!</h4> {{ session('fallo') }}');
      </script>
    @endif
    <form method="POST" action="{{ route('adminPaquete.asignaTransCondPaquete', $paquete->IdPaquete) }}" >
      {{-- <input name="_method" type="hidden" value="PUT"> --}}
      {!! method_field('PUT') !!}
      {!! csrf_field() !!}
      <div class="box-header">
      </div>
      <div class="box-body">
        <div class="row">
          <div class="form-group">
            <label for="nombrepaquete">Nombre de Paquete Turístico</label>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-automobile"></i></span>
                <input type="text" name="nombrepaquete" value="{{$paquete->NombrePaquete}}" class="form-control" id="nombrepaquete" placeholder="Nombre paquete" disabled>
              </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="fechadesalida">Fecha de Salida</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input name="fechasalida" type="date" class="form-control pull-right" id="fechasalida" placeholder="Fecha de Salida" value="{{ $paquete->FechaSalida}}" disabled>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="hora">Hora de Salida</label>
              <div class="input-group time">
                <div class="input-group-addon">
                  <i class="fa fa-history"></i>
                </div>
                <input name="hora" type="time" id="hora"  max="24:00:00" min="00:00:00" class="form-control pull-right" value="{{$paquete->HoraSalida}}" disabled>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label for="fechaderegreso">Fecha de Regreso</label>
              <div class="input-group date">
                <div class="input-group-addon">
                  <i class="fa fa-calendar"></i>
                </div>
                <input name="fecharegreso" type="date" class="form-control pull-right" id="fecharegreso" placeholder="Fecha de Regreso" value="{{$paquete->FechaRegreso}}" disabled>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
              <label for="lugar">Lugar de Salida</label>
                <div class="input-group">
                  <input type="text" name="lugarsalida" class="form-control" id="lugarsalida" placeholder="Lugar" value="{{$paquete->LugarRegreso}}" disabled>
                  <span class="input-group-addon"><i class="fa fa-map"></i></span>
                </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="form-group">
                <label for="cupos">Cupos</label>
                <div class="input-group">
                  <span class="input-group-addon">
                    <i class="fa fa-child"></i>
                  </span>
                  <input  class="form-control" name="cupos" type="number" min="1" step="1" max="10,0000" value="{{$paquete->Cupos}}" id="cupos" disabled>
                </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group has-feedback{{ session()->has('etransporte') ? ' has-error' : '' }}">
              <label for="transporte">Transporte</label>
              <select class="form-control" name="transporte" id="selectIdTransporte">
                <option value="idDefault">Selecciona un transporte</option>
                @foreach($transportes as $transporte)
                  <option value="{{$paquete->IdPaquete}}-{{ $transporte->IdEmpresaTransporte }}-{{ $transporte->IdTransporte}}">
                    {{ $transporte->Placa_Matricula}}-{{ $transporte->tipotransporte->NombreTipoTransporte}} de
                    {{ $transporte->empresaalquilertransporte->NombreEmpresaTransporte }}. {{ $transporte->NumeroAsientos }} asientos
                  </option>
                @endforeach
              </select>
              @if(session()->has('etransporte'))
               <span class="help-block">{{ session()->get('etransporte') }}</span>
              @endif
              <br>
              @if (count($transportesasignados) == 0)
                <p>No hay transporte asignado<p>
              @elseif (count($transportesasignados) >= 1)
              <p>Transporte asignado</p>
                @foreach($transportesasignados as $transporteasignado)
                  <p>{{$transporteasignado->NombreTipoTransporte}} {{$transporteasignado->Marca}} {{$transporteasignado->Modelo}} {{$transporteasignado->Color}} <br>
                 Placa: {{$transporteasignado->Placa_Matricula}} No. Asientos: {{$transporteasignado->NumeroAsientos}} <br>Empresa: {{$transporteasignado->NombreEmpresaTransporte}}</p>
                @endforeach
              @endif
            </div>
          </div>
          <div class="col-md-6" >
            <div class="form-group has-feedback{{ session()->has('econductor') ? ' has-error' : '' }}">
              <label for="conductor">Conductor</label>
              <select class="form-control" name="conductor" id="selectConductor">
              </select>
              @if(session()->has('econductor'))
                <span class="help-block">{{ session()->get('econductor') }}</span>
              @endif
              <br>
              @if (count($conductoresasignados) == 0)
                <p>No hay conductor asignado<p>
              @elseif (count($conductoresasignados) >= 1)
              <p>Conductor asignado</p>
                @foreach($conductoresasignados as $conductor)
                  <p>{{$conductor->NombreConductor}}</p>
                @endforeach
              @endif
            </div>
            <input type="hidden" id="rutaListaConductores" value="{{ route('adminPaquete.listaConductores') }}">
          </div>
        </div>
      </div>
      <!-- /.box-body -->
      <div class="box-footer text-center">
        <button type="submit" class="btn btn-info" @if($paquete->compara_fechas == 1 ) disabled @else '' @endif>Asignar transporte</button>
      </div>
    </form>
    </div>
  </div>
</div>

@endsection
