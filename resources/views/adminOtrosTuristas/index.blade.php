@extends('master')

@section('head')

@endsection
@section('Title')
<strong>Reserva</strong>
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

  <div class="col-md-6">

    <div class="box box-warning ">
      <div class="box-header">
        <h3 class="box-title"><STRONG>Reserva otro tipo de Pago</STRONG></h3>
        <div class="box-tools pull-right">
          <button type="submit" class="btn btn-box-tool" data-widget="collapse" ><i class="fa fa-plus"></i></button>
        </div>
      </div>
      <div class="box-body">
            <h3 class="box-title"> </h3>
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
               <label for="Nombre" class="control-label">Contacto*</label>
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
               <label for="Nombre" class="control-label">Dui</label>
                  <div class="input-group">
                    <input type="text" name="Dui" class="form-control"  id="dui" placeholder="Dui" value="{{old('Dui')}}" >
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
            <option value="{{ $paquete->IdPaquete }}"> | {{ $paquete->FechaSalida }} | {{ $paquete->NombrePaquete }} | ${{ $paquete->Precio }} |</option>
        
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
                  <option value="banco" @if (old('tipo') == "puntoExpres") {{ 'selected' }} @endif >Punto expres</option>
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
           <input type="text" class="form-control" name="Costo" value="" placeholder="0.00" />
         </div>
         @if ($errors->has('Costo'))
            <span class="help-block">{{ $errors->first('Costo') }}</span>
          @endif
     </div>
      </div>
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-4">
            <button type="submit" class="btn btn-info "><STRONG>Registrar</STRONG></button>
        </div>
     </div>
    </form>
            </div>
        </div>
       <p>¹ Es necesario respetar el patron para otros acompañantes.</p>
       <p>Ejemplo: Nombre Apellido,12345678-1,1234567890</p>
    </div>
  </div>
</div>
</div>
@endsection
