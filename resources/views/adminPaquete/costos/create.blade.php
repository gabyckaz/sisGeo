@extends('master')

@section('head')
@section('Title')
<STRONG>Costos de {{$paquete->NombrePaquete}}</STRONG>

@endsection

@section('contenido')
@if(session('status'))
  <script type="text/javascript">
    alertify.success('<h4><i class="icon fa fa-check"></i> Alert!</h4> {{ session("status") }}');
  </script>
@endif
@if(session('fallo'))
  <script type="text/javascript">
    alertify.error('<h4><i class="icon fa fa-ban"></i> Alert!</h4> {{session("fallo") }}');
  </script>
@endif
<div class="row">
  <div class="col-md-7 col-md-offset-2">
      <div class="box box-solid">
      <div class="box-header">
        <h3 class="box-title"><STRONG></STRONG></h3>
      </div>
      <div class="box-body">
        <form action="{{ route('adminPaquete.costos.store', $paquete->IdPaquete) }}" method="POST">
          {{ csrf_field() }}
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <div class="form-group">
                <label for="precio">Agregar costos</label>
                <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-money"></i> $</span>
                  <input class="form-control" name="precio" type="number" min="10.00"  step="0.01" max="9000.00" value="{{ $costo }}" placeholder="100.00" id="precio" required>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-11 col-md-offset-5">
              <button type="submit" class="btn btn-info "><STRONG>Registrar</STRONG></button>
            </div>
          </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
