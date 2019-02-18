@extends('master')

@section('head')
@section('Title')
<STRONG>Pagos registrados desde {{ \Carbon\Carbon::parse($fechainicio)->format('d-m-Y')}} hasta {{ \Carbon\Carbon::parse($fechafin)->format('d-m-Y')}}</STRONG>
@endsection

@section('contenido')

<div class="row">
  <div class="col-md-10 col-md-offset-1">
    <div class="box box-warning">
      <div class="box-header">
        <h3 class="box-title"><b>Total: {{$totalusuarios}}</b></h3>
        <div class="box-tools pull-right">
          <a class="btn btn-success" title="Descargar como Excel" href="{{ route('usuarios.excel',[$fechainicio,$fechafin])}}">Descargar <i class="fa fa-file-excel-o" aria-hidden="true"></i></a>
        </div>
      </div>
      <div class="box-body">
        <div class="table-responsive">
          <table class="table table-striped table-bordered table-hover">
            <thead class="thead-dark">
              <tr>
                <th>#</th>
                <th class="text-center">Nombre</th>
                <th class="text-center">Email</th>
                <th class="text-center">Foto personalizada</th>
                <th class="text-center">Recibe correos</th>
                <th class="text-center">Estado</th>
                <th class="text-center">Género</th>
                <th class="text-center">No. contacto</th>
                <th class="text-center">Fecha regristro</th>
              </tr>
            </thead>
            <tbody>
              @foreach($usuarios as $usuario)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{$usuario->PrimerNombrePersona}} {{$usuario->SegundoNombrePersona}} {{$usuario->PrimerApellidoPersona}} {{$usuario->SegundoApellidoPersona}}</td>
                  <td>{{$usuario->email}}</td>
                  <td>@if($usuario->avatar=='default.gif')
                        No
                      @else
                        Sí
                      @endif
                  </td>
                  <td>@if($usuario->RecibirNotificacion==0)
                        No
                      @else
                        Sí
                      @endif
                  </td>
                  <td>@if($usuario->EstadoUsuario==0)
                        Desactivado
                      @else
                        Activo
                      @endif
                  </td>
                  <td>{{$usuario->Genero}}</td>
                  <td>+({{$usuario->AreaTelContacto}}) {{$usuario->TelefonoContacto}} </td>
                  <td>{{\Carbon\Carbon::parse($usuario->created_at)->format('d-m-Y H:i')}}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
