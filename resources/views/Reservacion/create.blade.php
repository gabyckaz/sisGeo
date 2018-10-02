@extends('master')

@section('head')
@section('Title','Reservación')

@endsection

@section('contenido')
    @if(session()->has('message'))
      <script type="text/javascript">
        alertify.error('{{ session()->get('message') }}');
      </script>
    @endif
    @if(session('fallo'))
      <script type="text/javascript">
     alertify.error("{{ session('fallo') }}");
     </script>
    @endif
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
        <div class="col-md-3">
          <div class="form-group">
            <div class="checkbox">
              <label><input id="usuario" type="checkbox" name="usuario" value="{{$userTurista[0]->Id}}" checked>
               {{$userTurista[0]->Nombre}} {{$userTurista[0]->Apellido}}
              </label>
            </div>
          </div>
         </div>
         <div class="col-md-3">
           <div class="form-group">
            <label>Familia</label>
            <input type="text" name="strFamilia" id="strFamilia" readonly>
           </div>
          </div>
         <div class="col-md-3">
          <div class="form-group">
            <label>Amigos</label>
            <input type="text" name="strAmigos" id="strAmigos" readonly>
           </div>
          </div>
          <div class="col-md-3">
          <div class="form-group">
            <label>Total</label>
            <input type="text" name="total" id="total" readonly>
           </div>
          </div>

        {{-- <div class="form-group col-md-3 has-feedback{{ $errors->has('numeroacompanantes') ? ' has-error' : '' }}">
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
        </div> --}}
        <hr>
        {{-- Paquete seleccionado:{{$paquete}}</div>
        <hr>
        Usted es el turista: {{$usuarioreservando}} --}}
        <input type="text" name="idPaquete" value="{{ $paquete}}" />
         <div class="col-md-10 col-md-offset-4">
    <!-- Verifica si el usuario actual ha copletado su informacion de turista -->
      @if(is_int($usuarioreservando))        
        <button type="submit" class="btn btn-info ">Completar reserva</button>
        <button type="reset" class="btn btn-warning ">Limpiar</button>
      @else
        <p>ANTES DE REALIZAR LA RESERVA DEBE COMPLETAR SU INFORMACIÓN</p>
        <a href="{{ route('usuario.completar.informacion') }}" class="btn btn-default btn-flat">Completar información</a>
      @endif

      </div>
      </form>    
    </div>
  </div>
</div>          <!-- /.col -->              
@endsection
