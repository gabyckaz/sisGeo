@extends('master')

@section('head')

@endsection
@section('Title')
<strong>Opciones Paquete</strong>
@endsection
@section('contenido')
@if(session('status'))
  <br>
  <script type="text/javascript">
 alertify.success("{{ session('status') }}");
 </script>
    <div class="alert alert-success alert-dismissible fade in" role="alert">
      <a href="#" class="close" data-dismiss="alert" aria-label="close" style="text-decoration: none">&times;</a>
      {{ session('status') }}
    </div>
@endif
@if(session('fallo'))
  <br>
    <div class="alert alert-danger alert-dismissible fade in" role="alert">
      <a href="#" class="close" data-dismiss="alert" aria-label="close" style="text-decoration: none">&times;</a>
      {{ session('fallo') }}
  </div>
@endif


<div class="row">

  <div class="col-md-4">
    @if(session('status'))

      <script type="text/javascript">
     alertify.success('<h4><i class="icon fa fa-check"></i> Alert!</h4> {{ session('status') }}');
     </script>
        <{{-- div class="alert alert-success alert-dismissible fade in" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" style="text-decoration: none">&times;</a>
          {{ session('status') }}
        </div> --}}
    @endif
    @if(session('fallo'))
    <script type="text/javascript">
     alertify.success('<h4><i class="icon fa fa-ban"></i> Alert!</h4> {{ session('status') }}');
     </script>
     {{--  <br>
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" style="text-decoration: none">&times;</a>
          {{ session('fallo') }}
      </div> --}}
    @endif
    <div class="box box-warning">
      <div class="box-header">
        <h3 class="box-title">Agregar Gastos Extras</h3>
        <div class="box-body">

          <form class="form-horizontal" role="form" method="POST" action="{{ route('adminOpcionesPaquete.store') }}">
            {{ csrf_field() }}
            <fieldset>
              <div class="col-md-12" >
            <div class="form-group has-feedback{{ $errors->has('opcionespaquete') ? ' has-error' : '' }}">
              <div class="input-group">
                      <span class="input-group-addon"><span class="fa fa-credit-card"></span></span>
                  <input id="gastosextras" type="text" class="form-control" name="gastosextras" value="{{ old('gastosextras') }}" required autofocus>
              </div>
                <div class="input-group">
              <span class="input-group-addon"><span class="fa fa-money"></span></span>
              <input id="gastos" type="number" class="form-control" name="gastos" value="{{ old('gastos') }}" required autofocus>
            </div>
              @if ($errors->has('gastosextras'))
              <span class="help-block">{{ $errors->first('gastosextras') }}</span>
              @endif
            </div>
          </div>

                    <button type="submit" class="btn btn-info center-block">Agregar Gasto Extra</button>
            </fieldset>
          </form>
            <h3 class="box-title"> </h3>
            <div class="row">
               <div class="panel-body">
              <table class="table table-striped table-bordered table-hover" id="tablaGastosExtras">
                <thead class="thead-dark">
                  <tr>
                  <th align="center">Gastos</th>
                  <th align="center">Valor</th>
                  <th align="center">Eliminar</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($gastosextras as $gasto)
                   <tr>
                     <td align="center">{{ $gasto->NombreGastos }}</td>
                     <td align="center">{{ $gasto->Gastos}}</td>
                     <td align="center"> <a href="{{route('adminOpcionesPaquete.eliminargastosextras', $gasto['IdGastosExtras'])}}"
                     class="btn btn-danger btn-sm"> <font color="white" size="2"> <b> X</b>
                     </font>
                     </a> </td>
                   </tr>
                  @endforeach
                </tbody>
              </table>
                  <center>{!! $gastosextras->appends(\Request::except('page'))->render() !!}</center>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>


    <div class="col-md-4">
    <div class="">
    <div class="box box-warning">
      <div class="box-header">
        <h3 class="box-title">Agregar Que incluye Paquete</h3>
              <div class="box-body">
                <form class="form-horizontal" role="form"  method="POST" action="{{ route('adminOpcionesPaquete.guardarincluye') }}">
                  {{ csrf_field() }}
                  <fieldset>
                    <div class="col-md-12">
                  <div class="form-group has-feedback{{ $errors->has('incluye') ? ' has-error' : '' }}">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="fa fa-newspaper-o"></span></span>
                    <input id="incluye" type="text" class="form-control" name="incluye" value="{{ old('incluye') }}" required autofocus>
                  </div>
                    @if ($errors->has('incluye'))
                    <span class="help-block">{{ $errors->first('incluye') }}</span>
                    @endif
                  </div>
                  </div>
                        <button type="submit" class="btn btn-info center-block">Agregar Que Incluye</button>
                  </fieldset>
                </form>
                  <div class="row">

                    <h3 class="box-title"> </h3>
                    <table class="table table-striped table-bordered table-hover" id="tablaQueIncluye">
                      <thead class="thead-dark">
                        <br>
                        <br>
                        <br>
                        <tr>
                        <th align="center">Que incluye</th>
                        <th align="center">Eliminar</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($incluye as $in)
                         <tr>
                           <td align="center">{{ $in->NombreIncluye }}</td>
                           <td align="center"> <a href="{{route('adminOpcionesPaquete.eliminarincluye', $in['IdIncluye'])}}"
                           class="btn btn-danger btn-sm"> <font color="white" size="2"> <b> X</b>
                           </font>
                           </a> </td>
                         </tr>
                        @endforeach
                      </tbody>
                    </table>
                    <center>{!! $incluye->appends(\Request::except('page'))->render() !!}</center>

                  </div>
              </div>
      </div>
    </div>
  </div>
