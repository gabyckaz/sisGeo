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
                <label>Cupos a reservar</label>
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
            <div class="row">
              <p>Sleccionar forma de pago: </p>
              <div class="col-md-4">
               <div class="form-group">
                <button type="submit" class="btn btn-info">Completar reserva por medio de tarjeta o cuenta Pagadito</button>
               </div>
              </div>
            <!-- button type="reset" class="btn btn-warning ">Limpiar</button -->
            </div>

          <div class="row">
            <p>O a través de PuntoExpress *</p>
            <input type="hidden" name="@idTrx" value="123"/> <!-- Identifica la transaccion / La ponemos nosotros? -->
            <input type="hidden" name="@idRef" value="3234"/> <!-- Identifica la referencia de parte del comercio / La referencia que le ponen cuando lo hacen de forma manual, lo ideal 1 código por cada ruta -->
            <input type="hidden" name="@idUser" value="1"/> <!-- Usuario Asignado / Valor Geo= 194 -->
            <input type="hidden" name="@idSeller" value="1"/> <!-- Comercio o empresa afiliada a Puntoxpress / Valor Geo= 55 -->
            <input type="hidden" name="@currency" value="USD"/> <!-- Moneda de la transaccion  -->
            <input type="hidden" name="@amount" value="1000"/> <!-- Monto de la transaccion -->
            <input type="hidden" name="@validity" value="5"/> <!-- Dias de valides del comprobante o voleta de cobro / Consultar con Geo -->
            <input type="hidden" name="@fieldsAdded" value=""/> <!-- Campos extras en caso de que el comercio los requiera -->
            <input type="hidden" name="@dateTrx" value="20130225 15:59:59"/> <!-- Fecha de la transaccion segun el comercio / Setear fecha actual-->
            <input type="hidden" name="@phone"  value="69873350"/> <!-- Numero de telefono / Teléfono de quién? -->
            <input type="hidden" name="@email" value="sisgeo2018@outlook.es"/> <!-- Email a donde se debera de reenviar la voleta ocomprobante / Setear correo del cliente-->
            <input type="hidden" name="@urlRedirect" value="http://www.google.com/"/> <!-- Url a la que se redirige al usuario al cerrar el modal -->
            <button class="pexButton" type="button" onclick="PEX.box.tokenServ();"> <img src="img/PexButton.png" width="130" heght="60" alt="Puntoxpress"/> </button>
          </div>
           <div class="box-footer">
                <p>* Se genera ticket para luego realizar el pago en uno de los puntoexpress, puede consultar los puntos de pago en El Salvador <a href="http://www.puntoxpress.com/elsalvador/adonde-pago.html" >aquí</a></p>
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
