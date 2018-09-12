@extends('admin-lte::layouts.main')

@if (auth()->check())
@section('user-avatar', 'https://www.gravatar.com/avatar/' . md5(auth()->user()->email) . '?d=mm')
@section('user-name', auth()->user()->name)
@endif

@section('breadcrumbs')
@include('admin-lte::layouts.content-wrapper.breadcrumbs', [
  'breadcrumbs' => [
    (object) [ 'title' => 'Home', 'url' => route('home') ]
  ]
])
@endsection

@section('sidebar-menu')
<      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">OPCIONES</li>

  <li class="active">
    <a href="{{ route('home') }}">
      <i class="fa fa-home"></i>
      <span>Inicio</span>
    </a>
  </li>
  <li class="active">
    <a href="{{ route('adminUser.index') }}">
      <i class="fa fa-users"></i>
      <span>Usuarios</span>
    </a>
  </li>
  <li class="active">
    <a href="/user/{{ auth()->user()->id }}/edit">
      <i class="fa fa-user"></i>
      <span>Mi Cuenta</span>
    </a>
  </li>
   <li class="active treeview menu-open">
    <a href="#">
      <i class="fa fa-ticket"></i>
        <i class="fa fa-angle-left pull-right-container"></i>
        <i class="fa fa-angl-left pull-right"></i>
        <span>Paquetes Turísticos</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
        <ul class="treeview-menu">
                <li><a href="{{ route('adminPaquete.create')}}">
                  <i class="fa fa-star"></i>
                  Crear Paquete Turístico</a></li>
                <li><a href="">
                   <li><a href="{{ route('adminPaquete.index')}}">
                  <i class="fa fa-star"></i>
                  Mostrar Paquete Turístico</a></li>
      </ul>
  </li>
  <li class="active treeview menu-open">
    <a href="#">
      <i class="fa fa-bus"></i>
        <i class="fa fa-angle-left pull-right-container"></i>
        <i class="fa fa-angl-left pull-right"></i>
      <span>Transporte</span>
      <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
      <ul class="treeview-menu">
                <li><a href="{{ route('adminEmpresaTransporte.index') }}">
                  <i class="fa fa-star"></i>
                  Empresas</a></li>
                <li><a href="{{ route('adminTipoTransporte.index') }}">
                  <i class="fa fa-star"></i>
                  Transportes y Conductores</a></li>
                <li><a href="{{ route('adminTransporte.index') }}">
                  <i class="fa fa-star"></i>
                    Transporte</a></li>
      </ul>

  </li>
  <li class="active">
    <a href="{{ route('home') }}">
      <i class="fa fa-calendar"></i>
      <span>Reservas</span>
    </a>
  </li>
<li class="active treeview menu-open">
    <a href="#">
      <i class="fa fa-map-marker"></i>
        <i class="fa fa-angle-left pull-right-container"></i>
        <i class="fa fa-angl-left pull-right"></i>
        <span>Ruta Turistica</span>
        <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
    </a>
        <ul class="treeview-menu">
                <li><a href="#">
                  <i class="fa fa-star"></i>
                  Crear Ruta Turística</a></li>
                <li><a href="">
                  <i class="fa fa-star"></i>
                  Consultar Ruta Turística</a></li>
                <li><a href="">
                  <i class="fa fa-star"></i>
                    Editar Ruta Turística</a></li>
      </ul>
  </li>
  </li>
      <li class="active"><a href="#"><i class="fa fa-info"></i> <span>Acerca de</span></a></li>
  </ul>
@endsection