</div>

   <div class="col-md-4">
     <div class="">
    <div class="box box-warning">
      <div class="box-header">
        <h3 class="box-title">Agregar Recomendaciones</h3>
              <div class="box-body">
                <form class="form-horizontal" role="form" method="POST" action="{{ route('adminOpcionesPaquete.guardarrecomendaciones') }}" >
                  {{ csrf_field() }}
                  <fieldset>
                    <div class="col-md-12">
                  <div class="form-group has-feedback{{ $errors->has('recomendaciones') ? ' has-error' : '' }}">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="fa fa-pencil-square"></span></span>
                    <input id="recomendaciones" type="text" class="form-control" name="recomendaciones" value="{{ old('recomendaciones') }}" required autofocus>
                  </div>
                    @if ($errors->has('recomendaciones'))
                    <span class="help-block">{{ $errors->first('recomendaciones') }}</span>
                    @endif
                  </div>
                </div>
                      <button type="submit" class="btn btn-info center-block">Agregar Recomendaciones</button>
                </fieldset>
              </form>
                  <div class="row">
                    <h3 class="box-title"> </h3>
                    <table class="table table-striped table-bordered table-hover" id="tablaRecomendaciones" >
                      <thead class="thead-dark">
                        <br>
                        <br>
                        <br>
                        <tr>
                        <th align="center">Recomendaciones</th>
                        <th align="center">Eliminar</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($recomendaciones as $re)
                         <tr>
                           <td align="center">{{ $re->NombreRecomendaciones }}</td>
                           <td align="center"> <a href="{{route('adminOpcionesPaquete.eliminarrecomendaciones', $re['IdRecomendaciones'])}}"
                           class="btn btn-danger btn-sm"> <font color="white" size="2"> <b> X</b>
                           </font>
                           </a> </td>
                         </tr>
                        @endforeach
                      </tbody>
                    </table>
                      <center>{!! $recomendaciones->appends(\Request::except('page'))->render() !!}</center>

                  </div>
              </div>
      </div>
    </div>
  </div>
