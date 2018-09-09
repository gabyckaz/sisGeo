@extends('master')

@section('head')
    Actualizar Paquetes
@endsection



@section('contenido')
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-9 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Actualizar Paquetes Turisticos</div>

                      <div class="panel-body">
                        <form method="POST" action="{{$paquete->IdPaquete}}" files = "true" >
                        <input name="_method" type="hidden" value="PUT">

                        <div class="col-md-12">
                        <div class="box box-warning">
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">

                        <div class="form-group">
                            <label for="nombrepaquete">Nombre de Paquete Turístico</label>
                            <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-automobile"></i></span>
                              <input type="text" name="nombrepaquete" value="{{$paquete->NombrePaquete}}" class="form-control" id="nombrepaquete" placeholder="Nombre paquete" >

                              </div>
                        </div>
                        <div class="form-group">
                            <label name="idrutaturistica" for="nombrerutaturistica">Nombre de Ruta Turística</label>

                                  @if($ruta !=null)
                                    <select  class="form-inline" name="idrutaturistica"  id="idrutaturistica" data-placeholder="Seleccionar la ruta...">
                                    @foreach ($ruta as $ruta)

                                    <option value="{{ $ruta->IdRutaTuristica }}"> {{$ruta->NombreRutaTuristica}}</option>
                                    @endforeach
                                    </select>
                                    <hr>
                                       @else
                                          <label>No hay rutas</label>
                                        @endif
                        </div>

                        <div class="form-group">
                          <label for="fechadesalida">Fecha de Salida</label>
                         <div class="input-group date">
                           <div class="input-group-addon">
                                 <i class="fa fa-calendar"></i>
                           </div>
                          <input name="fechasalida" type="date" class="form-control pull-right" id="fechasalida" placeholder="Fecha de Salida" value="{{ $paquete->FechaSalida}}">

                        </div>

                         <div class="form-group">
                          <label for="hora">Hora de Salida</label>
                         <div class="input-group time">
                           <div class="input-group-addon">
                                 <i class="fa fa-history"></i>
                           </div>
                          <input name="hora" type="time" id="hora"  max="24:00:00" min="00:00:00" class="form-control pull-right" value="{{$paquete->HoraSalida}}" >

                        </div>
                        </div>

                        </div>
                        <div class="form-group">
                          <label for="fechaderegreso">Fecha de Regreso</label>
                         <div class="input-group date">
                           <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                           </div>
                          <input name="fecharegreso" type="date" class="form-control pull-right" id="fecharegreso" placeholder="Fecha de Regreso" value="{{$paquete->FechaRegreso}}">

                        </div>
                        </div>

                        <div class="form-group">
                            <label for="lugar">Lugar de Salida</label>
                            <div class="input-group">
                              <input type="text" name="lugarsalida" class="form-control" id="lugarsalida" placeholder="Lugar" value="{{$paquete->LugarRegreso}}">
                                      <span class="input-group-addon"><i class="fa fa-map"></i></span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <div class="input-group">
                              <span class="input-group"><i class="fa fa-money"></i>
                              <span>$</span><input name="precio" type="text" min="0.01" step="0.01" max="10,0000" placeholder="25,00" id="precio" value="{{$paquete->Precio}}"></span>
                              </div>
                        </div>

                        <div class="form-group">
                            <label for="iti">Itinerario</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              <input name="itinerario" class="form-control" id="itinerario" rows="20" value="{{$paquete->Itinerario}}" ></input>

                              </div>
                        </div>

                      <div class="col-xs-4">
                                    <h4>
                                                    <span class="label label-primary">Imagen</span>
                                                            </h4>
                                                            @foreach ($imagen as $imagenes)
                                                            <ul id="lightgallery">
                                                                <li data-src="{{asset('storage/imagenesPaquete')}}/{{$imagenes->Imagen1}}" data-sub-html="<h4>Imagen</h4><p>Imagen del examen Fisico</p>">
                                                                    <a href="{{asset('storage/imagenesPaquete')}}/{{$imagenes->Imagen1}}">
                                                                        <img src="{{asset('storage/imagenesPaquete')}}/{{$imagenes->Imagen1}}" class="img-responsive" style="width: 100px; height: 100px; border: 2px solid green" class="img-responsive img-rounded" >
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                            @endforeach
                                                        </div>



                        </div>
                        <!-- /.box-body -->

                         <div class="box-footer">
                                    <button type="submit" class="btn btn-primary">Actualizar</button>
                                </div>



                        </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
