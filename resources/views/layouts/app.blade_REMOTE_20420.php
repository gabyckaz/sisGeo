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
<ul class="sidebar-menu">
  <li class="header">MAIN NAVIGATOR</li>
  <li class="active">
    <a href="{{ route('home') }}">
      <i class="fa fa-home"></i>
      <span>Home</span>
    </a>
  </li>
  <li class="active">
    <a href="{{ route('adminUser.index') }}">
      <i class="fa fa-home"></i>
      <span>Usuarios</span>
    </a>
  </li>
  <li class="active">
    <a href="{{ route('home') }}">
      <i class="fa fa-home"></i>
      <span>Paqutes</span>
    </a>
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
                  <i class="fa fa-circle-o"></i>
                  Empresas</a></li>
                <li><a href="{{ route('adminTipoTransporte.index') }}">
                  <i class="fa fa-circle-o"></i>
                  Transportes y Conductores</a></li>
                <li><a href="{{ route('adminTransporte.index') }}">
                  <i class="fa fa-circle-o"></i>
                    Transporte</a></li>
      </ul>

  </li>
  <li class="active">
    <a href="{{ route('home') }}">
      <i class="fa fa-home"></i>
      <span>Home</span>
    </a>
  </li>
  <li class="active">
    <a href="{{ route('home') }}">
      <i class="fa fa-home"></i>
      <span>Home</span>
    </a>
  </li>
  <li class="active">
    <a href="{{ route('home') }}">
      <i class="fa fa-home"></i>
      <span>Home</span>
    </a>
  </li>
</ul>
@endsection