</div>
</div>
<div class="col-md-4">
  <div class="">
 <div class="box box-warning">
   <div class="box-header">
     <h3 class="box-title">Agregar Condiciones</h3>
           <div class="box-body">
             <form class="form-horizontal" role="form" method="POST" action="{{ route('adminOpcionesPaquete.guardarcondiciones') }}" >
               {{ csrf_field() }}
               <fieldset>
                 <div class="col-md-12">
               <div class="form-group has-feedback{{ $errors->has('condiciones') ? ' has-error' : '' }}">
                 <div class="input-group">
                     <span class="input-group-addon"><span class="fa fa-pencil-square"></span></span>
                 <input id="condiciones" type="text" class="form-control" name="condiciones" value="{{ old('condiciones') }}" required autofocus>
               </div>
                 @if ($errors->has('condiciones'))
                 <span class="help-block">{{ $errors->first('condiciones') }}</span>
                 @endif
               </div>
             </div>
                   <button type="submit" class="btn btn-info center-block">Agregar Condiciones</button>
             </fieldset>
           </form>
               <div class="row">
                 <h3 class="box-title"> </h3>
                 <table class="table table-striped table-bordered table-hover" id="tablaCondiciones">
                   <thead class="thead-dark">
                     <tr>
                     <th align="center">Condiciones</th>
                     <th align="center">Eliminar</th>
                     </tr>
                   </thead>
                   <tbody>
                   @foreach($condiciones as $con)
                      <tr>
                        <td align="center">{{ $con->NombreCondiciones }}</td>
                        <td align="center"> <a href="{{route('adminOpcionesPaquete.eliminarcondiciones', $con['IdCondiciones'])}}"
                        class="btn btn-danger btn-sm"> <font color="white" size="2"> <b> X</b>
                        </font>
                        </a> </td>
                      </tr>
                     @endforeach
                   </tbody>
                 </table>
                   <center>{!! $condiciones->appends(\Request::except('page'))->render() !!}</center>

               </div>
           </div>
   </div>
 </div>
</div>
</div>
<div class="col-md-4">
  <div class="">
 <div class="box box-warning">
   <div class="box-header">
     <h3 class="box-title">Agregar Itinerario</h3>
           <div class="box-body">
             <form class="form-horizontal" role="form" method="POST" action="{{ route('adminOpcionesPaquete.guardaritinerario') }}" >
               {{ csrf_field() }}
               <fieldset>
                 <div class="col-md-12">
               <div class="form-group has-feedback{{ $errors->has('itinerario') ? ' has-error' : '' }}">
                 <div class="input-group">
                     <span class="input-group-addon"><span class="fa fa-pencil-square"></span></span>
                 <input id="itinerario" type="text" class="form-control" name="itinerario" value="{{ old('itinerario') }}" required autofocus>
               </div>
                 @if ($errors->has('itinerario'))
                 <span class="help-block">{{ $errors->first('itinerario') }}</span>
                 @endif
               </div>
             </div>
                   <button type="submit" class="btn btn-info center-block">Agregar Itinerario</button>
             </fieldset>
           </form>
               <div class="row">
                 <h3 class="box-title"> </h3>
                 <table class="table table-striped table-bordered table-hover" id="tablaItinerario">
                   <thead class="thead-dark">
                     <tr>
                     <th  align="center">Itinerario</th>
                     <th  align="center">Eliminar</th>
                     </tr>
                   </thead>
                   <tbody>
                   @foreach($itinerario as $iti)
                      <tr>
                        <td  align="center">{{ $iti->NombreItinerario }}</td>
                        <td align="center"> <a href="{{route('adminOpcionesPaquete.eliminaritinerario', $iti['IdItinerario'])}}"
                        class="btn btn-danger btn-sm"> <font color="white" size="2"> <b> X</b>
                        </font>
                        </a> </td>
                      </tr>
                     @endforeach
                   </tbody>
                 </table>
                    <center>{!! $itinerario->appends(\Request::except('page'))->render() !!}</center>


               </div>
           </div>
   </div>
 </div>
</div>
</div>
@endsection
