@extends('master')

@section('head')
<h1>Hola Mundo</h1>

@endsection

@section('contenido')
<div class="row">

  <div class="col-md-4">
    @if(session('status'))
      <br>
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
    <div class="box box-primary">
      <div class="box-header">
        <h3 class="box-title">Tipos de transporte</h3>
        <div class="box-body">

          <form action="{{ route('adminTipoTransporte.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group has-feedback{{ $errors->has('tipotransporte') ? ' has-error' : '' }}">
              <input id="tipotransporte" type="text" class="form-control" name="tipotransporte" value="{{ old('tipotransporte') }}" required autofocus>
              <span class="fa fa-bus form-control-feedback"></span>
              @if ($errors->has('tipotransporte'))
              <span class="help-block">{{ $errors->first('tipotransporte') }}</span>
              @endif
            </div>

            <div class="row">
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Agregar transporte</button>
              </div>
              <h3 class="box-title"> </h3>
              <table class="table table-striped table-bordered" >
                <thead class="thead-dark">
                  <tr>
                  <th>Nombre</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($tipotransporte as $tipo)
                   <tr>
                     <td>{{ $tipo->NombreTipoTransporte }}</td>
                   </tr>
                  @endforeach
                </tbody>
              </table>


            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
{{--
  <div class="col-md-4">
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Conductores</h3>
              <div class="box-body">
                <form action="{{ route('adminTipoTransporte.guardarConductor') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="form-group has-feedback{{ $errors->has('conductor') ? ' has-error' : '' }}">
                    <input id="conductor" type="text" class="form-control" name="conductor" value="{{ old('conductor') }}" required autofocus>
                    <span class="fa fa-id-card-o form-control-feedback"></span>
                    @if ($errors->has('conductor'))
                    <span class="help-block">{{ $errors->first('conductor') }}</span>
                    @endif
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <button type="submit" class="btn btn-default btn-block btn-flat">Agregar conductor</button>
                    </div>
                    <h3 class="box-title"> </h3>
                    <table class="table table-striped table-bordered" >
                      <thead class="thead-dark">
                        <tr>
                        <th>Nombre</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($conductor as $con)
                         <tr>
                           <td>{{ $con->NombreConductor }}</td>
                         </tr>
                        @endforeach
                      </tbody>
                    </table>


                  </div>
                </form>
              </div>
      </div>
    </div>
  </div> --}}
</div>
@endsection
