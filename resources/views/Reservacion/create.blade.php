@extends('master')

@section('head')
@section('Title','Reservación '. $paquete->NombrePaquete)

@endsection

@section('contenido')
    @if(session()->has('message'))
      <script type="text/javascript">
        alertify.error('<h4><i class="icon fa fa-ban"></i> Alert!</h4>{{ session()->get('message') }}');
      </script>
    @endif
    @if(session('fallo'))
      <script type="text/javascript">
     alertify.error("{{ session('fallo') }}");
     </script>
    @endif
 @if($usuarioreservando != null) <!-- Si el cliente ya completó su información -->
    <p>Seleccione sus acompañantes para la excursión, si no los tiene registrados lo puede hacer <a href="{{ route('user.agregar.familiarAmigo') }}">aquí</a></p>
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="box box-warning collapsed-box">
          <div class="box-header">
              <h3 class="box-title">Familia</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
              </div>
          </div>
          <div class="box-body">
            <form id="formularioFamilia" method="post">
                <table id="tablaFamilia" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Tipo</th>
                            <th>Genero</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach( $familia as $familiar)
                        <tr>
                            <td>{{$familiar->Id}}</td>
                            <td>{{ ucfirst(strtolower($familiar->Nombre)) }}</td>
                            <td>{{ ucfirst(strtolower($familiar->Apellido)) }}</td>
                            <td>Familia</td>
                            <td>{{ $familiar->Genero == "M" ?'Masculino' : 'Femenino' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <p><button class="btn btn-info">Agregar personas</button><br/></p>
            </form>
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="box box-warning collapsed-box">
          <div class="box-header">
              <h3 class="box-title">Amigos</h3>
              <div class="box-tools pull-right">
                 <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
              </div>
          </div>
          <div class="box-body">
            <form id="formularioAmigos" method="post">
                <table id="tablaAmigos" class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Tipo</th>
                            <th>Genero</th>
                        </tr>
                    </thead>
                    <tbody>
                      @foreach( $amigos as $amigo)
                        <tr>
                            <td>{{$amigo->Id}}</td>
                            <td>{{ ucfirst(strtolower($amigo->Nombre)) }}</td>
                            <td>{{ ucfirst(strtolower($amigo->Apellido)) }}</td>
                            <td>Amig@</td>
                            <td>{{ $amigo->Genero == "M" ?'Masculino' : 'Femenino' }}</td>
                        </tr>
                      @endforeach
                    </tbody>
                </table>
                <p><button class="btn btn-info">Agregar personas</button><br/></p>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-7 col-md-offset-2">
        <div class="box-header">
            <h3 class="box-title">Complete los campos para la reserva</h3>
            <div class="box-tools pull-right">
              <button class="btn btn-box-tool" ></button>
            </div>
        </div>
        <div class="box-body">
          <!-- <form action="{{ route('adminPaquete.reserva.add.store') }}" method="POST"> -->
          <form action="{{ route('cobro') }}" method="POST">
            <!-- {!! method_field('PUT') !!} -->
            {{ csrf_field() }}
            <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <input type="hidden" value="{{ $paquete->NombrePaquete }}" name="descripcion" readonly/>
                <input type="hidden" value="{{ url('MostrarPaqueteCliente/'.$paquete->IdPaquete) }}" name="url" readonly/>
                <input type="hidden" value="{{ Auth::user()->id }}" name="idusuario" readonly/>
                <input type="hidden" value="{{$userTurista[0]->Nombre }}" name="nombrecliente" readonly/>
                <input type="hidden" value="{{$userTurista[0]->Apellido }}" name="apellidocliente" readonly/>
                <div class="checkbox">
                  <label><input id="usuario" type="checkbox" name="usuario" value="{{$userTurista[0]->Id}}" checked>
                   {{$userTurista[0]->Nombre}} {{$userTurista[0]->Apellido}}
                  </label>
                </div>
              </div>
             </div>
             </div>
            <div class="row">
              <div class="col-md-4">
              <div class="form-group">
                <label>Cupos a reservar *</label>
                  <div class="input-group">
                    <span class="input-group-addon">N°</span>
                    <input type="text" class="form-control" name="total" id="total" readonly>
                  </div>
               </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Costo por persona</label>
                  <div class="input-group">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
                      <input type="text" class="form-control" name="cpersona" id="cpersona" value="{{ $paquete->Precio }}" readonly>
                  </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="form-group">
                  <label>Costo total</label>
                    <div class="input-group">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
                      <input type="text" class="form-control" name="ctotal" id="ctotal" readonly>
                    </div>
                </div>
              </div>
              <input type="hidden" class="form-control" name="strFamilia" id="strFamilia">
              <input type="hidden" class="form-control" name="strAmigos" id="strAmigos" >
              <input type="hidden" class="form-control" name="IdPaquete" value="{{ $paquete->IdPaquete }}" >
            </div>
            <!-- <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>% Anticipado requerido</label>
                  <div class="input-group">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
                     <input type="text" class="form-control" name="minimoPago" id="minimoPago" readonly>
                  </div>
                 </div>
              </div>
            </div> -->
             <!-- <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                  <label>Cantidad a abonar</label>
                  <div class="input-group">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
                    <input type="text" class="form-control" name="abono" id="abono" placeholder="0.00" onkeypress="return filterFloat(event,this);">
                  </div>
                 </div>
              </div>
            </div> -->
            <br>
               <div class="form-group">
                <center><button type="submit" class="btn btn-info">Reservar</button></center>
                <br>
                <center><p>Al reservar acepto que he leído las <a href="/condiciones" target="_blank" >Condiciones</a>  e <a href="/migratoria" target="_blank" >Información migratoria</a></p></center>
               </div>
            <br>
           <div class="box-footer">
             <p>Para completar el pago se redireccionará a un sitio externo(Pagadito)</p>
             <p>*Para reservar debe pagar el 100% del costo</p>
            </div>
          </form>
    </div>

@else <!-- Si el cliente no ha completó su información -->
    <div class="col-md-4">
      <div class="form-group">
        <p>ANTES DE REALIZAR LA RESERVA DEBE COMPLETAR SU INFORMACIÓN</p>
        <a href="{{ route('usuario.completar.informacion') }}" class="btn btn-default btn-flat">Completar información</a>
      </div>
    </div>
@endif
@endsection
