@extends('master')

@section('head')

@endsection
@section('Title')
<strong>Registrar Pago</strong>
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
  <div class="col-md-8 col-md-offset-2">
    <div class="box-solid">
      <div class="box-header"></div>
      <div class="box-body">
        <form id="miFormotroturista" method="POST" action="{{route('otroturista.store') }}">
          {{-- {!! method_field('PUT') !!} --}}
          {!! csrf_field() !!}
          <div class="row">
            <div class="col-md-3">
                    <div class="form-group has-feedback{{ $errors->has('Nombre') ? ' has-error' : '' }}">
                       <label for="Nombre" class="control-label">Nombre*</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                               <i class="fa fa-user"></i>
                            </div>
                            <input type="text" name="Nombre" class="form-control"  id="Nombre" placeholder="Juan" value="{{old('Nombre')}}" required>
                          </div>
                          @if ($errors->has('Nombre'))
                               <span class="help-block">{{ $errors->first('Nombre') }}</span>
                            @endif
                    </div>
              </div>
              <div class="col-md-3">
                    <div class="form-group has-feedback{{ $errors->has('Apellido') ? ' has-error' : '' }}">
                       <label for="Nombre" class="control-label">Apellido*</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                               <i class="fa fa-user"></i>
                            </div>
                            <input type="text" name="Apellido" class="form-control"  id="Apellido" placeholder="Perez" value="{{old('Apellido')}}" required>
                          </div>
                          @if ($errors->has('Apellido'))
                               <span class="help-block">{{ $errors->first('Apellido') }}</span>
                            @endif
                    </div>
              </div>
              <div class="col-md-3">
              <label for="codigoArea">Código de país</label>
                <div class="input-group">
                         <select class="form-control" name="codigoArea" id="codigoArea" value="{{ old('codigoArea') }}">
                          <option value="503" {{ old('codigoArea') == '503' ? 'selected' : '' }}>503 - El Salvador</option>
                          <option value="501" {{ old('codigoArea') == '501' ? 'selected' : '' }}>501 - Belice</option>
                          <option value="502" {{ old('codigoArea') == '502' ? 'selected' : '' }}>502 - Guatemala</option>
                          <option value="504" {{ old('codigoArea') == '504' ? 'selected' : '' }}>504 - Honduras</option>
                          <option value="505" {{ old('codigoArea') == '505' ? 'selected' : '' }}>505 - Nicaragua</option>
                          <option value="506" {{ old('codigoArea') == '506' ? 'selected' : '' }}>506 - Costa Rica</option>
                        </select>
                  </div>
                </div>
              <div class="col-md-3">
                    <div class="form-group has-feedback{{ $errors->has('Telefono') ? ' has-error' : '' }}">
                       <label for="Nombre" class="control-label">Teléfono Contacto*</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                               <i class="fa fa-phone"></i>
                            </div>
                            <input type="text" name="Telefono" onkeypress="return filterInt(event,this);" class="form-control"  id="Telefono" placeholder="72334455" value="{{old('Telefono')}}" required>
                          </div>
                          @if ($errors->has('Telefono'))
                               <span class="help-block">{{ $errors->first('Telefono') }}</span>
                            @endif
                    </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md-3">
                  <div class="form-group has-feedback{{ $errors->has('Dui') ? ' has-error' : '' }}">
                     <label for="Nombre" class="control-label">DUI</label>
                        <div class="input-group">
                          <input type="text" name="Dui" class="form-control"  data-mask="00000000-0" placeholder="11111111-1" value="{{old('Dui')}}" >
                        </div>
                        @if ($errors->has('Dui'))
                             <span class="help-block">{{ $errors->first('Dui') }}</span>
                          @endif
                          @if (session('falloDoc'))
                             <span class="help-block">{{ session("falloDoc") }}</span>
                          @endif
                  </div>
            </div>
            <div class="col-md-3">
                  <div class="form-group has-feedback{{ $errors->has('pasaporte') ? ' has-error' : '' }}">
                     <label for="Pasaporte" class="control-label">Pasaporte</label>
                        <div class="input-group">
                          <input type="text" name="pasaporte" class="form-control"  data-mask="AA0000000" placeholder="Pasaporte" value="{{old('pasaporte')}}" >
                        </div>
                        @if ($errors->has('pasaporte'))
                             <span class="help-block">{{ $errors->first('pasaporte') }}</span>
                          @endif
                          @if (session('falloDoc'))
                             <span class="help-block">{{ session("falloDoc") }}</span>
                          @endif
                  </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="field_wrapper">
                <div class="form-group">
                  <label for="Acompñantes" class="control-label">Acompañantes¹</label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="field_name[]" value="" placeholder="Nombre Apellido,Dui, Pasaporte" />
                    <div class="input-group-addon">
                      <a href="javascript:void(0);" class="add_button" title="Add field"><i class="fa fa-user-plus"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label>Paquete</label>
                  <select name="Paquete" class="form-control" >
                      @foreach($paquetes as $paquete)
                        <option value="{{ $paquete->IdPaquete }}"> | {{ $paquete->FechaSalida }} | ${{ $paquete->Precio }} | {{ $paquete->NombrePaquete }} </option>
                      @endforeach
                  </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label>Metodo de Pago</label>
                <select name="MetodoPago" class="form-control" >
                  <option value="Teléfono" @if (old('MetodoPago') == "Teléfono") {{ 'selected' }} @endif >Telefono</option>
                  <option value="Presencial" @if (old('MetodoPago') == "Presencial") {{ 'selected' }} @endif >Persona</option>
                  <option value="Banco" @if (old('MetodoPago') == "Banco") {{ 'selected' }} @endif >Banco</option>
                  <option value="Puntoxpress" @if (old('MetodoPago') == "Puntoxpress") {{ 'selected' }} @endif >Puntoxpress</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group has-feedback{{ $errors->has('Costo') ? ' has-error' : '' }}">
               <label for="totalPago" class="control-label">Costo</label>
               <div class="input-group">
                <div class="input-group-addon">
                   <i class="fa  fa-dollar"></i>
                </div>
                 <input type="text" class="form-control" name="Costo" value="{{old('Costo')}}" placeholder="0.00" onkeypress="return filterFloat(event,this);" />
               </div>
               @if ($errors->has('Costo'))
                  <span class="help-block">{{ $errors->first('Costo') }}</span>
                @endif
              </div>
            </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                <br>
                <center><button type="submit" class="btn btn-info center-block"><STRONG>Registrar</STRONG></button></center>
                <br>
              </div>
          </div>
        </form>
      </div>
      <div class="box-footer">
        <p>¹ Es necesario respetar el patron para otros acompañantes.</p>
        <p>Ejemplo: Nombre Apellido,12345678-1,AA34567890</p>
        <p>Si solo agrega DUI: Nombre Apellido,12345678-1<b>,</b></p>
        <p>Si solo agrega Pasaporte: Nombre Apellido,,AA34567890</b></p>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function filterInt(evt,input){
    // Backspace = 8, Enter = 13, ‘0′ = 48, ‘9′ = 57, ‘.’ = 46, ‘-’ = 43
    var key = window.Event ? evt.which : evt.keyCode;
    var chark = String.fromCharCode(key);
    var tempValue = input.value+chark;
    if(key >= 48 && key <= 57){
        if(filter(tempValue)=== false){
            return false;
        }else{
            return true;
        }
    }else{
          if(key == 8 || key == 13 || key == 0) {
              return true;
          }else if(key == 46){
                if(filterN(tempValue)=== false){
                    return false;
                }else{
                    return true;
                }
          }else{
              return false;
          }
    }
};
function filterN(__val__){
    var preg = /^[0-9]+$/;//[0-9]/;//^([0-9]/)$/;//patron =/[0-9]/;
    if(preg.test(__val__) === true){
        return true;
    }else{
       return false;
    }

};
function numeros(e){
   var tecla = e.keyCode;

    if (tecla==8 || tecla==9 || tecla==13){
        return true;
    }

    var patron =/[0-9]/;
    var tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
</script>
@endsection
