@extends('master')

@section('head')
@section('Title','Reservación')

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
 @if($usuarioreservando != null)
<div class="row">
  <div class="col-sm-12 col-md-6">
   <div class="">
    <div class="box box-warning collapsed-box">
      <div class="box-header">
         <h3 class="box-title">Familia</h3>
         <div class="box-tools pull-right">
           <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
         </div>
      </div>
      <div class="box-body">
        <form id="formularioFamilia" method="post">
            {{-- <p><b>Selected rows data</b></p>
            <pre id="view-rows2"></pre>
            <p><b>Form data as submitted to the server</b></p>
            <pre id="view-form2"></pre>
            <p><button class="btn btn-danger">View Selected</button><br/></p> --}}
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
            <p><button class="btn btn-info">Reservar</button><br/></p>
        </form>
      </div>
    </div>
    </div>
 </div>

<div class="col-sm-12 col-md-6">
  <div class="">
  <div class="box box-warning collapsed-box">
    <div class="box-header">
       <h3 class="box-title">Amigos</h3>
       <div class="box-tools pull-right">
         <button class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
       </div>
    </div>
      <div class="box-body">
        <form id="formularioAmigos" method="post">
            {{-- <p><b>Selected rows data</b></p>
            <pre id="view-rows"></pre>
            <p><b>Form data as submitted to the server</b></p>
            <pre id="view-form"></pre>
            <p><button class="btn btn-danger">View Selected</button><br/></p> --}}
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
            <p><button class="btn btn-info">Reservar</button><br/></p>
        </form>
      </div>
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
      <form action="{{ route('adminPaquete.reserva.add.store') }}" method="POST">
        {!! method_field('PUT') !!}
        {{ csrf_field() }}
        <div class="row">
        <div class="col-md-4">
          <div class="form-group">
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
           {{-- </div>
          </div> --}}
        </div>

        <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>% Anticipado requerido</label>
              <div class="input-group">
                  <span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
                 <input type="text" class="form-control" name="minimoPago" id="minimoPago" readonly>
              </div>
             </div>
          </div>
        </div>
         <div class="row">
          <div class="col-md-4">
            <div class="form-group">
              <label>Cantidad a abonar</label>
              <div class="input-group">
                <span class="input-group-addon"><span class="glyphicon glyphicon-usd"></span></span>
                <input type="text" class="form-control" name="abono" id="abono" placeholder="0.00" onkeypress="return filterFloat(event,this);">
              </div>
             </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
           <div class="form-group">
            <button type="submit" class="btn btn-info">Completar reserva</button>
           </div>
          </div>
        <!-- button type="reset" class="btn btn-warning ">Limpiar</button -->
        </div>
      <hr>
      <div class="row">
        <!-- Campos de PE, tienen que llevar type="hidden" pero se lo he quitado para mientras  -->
        <input  name="@idTrx" value="123"/>
        <input  name="@idRef" value="3234"/>
        <input  name="@idUser" value="1"/>
        <input  name="@idSeller" value="1"/>
        <input  name="@currency" value="USD"/>
        <input  name="@amount" value="1000"/>
        <input  name="@validity" value="5"/>
        <input  name="@fieldsAdded" value=""/>
        <input  name="@dateTrx" value="20130225 15:59:59"/>
        <input  name="@phone"  value="69873350"/>
        <input  name="@email" value="sisgeo2018@outlook.es"/>
        <input  name="@urlRedirect" value="http://www.google.com/"/>

        <button class="pexButton" type="button" onclick="PEX.box.tokenServ();"> <img src="img/PexButton.png" width="130" heght="60" alt="Puntoxpress"/> </button>
      </div>
       <div class="box-footer">
              <p>*Para poder realizar una reserva debes pagar almenos el 30%</p>
         </div>
      </form>
    </div>
  </div>
</div>      <!-- /.col -->
@else
 <div class="col-md-4">
     <div class="form-group">
  <p>ANTES DE REALIZAR LA RESERVA DEBE COMPLETAR SU INFORMACIÓN</p>
  <a href="{{ route('usuario.completar.informacion') }}" class="btn btn-default btn-flat">Completar información</a>
  </div>
    </div>
@endif
@endsection
