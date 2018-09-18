@extends('master')

@section('head')

@section('Title','Asignación de transporte')
@endsection

@section('contenido')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
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
      <div class="box-header">
        <h3 class="box-title"></h3>
        <div class="box-tools">
          <button class="btn btn-box-tool"></button>
        </div><!-- /.box-tools -->
        </div>
              <div class="box-body">
                <form method="POST" action="{{$paquete->IdPaquete}}" files = "true" >
                <input name="_method" type="hidden" value="PUT">

                <div class="col-md-12">
                <div class="box box-warning">
                <!-- /.box-header -->
                <!-- form start -->
                <div class="box-body">

                <div class="form-group">
                  <label for="nombrepaquete">Nombre de Paquete Turístico</label>
                    <div class="input-group">
                      <span class="input-group-addon"><i class="fa fa-automobile"></i></span>
                      <input type="text" name="nombrepaquete" value="{{$paquete->NombrePaquete}}" class="form-control" id="nombrepaquete" placeholder="Nombre paquete" disabled>
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
                  <label for="cupos">Número de Asientos</label>
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
              <div class="form-group">
                <label for="transporte">Transporte</label>
                  <select class="form-control" name="transporte">
                    @foreach($transportes as $transporte)
                      <option value="{{ $transporte->IdTransporte }}">{{ $transporte->tipotransporte->NombreTipoTransporte}} de {{ $transporte->EmpresaAlquilerTransporte->NombreEmpresaTransporte }}.   Cupos: {{ $transporte->NumeroAsientos }}</option>
                    @endforeach
                  </select>
                  <p>Actualmente seleccionado el de cupos: {{$consulta}}</p>
                </div>
              </div>
              <div class="col-md-6">
              <div class="form-group">
                <label for="conductor">Conductor</label>
                  <select class="form-control" name="conductor">
                    @foreach($conductores as $conductor)
                      <option value="{{ $conductor->IdConductor}}">{{ $conductor->NombreConductor }} de {{$conductor->empresa->NombreEmpresaTransporte}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
             </div>


              </div>
                <!-- /.box-body -->

              <div class="box-footer">
                  <button type="submit" class="btn btn-info">Asignar transporte</button>
              </div>
                </div>
              </form>
      </div>
    </div>
  </div>
</div>

@endsection
