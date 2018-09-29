@extends('master')

@section('head')
@endsection

@section('contenido')

<div class="text-center" >
  <img alt="Geoturismo logo" src="http://nebula.wsimg.com/d3657b04208ae150f468167d20de36aa?AccessKeyId=B5E8C3F7E00CA38BCFD7&disposition=0&alloworigin=1">
</div>

<div class="row">
  <form method="post" action="{{action('ReservacionController@update', $reservacion)}}">
    @csrf
    <input name="_method" type="hidden" value="PATCH">

    <div class="form-group col-md-2 has-feedback{{ $errors->has('numeroacompanantes') ? ' has-error' : '' }}">
      <label for="numeroacompanantes">No. Acompañantes *</label>
      <div class="input-group">
      <span class="input-group-addon"><span class="fa fa-users"></span></span>
      <input id="numeroacompanantes" value="{{$reservacion->NumeroAcompanantes}}" type="number" min="0" class="form-control" name="numeroacompanantes"  placeholder="0" required>
    </div>
      @if ($errors->has('numeroacompanantes'))
      <span class="help-block">{{ $errors->first('numeroacompanantes') }}</span>
      @endif
    </div>

    <div class="form-group col-md-5 has-feedback{{ $errors->has('idacompanantes') ? ' has-error' : '' }}">
      <label for="idacompanantes">Acompañantes *</label>
      <div class="input-group">
      <span class="input-group-addon"><span class="fa fa-users"></span></span>
      <input id="idacompanantes" value="{{$reservacion->IdsAcompanantes}}" type="text" class="form-control" name="idacompanantes"  placeholder="3,1,4" required>
    </div>
      @if ($errors->has('idacompanantes'))
      <span class="help-block">{{ $errors->first('idacompanantes') }}</span>
      @endif
    </div>

    <div class="row">
      <div class="col-md-12">
        <button type="submit" class="btn btn-info center-block">Guardar</button>
      </div>
      <!-- /.col -->
    </div>
  </form>
</div><!-- /.row -->


@endsection
