@extends('master')

@section('head')
<h1>Hola Mundo</h1>

@endsection
@section('Title')
@role('Admin') 
Administracion de roles a usuario
@endrole
@endsection

@section('contenido')
@role('Admin') 
<div class="row">
  <div class="col-md-12 ">
         
    <form class="form-horizontal" role="form" method="POST" action="{{route('adminUser.role.add', $usuario->id) }}" >
      {!! method_field('PUT') !!}
      {{ csrf_field()  }}
        <fieldset>

        <!-- Form Name -->
        <legend>Asignar rol</legend>
      <!-- Form Name -->

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="identificador">Correo</label>
        <div class="col-md-4">
        <input id="identificador" value="{{ $usuario->email }}" name="email" type="text" placeholder="{{ $usuario->email }}" class="form-control input-md" disabled>

        </div>
      </div>

      <!-- Text input-->
      <div class="form-group">
        <label class="col-md-4 control-label" for="name">Nombre</label>
        <div class="col-md-4">
        <input id="name" name="name" type="text" value="{{ $usuario->name }}" placeholder="{{ $usuario->name }}" class="form-control input-md" disabled>

        </div>
      </div>

        <div class="form-group">
            <label class="col-md-4 control-label" for="rol">Asignar rol</label>
            <div class="col-md-4 selectContainer">
                <select class="form-control form-control-sm" name="rol">
                  @foreach($roles as $rol)
                      <option value="{{ $rol->id }}">{{ $rol->display_name }}</option>
                  @endforeach
                </select>
            </div>
        </div>

        <div class="form-group">
          <div>
              <button type="submit" class="btn btn-info col-md-offset-3">Agregar rol</button>
          </div>
        </div>
       </fieldset>
      </form>
      <br>
      <br>

      <form class="form-horizontal" role="form" method="POST" action="{{route('adminUser.role.del', $usuario->id) }}">
        {!! method_field('PUT') !!}
        {{ csrf_field()  }}

        <fieldset>

        <!-- Form Name -->
        <legend>Eliminar rol</legend>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="identificador">Correo</label>
          <div class="col-md-4">
          <input id="identificador" name="identificador" type="text" placeholder="{{ $usuario->email }}" class="form-control input-md" disabled>

          </div>
        </div>

        <!-- Text input-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="name">Nombre</label>
          <div class="col-md-4">
          <input id="name" name="name" type="text" placeholder="{{ $usuario->name }}" class="form-control input-md" disabled>

          </div>
        </div>

          <div class="form-group">
              <label class="col-md-4 control-label" for="rol">Eliminar rol</label>
              <div class="col-md-4 selectContainer">
                  <select class="form-control" name="rol">
                    @foreach($roles as $rol)
                        <option  value="{{ $rol->id }}">{{ $rol->display_name }}</option>
                    @endforeach
                  </select>
              </div>
          </div>

          <div class="form-group">
            <div>
                <button type="submit" class="btn btn-danger col-md-offset-3">Eliminar rol</button>
            </div>
          </div>

        </fieldset>
        </form>
      </div>
      <div class="box-body">
        @if (session('status'))
        <div class="alert alert-success">
          {{ session('status') }}
        </div>
        @endif
        You are logged in!
      </div>
</div>
@endrole
@endsection
