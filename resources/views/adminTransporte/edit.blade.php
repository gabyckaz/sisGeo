@extends('master')

@section('head')

@endsection
@section('Title')
<STRONG>Unidad de Transporte</STRONG>
@endsection

@section('contenido')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    @if(session('status'))
      <br>
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
    @endif
    @if(session('fallo'))
      <br>
        <div class="alert alert-danger" role="alert">
          {{ session('fallo') }}
      </div>
    @endif
    <div class="">
      <div class="box-header">
        <h3 class="box-title"></h3>
        <div class="box-tools">
          <button class="btn btn-box-tool"></button>
        </div><!-- /.box-tools -->
        </div>
              <div class="box-body">
                <form role="form" method="POST" action="{{route('adminTransporte.update', $transporte->IdTransporte) }}" >
                   {!! method_field('PUT') !!}
                   {{ csrf_field()  }}

                   <div class="row">
                   <div class="col-md-6">
                   <div class="form-group">
                     <label for="empresalquiler">Empresa</label>
                       <select class="form-control" name="empresalquiler">

                         @foreach($empresalquiler as $empresa)
                           <option value="{{ $empresa->IdEmpresaTransporte }}" {{ $transporte->IdEmpresaTransporte == $empresa->IdEmpresaTransporte ? 'selected' : '' }}>{{ $empresa->NombreEmpresaTransporte }}</option>
                         @endforeach
                       </select>
                  </div>
                 </div>

                  <div class="form-group">
                    <div class="col-md-6">
                    <label for="tipotransporte">Tipo de transporte</label>
                      <select class="form-control" name="tipotransporte">
                        @foreach($tipotransportes as $tipotransporte)
                          <option value="{{ $tipotransporte->IdTipoTransporte }}" {{ $transporte->IdTipoTransporte == $tipotransporte->IdTipoTransporte ? 'selected="selected"' : '' }}>{{ $tipotransporte->NombreTipoTransporte }}</option>
                        @endforeach
                      </select>
                 </div>
                 </div>
                </div>

                 <div class="row">
                 <div class="col-sm-6 form-group">
                  <label for="marca">Marca</label>
                  <select  class="form-control" name="marca">

                    @switch($transporte->Marca)
                        @case("Toyota")
                        <option value="Toyota" selected>Toyota</option>
                        <option value="Blue Bird">Blue Bird</option>
                        <option value="Ford">Ford</option>
                        <option value="Mercedez Benz">Mercedez Benz</option>
                        <option value="Hyundai">Hyundai</option>
                            @break

                        @case("Blue Bird")
                        <option value="Toyota">Toyota</option>
                        <option value="Blue Bird" selected>Blue Bird</option>
                        <option value="Ford">Ford</option>
                        <option value="Mercedez Benz">Mercedez Benz</option>
                        <option value="Hyundai">Hyundai</option>
                            @break

                        @case("Ford")
                        <option value="Toyota">Toyota</option>
                        <option value="Blue Bird">Blue Bird</option>
                        <option value="Ford" selected>Ford</option>
                        <option value="Mercedez Benz">Mercedez Benz</option>
                        <option value="Hyundai">Hyundai</option>
                            @break

                        @case("Mercedez Benz")
                        <option value="Toyota">Toyota</option>
                        <option value="Blue Bird">Blue Bird</option>
                        <option value="Ford">Ford</option>
                        <option value="Mercedez Benz" selected>Mercedez Benz</option>
                        <option value="Hyundai">Hyundai</option>
                            @break

                        @case("Hyundai")
                        <option value="Toyota">Toyota</option>
                        <option value="Blue Bird">Blue Bird</option>
                        <option value="Ford">Ford</option>
                        <option value="Mercedez Benz">Mercedez Benz</option>
                        <option value="Hyundai" selected>Hyundai</option>
                            @break

                    @endswitch
                  </select>
                 </div>

                 <div class="col-sm-6 form-group">
                  <label for="modelo">Modelo</label>
                  <select  class="form-control" name="modelo">
                  @switch($transporte->Modelo)
                      @case("Coaster")
                      <option value="Coaster"selected>Coaster</option>
                      <option value="Hiace">Hiace</option>
                      <option value="All American">All American</option>
                      <option value="Ford B series">Ford B series</option>
                          @break

                      @case("Hiace")
                      <option value="Coaster">Coaster</option>
                      <option value="Hiace"selected>Hiace</option>
                      <option value="All American">All American</option>
                      <option value="Ford B series">Ford B series</option>
                          @break

                      @case("All American")
                      <option value="Coaster">Coaster</option>
                      <option value="Hiace">Hiace</option>
                      <option value="All American"selected>All American</option>
                      <option value="Ford B series">Ford B series</option>
                          @break

                      @case("Ford B series")
                      <option value="Coaster">Coaster</option>
                      <option value="Hiace">Hiace</option>
                      <option value="All American">All American</option>
                      <option value="Ford B series"selected>Ford B series</option>
                          @break

                  @endswitch

                  </select>
                 </div>
                 </div>

                 <div class="row">
                   <div class="col-sm-4 form-group">
                    <label for="color">Color</label>
                    <select  class="form-control" name="color">
                      @switch($transporte->Color)
                          @case("Negro")
                          <option value="Negro" style="background-color: Black;color: #FFFFFF;" selected>Negro</option>
                          <option value="Gris" style="background-color: Gray;">Gris</option>
                          <option value="Blanco" style="background-color: White;">Blanco</option>
                          <option value="Amarillo" style="background-color: Yellow;">Amarillo</option>
                          <option value="Anaranjado" style="background-color: Orange;">Anaranjado</option>
                          <option value="Beige" style="background-color: Beige;">Beige</option>
                              @break

                          @case("Gris")
                          <option value="Negro" style="background-color: Black;color: #FFFFFF;">Negro</option>
                          <option value="Gris" style="background-color: Gray;" selected>Gris</option>
                          <option value="Blanco" style="background-color: White;">Blanco</option>
                          <option value="Amarillo" style="background-color: Yellow;">Amarillo</option>
                          <option value="Anaranjado" style="background-color: Orange;">Anaranjado</option>
                          <option value="Beige" style="background-color: Beige;">Beige</option>
                              @break

                          @case("Blanco")
                          <option value="Negro" style="background-color: Black;color: #FFFFFF;">Negro</option>
                          <option value="Gris" style="background-color: Gray;">Gris</option>
                          <option value="Blanco" style="background-color: White;"selected>Blanco</option>
                          <option value="Amarillo" style="background-color: Yellow;">Amarillo</option>
                          <option value="Anaranjado" style="background-color: Orange;">Anaranjado</option>
                          <option value="Beige" style="background-color: Beige;">Beige</option>
                              @break

                          @case("Amarillo")
                          <option value="Negro" style="background-color: Black;color: #FFFFFF;">Negro</option>
                          <option value="Gris" style="background-color: Gray;">Gris</option>
                          <option value="Blanco" style="background-color: White;">Blanco</option>
                          <option value="Amarillo" style="background-color: Yellow;"selected>Amarillo</option>
                          <option value="Anaranjado" style="background-color: Orange;">Anaranjado</option>
                          <option value="Beige" style="background-color: Beige;">Beige</option>
                              @break

                          @case("Anaranjado")
                          <option value="Negro" style="background-color: Black;color: #FFFFFF;">Negro</option>
                          <option value="Gris" style="background-color: Gray;">Gris</option>
                          <option value="Blanco" style="background-color: White;">Blanco</option>
                          <option value="Amarillo" style="background-color: Yellow;">Amarillo</option>
                          <option value="Anaranjado" style="background-color: Orange;"selected>Anaranjado</option>
                          <option value="Beige" style="background-color: Beige;">Beige</option>
                              @break

                          @case("Beige")
                          <option value="Negro" style="background-color: Black;color: #FFFFFF;">Negro</option>
                          <option value="Gris" style="background-color: Gray;">Gris</option>
                          <option value="Blanco" style="background-color: White;">Blanco</option>
                          <option value="Amarillo" style="background-color: Yellow;">Amarillo</option>
                          <option value="Anaranjado" style="background-color: Orange;">Anaranjado</option>
                          <option value="Beige" style="background-color: Beige;"selected>Beige</option>
                              @break

                      @endswitch

                    </select>
                   </div>

                  <div class="col-sm-4 form-group has-feedback{{ $errors->has('placa') ? ' has-error' : '' }}">
                    <label for="placa">Placa</label>
                    <div class="input-group">
                    <span class="input-group-addon">#</span>
                    <input id="placa" type="text" class="form-control" name="placa" value="{{ $transporte->Placa_Matricula }}"placeholder="Ej: B776123" min="1" required>
                    </div>
                    @if ($errors->has('placa'))
                    <span class="help-block">{{ $errors->first('placa') }}</span>
                    @endif
                  </div>

                  <div class="col-sm-4 form-group has-feedback{{ $errors->has('numeroasientos') ? ' has-error' : '' }}">
                    <label for="numeroasientos">No. Asientos</label>
                    <div class="input-group">
                    <span class="input-group-addon"><span class="fa fa-bus"></span></span>
                    <input id="numeroasientos" type="number" min="10" class="form-control" value="{{ $transporte->NumeroAsientos }}"name="numeroasientos" placeholder="No. de asientos" required>
                    </div>
                    @if ($errors->has('numeroasientos'))
                    <span class="help-block">{{ $errors->first('numeroasientos') }}</span>
                    <span class="help-block">Tiene que ser de 1 a más asientos</span>
                    @endif
                  </div>
                  </div>

                  <div class="row">
                  <label class="col-md-12">Características</label>
                  <div class="form-group col-md-4">
                    <label class="">
                    <input class="form-group" name="ac" type="checkbox" value="si" @if( $transporte->TieneAC == 'si') checked @endif>
                    <i class="fa fa-thermometer-half"></i> Aire Acondicionado</label>
                  </div>

                  <div class="form-group col-md-4">
                    <label class="" >
                    <input class="form-group" name="tv" type="checkbox" value="si" @if( $transporte->TieneTV == 'si') checked @endif>
                    <i class="fa fa-television"></i> TV</label>
                  </div>

                  <div class="form-group col-md-4">
                    <label  class=" form-group">
                    <input  class="form-group" name="wifi" type="checkbox" value="si" @if( $transporte->TieneWifi == 'si') checked @endif>
                    <i class="fa fa-wifi"  title="Wifi"></i> Wifi</label>
                  </div>
                  </div>

                  <div class="row">
                   <div class="col-md-12">
                     <div class="form-group has-feedback{{ $errors->has('observacionestransporte') ? ' has-error' : '' }}">
                      <label for="observacionestransporte">Observaciones</label>
                      <div class="input-group">
                       <span class="input-group-addon"><span class="fa fa-sticky-note"></span></span>
                        <textarea id="observacionestransporte" type="text" class="form-control"  name="observacionestransporte">{{ $transporte->ObservacionesTransporte }}</textarea>
                      </div>
                      @if ($errors->has('observacionestransporte'))
                      <span class="help-block">{{ $errors->first('observacionestransporte') }}</span>
                      @endif
                    </div>
                   </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-info center-block"><STRONG>Guardar</STRONG></button>
                    </div>
                  </div>
                </form>


              </div>
      </div>
    </div>
  </div>

@endsection
