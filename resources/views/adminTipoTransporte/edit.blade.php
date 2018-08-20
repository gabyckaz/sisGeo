@extends('master')

@section('head')
<h1>Hola Mundo</h1>

@endsection

@section('contenido')
<div class="row">
  <div class="col-md-4">
    <div class="box box-info">
      <div class="box-header">
        <h3 class="box-title">Conductores de  {{$empresa->NombreEmpresaTransporte}}</h3>
              <div class="box-body">
            {{--      <form class="form-horizontal" role="form" method="POST" action="{{route('adminTipoTransporte.conductor.add', $empresa) }}" >

                  {{ csrf_field() }}
                  <fieldset>
                  <div class="col-md-12">
                 <div class="form-group has-feedback{{ $errors->has('conductor') ? ' has-error' : '' }}">
                    <input id="conductor" type="text" class="form-control" name="conductor" value="{{ old('conductor') }}" required autofocus>
                    <span class="fa fa-id-card-o form-control-feedback"></span>
                    @if ($errors->has('conductor'))
                    <span class="help-block">{{ $errors->first('conductor') }}</span>
                    @endif
                  </div>

                    <button type="submit" class="btn btn-default btn-block btn-flat">Agregar conductor</button>
                  </div>

                </fieldset>
              </form>--}}

                <div class="row">

                  <h3 class="box-title"> </h3>
                  <table class="table table-striped table-bordered" >
                    <thead class="thead-dark">
                      <tr>
                      <th>Nombre</th>
                      </tr>
                    </thead>
                    <tbody>
                    @foreach($conductores as $conductor)
                       <tr>
                         <td>{{ $conductor->NombreConductor }}</td>
                       </tr>
                      @endforeach
                    </tbody>
                  </table>


                </div>
              </div>
      </div>
    </div>
  </div>
</div>

@endsection
