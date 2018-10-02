@extends('master')

@section('head')
@endsection

@section('contenido')

<div class="text-center" >
  <img alt="Geoturismo logo" src="http://nebula.wsimg.com/d3657b04208ae150f468167d20de36aa?AccessKeyId=B5E8C3F7E00CA38BCFD7&disposition=0&alloworigin=1">
</div>

<div class="row">
<form action="{{ route('Reservacion.update', $reservacion) }}" method="POST">
        {!! method_field('PUT') !!}
        {{ csrf_field() }}
<input type="hidden" name="realizaReserva" value="{{$realizaReserva}}">
<input type="hidden" name="paquete" value="{{$reservacion->paquete->IdPaquete}}">
<div class="col-md-7 col-md-offset-1">
 <div class="col-md-6">
   <div class="panel panel panel-info">
  <div class="panel-heading">
    <h3 class="panel-title">{{ $reservacion->paquete->NombrePaquete}}</h3>
  </div>
  <div class="panel-body">
    <div class="form-group">
      <label for="Destino" class="control-label">Ralizo reserva</label>
      <input type="text" class="form-control"  id="Destino" value="{{ $encargado->full_name}}" readonly >        
    </div>
    <div class="form-group">
      <label for="Destino" class="control-label">Fecha de viaje</label>
      <input type="text" class="form-control"  id="Destino" value="{{ $reservacion->paquete->FechaSalida}}" readonly>        
    </div>
    <div class="form-group">
      <label for="Destino" class="control-label">Lugar de salida</label>
      <input type="text" class="form-control"  id="Destino" value="{{ $reservacion->paquete->LugarRegreso}}" readonly>        
    </div>
    <div class="form-group">
      <label for="Destino" class="control-label">Hora de salida</label>
      <input type="text" class="form-control"  id="Destino" value="{{ $reservacion->paquete->HoraSalida}}" readonly>        
    </div>
    {{-- <div class="form-group">
      <label for="Destino" class="control-label">Destino</label>
      <input type="text" name="Destino" class="form-control"  id="Destino" value="{{ $reservacion->paquete->NombrePaquete}}" >        
    </div> --}}
    <div class="form-group">
      <label for="Destino" class="control-label">N°. Acompañantes</label>
      <input type="text" class="form-control"  id="Destino" value="{{ $reservacion->NumeroAcompanantes }}" readonly>        
    </div>   
  </div>
 </div>
</div>
 <div class="col-md-6">
<div class="table-responsive">
          <table class="table table-striped table-bordered table-hover" >
            <thead class="thead-dark">
             <th></th>
             <th>Nombre</th>
             <th>Apellido</th>
             <th>Genero</th>
            </thead>
              <tbody>
                @foreach($acompanantesT as $at)                 
                 <tr>
                  @foreach($arryIdsAcompanantes as $idS)
                   @if($at->Id == $idS)
                   <td align="center"><input type="checkbox" name="ids[]" value="{{ $at->Id }}" checked></td>
                   @break
                   @endif
                   @endforeach
                   <td>{{ $at->Nombre }}</td>                               
                   <td>{{ $at->Apellido }}</td>                               
                   @if($at->Genero == "M")
                    <td>Masculino</td>
                   @else
                    <td>Femenino</td>
                   @endif
                   
                </tr>
                @endforeach
              </tbody>
          </table>
      </div>
      </div>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-info center-block">Guardar</button>
      </div>
  </form>
  </div>


<div class="row">
  <form method="post" action="{{action('ReservacionController@update', $reservacion)}}">
    @csrf
    <input name="_method" type="hidden" value="PATCH">

    <div class="form-group col-md-2 has-feedback{{ $errors->has('numeroacompanantes') ? ' has-error' : '' }}">
      <label for="numeroacompanantes">No. Acompañantes *</label>
      <div class="input-group">
      <span class="input-group-addon"><span class="fa fa-users"></span></span>
      <input id="numeroacompanantes" value="{{$reservacion->NumeroAcompanantes}}" type="number" min="0" class="form-control" name="numeroacompanantes"  placeholder="0" required>
    </div>
      @if ($errors->has('numeroacompanantes'))
      <span class="help-block">{{ $errors->first('numeroacompanantes') }}</span>
      @endif
    </div>

    <div class="form-group col-md-5 has-feedback{{ $errors->has('idacompanantes') ? ' has-error' : '' }}">
      <label for="idacompanantes">Acompañantes *</label>
      <div class="input-group">
      <span class="input-group-addon"><span class="fa fa-users"></span></span>
      <input id="idacompanantes" value="{{$reservacion->IdsAcompanantes}}" type="text" class="form-control" name="idacompanantes"  placeholder="3,1,4" required>
    </div>
      @if ($errors->has('idacompanantes'))
      <span class="help-block">{{ $errors->first('idacompanantes') }}</span>
      @endif
    </div>

    <div class="row">
      <div class="col-md-12">
        <button type="submit" class="btn btn-info center-block">Guardar</button>
      </div>
      <!-- /.col -->
    </div>
  </form>
</div><!-- /.row -->


@endsection
