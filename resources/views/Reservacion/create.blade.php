@extends('master')

@section('head')
@section('Title','Reservación')

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

      <div class="box-header">
        <h3 class="box-title">Complete los campos para la reserva</h3>
        <div class="box-tools pull-right">
          <button class="btn btn-box-tool" ></button>
        </div>
        </div>
          <div class="box-body">

            <form action="{{ route('Reservacion.store') }}" method="POST">
              {{ csrf_field() }}
              <div class="row">
                <div class="form-group col-md-3 has-feedback{{ $errors->has('numeroacompanantes') ? ' has-error' : '' }}">
                  <label for="numeroacompanantes">No. Acompañantes *</label>
                  <div class="input-group">
                  <span class="input-group-addon"><span class="fa fa-users"></span></span>
                  <input id="numeroacompanantes" type="number" min="0" class="form-control" name="numeroacompanantes"  placeholder="0" required>
                </div>
                  @if ($errors->has('numeroacompanantes'))
                  <span class="help-block">{{ $errors->first('numeroacompanantes') }}</span>
                  @endif
                </div>

                <div class="form-group col-md-5 has-feedback{{ $errors->has('idacompanantes') ? ' has-error' : '' }}">
                  <label for="idacompanantes">Acompañantes *</label>
                  <div class="input-group">
                  <span class="input-group-addon"><span class="fa fa-users"></span></span>
                  <input id="idacompanantes" type="text" class="form-control" name="idacompanantes"  placeholder="3,1,4" required>
                </div>
                  @if ($errors->has('idacompanantes'))
                  <span class="help-block">{{ $errors->first('idacompanantes') }}</span>
                  @endif
                </div>
                <p><b>Paquete seleccionado:</b> {{$paquete}}</div>
                      <input type="hidden" name="idPaquete" value="{{ $paquete}}" />

            </div>
              <div class="row">
                <div class="col-md-10 col-md-offset-4">
                  <!-- Verifica si el usuario actual ha copletado su informacion de turista -->
                    @if(is_int($usuarioreservando))
                      <p><b>Usted es el turista: {{$usuarioreservando}} <b></p>
                      <button type="submit" class="btn btn-info ">Completar reserva</button>
                      <button type="reset" class="btn btn-warning ">Limpiar</button>
                    @else
                      <p>ANTES DE REALIZAR LA RESERVA DEBE COMPLETAR SU INFORMACIÓN</p>
                      <a href="{{ route('usuario.completar.informacion') }}" class="btn btn-default btn-flat">Completar información</a>
                    @endif

                </div>

                <!-- /.col -->
              </div>
          </form>

        </div>
    </div>
  </div>

</div>
@endsection
