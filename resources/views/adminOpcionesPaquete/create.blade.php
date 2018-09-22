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
    <div class="box box-warning">
      <div class="box-header">
        <h3 class="box-title">Agregar Gastos Extras</h3>
        <div class="box-body">

          <form action="{{ route('adminOpcionesPaquete.store') }}" method="POST">
            {{ csrf_field() }}
            <div class="form-group has-feedback{{ $errors->has('opcionespaquete') ? ' has-error' : '' }}">
              <div class="input-group">
              <span class="input-group-addon"><span class="fa fa-bus"></span></span>
              <input id="gastosextras" type="text" class="form-control" name="gastosextras" value="{{ old('gastosextras') }}" required autofocus>
              </div>
              @if ($errors->has('gastosextras'))
              <span class="help-block">{{ $errors->first('gastosextras') }}</span>
              @endif
            </div>

            <div class="row">
              <div class="col-md-12">
                <button type="submit" class="btn btn-info center-block">Agregar Gasto Extra</button>
              </div>
              <h3 class="box-title"> </h3>
              <table class="table table-striped table-bordered" >
                <thead class="thead-dark">
                  <tr>
                  <th>Nombre Gastos Extras</th>
                  </tr>
                </thead>
                <tbody>
                @foreach($gastosextras as $gasto)
                   <tr>
                     <td>{{ $gasto->NombreGastos }}</td>
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
  <div class="col-md-4">
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Agregar Que incluye Paquete</h3>
              <div class="box-body">
                <form action="{{ route('adminOpcionesPaquete.store') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="form-group has-feedback{{ $errors->has('incluye') ? ' has-error' : '' }}">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="fa fa-bus"></span></span>
                    <input id="incluye" type="text" class="form-control" name="incluye" value="{{ old('incluye') }}" required autofocus>
                  </div>
                    @if ($errors->has('incluye'))
                    <span class="help-block">{{ $errors->first('incluye') }}</span>
                    @endif
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-info center-block">Agregar Que Incluye</button>
                    </div>
                    <h3 class="box-title"> </h3>
                    <table class="table table-striped table-bordered" >
                      <thead class="thead-dark">
                        <tr>
                        <th>Que incluye</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($incluye as $in)
                         <tr>
                           <td>{{ $in->NombreIncluye }}</td>
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
  <div class="col-md-4">
    <div class="box box-warning">
      <div class="box-header">
        <h3 class="box-title">Agregar Recomendaciones</h3>
              <div class="box-body">
                <form action="{{ route('adminOpcionesPaquete.store') }}" method="POST">
                  {{ csrf_field() }}
                  <div class="form-group has-feedback{{ $errors->has('recomendaciones') ? ' has-error' : '' }}">
                    <div class="input-group">
                        <span class="input-group-addon"><span class="fa fa-bus"></span></span>
                    <input id="recomendaciones" type="text" class="form-control" name="recomendaciones" value="{{ old('recomendaciones') }}" required autofocus>
                  </div>
                    @if ($errors->has('recomendaciones'))
                    <span class="help-block">{{ $errors->first('recomendaciones') }}</span>
                    @endif
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-info center-block">Agregar Recomendaciones</button>
                    </div>
                    <h3 class="box-title"> </h3>
                    <table class="table table-striped table-bordered" >
                      <thead class="thead-dark">
                        <tr>
                        <th>Recomendaciones</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($recomendaciones as $re)
                         <tr>
                           <td>{{ $re->NombreRecomendaciones }}</td>
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
</div>
@endsection
