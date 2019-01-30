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
            <div class="col-md-4">
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
              <div class="col-md-4">
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
              <div class="col-md-4">
                    <div class="form-group has-feedback{{ $errors->has('Telefono') ? ' has-error' : '' }}">
                       <label for="Nombre" class="control-label">Teléfono Contacto*</label>
                          <div class="input-group">
                            <div class="input-group-addon">
                               <i class="fa fa-phone"></i>
                            </div>
                            <input type="text" name="Telefono" class="form-control"  id="Telefono" placeholder="50372334455" value="{{old('Telefono')}}" required>
                          </div>
                          @if ($errors->has('Telefono'))
                               <span class="help-block">{{ $errors->first('Telefono') }}</span>
                            @endif
                    </div>
              </div>
          </div>
          <div class="row">
            <div class="col-md-4">
                  <div class="form-group has-feedback{{ $errors->has('Dui') ? ' has-error' : '' }}">
                     <label for="Nombre" class="control-label">DUI</label>
                        <div class="input-group">
                          <input type="text" name="Dui" class="form-control"  id="dui" placeholder="DUI" value="{{old('Dui')}}" >
                        </div>
                        @if ($errors->has('Dui'))
                             <span class="help-block">{{ $errors->first('Dui') }}</span>
                          @endif
                          @if (session('falloDoc'))
                             <span class="help-block">{{ session("falloDoc") }}</span>
                          @endif
                  </div>
            </div>
            <div class="col-md-4">
                  <div class="form-group has-feedback{{ $errors->has('pasaporte') ? ' has-error' : '' }}">
                     <label for="Pasaporte" class="control-label">Pasaporte</label>
                        <div class="input-group">
                          <input type="text" name="pasaporte" class="form-control"  id="pasaporte" placeholder="Pasaporte" value="{{old('pasaporte')}}" >
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
                  <option value="telefono" @if (old('tipo') == "telefono") {{ 'selected' }} @endif >Telefono</option>
                  <option value="persona" @if (old('tipo') == "persona") {{ 'selected' }} @endif >Persona</option>
                  <option value="banco" @if (old('tipo') == "banco") {{ 'selected' }} @endif >Banco</option>
                  <option value="banco" @if (old('tipo') == "puntoExpres") {{ 'selected' }} @endif >Punto Express</option>
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
        <p>Si solo agrega DUI: Nombre Apellido,12345678-1b<b>,</b></p>
        <p>Si solo agrega Pasaporte: Nombre Apellido,,AA34567890</b></p>
      </div>
    </div>
  </div>
</div>

@endsection
