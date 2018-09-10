@extends('master')

@section('head')
    Crear Paquetes
@endsection



@section('contenido')
    <div class="container spark-screen" CONTENT="no-cache">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="panel panel-warning">
                    <div class="panel-heading">Paquetes Turisticos</div>

                      <div class="panel-body">
                        <form method="post" action="/CrearPaquete" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <div class="box-header with-border">
                                <h3 class="box-title">Crear paquetes turísticos</h3>
                            </div>
                        </div>

                        <div class="box box-warning">
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">

                        <div class="form-group">
                            <label for="nombrepaquete" class="control-label">Nombre de Paquete Turístico</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-automobile"></i></span>
                              <input type="text" name="nombrepaquete" class="form-control" id="nombrepaquete" placeholder="Nombre paquete" >
                              </div>
                        </div>

                        <div class="row">
                        	<div class="col-md-4">
                            <div class="form-group">
                                <label name="idrutaturistica" for="nombrerutaturistica">Nombre de Ruta Turística</label>

                                      @if($ruta !=null)
                                        <select  class="form-control" name="idrutaturistica"  id="idrutaturisticas" data-placeholder="Seleccionar la ruta...">
                                        @foreach ($ruta as $ruta)

                                        <option value="{{ $ruta->IdRutaTuristica }}"> {{$ruta->NombreRutaTuristica}}</option>
                                        @endforeach
                                        </select>
                                        <hr>
                                           @else
                                              <label>No hay rutas</label>
                                            @endif
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="tipopaquete">Tipo Paquete</label>
                              <br>
                              <select class="form-control" id="tipopaquete" name="tipopaquete">
                                  <option value="nacional">Nacional</option>
                                  <option value="internacional">Internacional</option>
                                </select>
                          </div>
                        </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="dificultad">Dificultad Paquete</label>
                              <br>
                              <select class="form-control" id="dificultad" name="dificultad">
                                  <option value="baja">Baja</option>
                                  <option value="media">Media</option>
                                  <option value="alta">Alta</option>
                                  <option value="extrema">Extrema</option>
                                </select>
                          </div>
                          </div>


                    </div>
                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="fechadesalida">Fecha de Salida</label>
                         <div class="input-group date">
                           <div class="input-group-addon">
                                 <i class="fa fa-calendar"></i>
                           </div>
                          <input name="fechasalida" type="date" class="form-control pull-right" id="fechasalida" placeholder="Fecha de Salida">
                        </div>
                      </div>
                    </div>
                      <div class="col-md-4">
                         <div class="form-group">
                          <label for="hora">Hora de Salida</label>
                         <div class="input-group time">
                           <div class="input-group-addon">
                                 <i class="fa fa-history"></i>
                           </div>
                          <input name="hora" type="time" id="hora" value="06:00:00"  max="24:00:00" min="00:00:00" class="form-control pull-right" >

                        </div>
                        </div>
                      </div>
                      <div class="col-md-4">

                        <div class="form-group">
                          <label for="fechaderegreso">Fecha de Regreso</label>
                         <div class="input-group date">
                           <div class="input-group-addon">
                                  <i class="fa fa-calendar"></i>
                           </div>
                          <input name="fecharegreso" type="date" class="form-control pull-right" id="fecharegreso" placeholder="Fecha de Regreso">

                        </div>
                        </div>
                      </div>
                    </div>
                      <div class="row">
                        <div class="col-md-4">
                           <div class="form-group">
                            <label for="cupos">Número de Cupos</label>
                            <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-child"></i>
                            </span>
                            <input  class="form-control" name="cupos" type="number" min="1" step="1" max="10,0000" placeholder="10" id="cupos">

                          </div>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label for="precio">Precio</label>
                                <div class="input-group">
                              <span class="input-group-addon">
                                <i class="fa fa-money"></i> $
                                </span>
                                <input class="form-control" name="precio" type="number" min="0.01" step="0.01" max="10,0000" placeholder="25,00" id="precio">
                          </div>
                                </div>
                          </div>
                        <div class="col-md-4">
                          <div class="form-group">
                              <label for="lugar">Lugar de Salida</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map"></i></span>
                                <input type="text" name="lugarsalida" class="form-control" id="lugarsalida" placeholder="Lugar" >

                              </div>
                          </div>
                        </div>

                      </div>

                        <div class="form-group">
                            <label for="iti">Itinerario</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-pencil-square-o"></i></span>
                              <textarea name="itinerario" class="form-control" id="itinerario" rows="20" ></textarea>

                              </div>
                        </div>

                        <div class="form-group">
                            <label name="gastosextras" for="gastosextras">Gastos Extras</label>
                                    <select class="form-control select2" multiple="multiple" name="gastosextras[]" id="gasto[]" >
                                    @foreach ($gastosextras as $gastos)

                                    <option value="{{$gastos->IdGastosExtras }}">{{$gastos->NombreGastos}}</option>
                                    @endforeach
                                    </select>

                        </div>

                        <div class="form-group">
                            <label for="queincluye">Que incluye</label>
                            <select class="form-control select2" multiple="multiple" name="incluye[]" >
                            @foreach ($incluye as $incluye)

                            <option value="{{ $incluye->IdIncluye }}"> {{$incluye->NombreIncluye}}</option>
                            @endforeach
                            </select>
                              </div>

                        <div class="form-group">
                            <label for="con">Condiciones</label>
                            <select class="form-control select2" multiple="multiple" name="condiciones[]" >
                            @foreach ($condiciones as $condiciones)

                            <option value="{{$condiciones->IdCondiciones}}">{{$condiciones->NombreCondiciones}} </option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="re">Recomendaciones</label>
                            <select class="form-control select2" multiple="multiple" name="recomendaciones[]" >
                            @foreach ($recomendaciones as $recomendaciones)

                            <option value="{{ $recomendaciones->IdRecomendaciones }}"> {{$recomendaciones->NombreRecomendaciones}}</option>
                            @endforeach
                            </select>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputFile">Imagenes</label>
                        <input type="file" multiple="true" name="imagenpaquete[]" >

                        <p class="help-block">Subir Hasta 5 Imagenes.</p>
                      </div>


                        <div class="form-check">
                              <input type='hidden' name='disponibilidadpaquete' value='0'/>
                              <input type='checkbox' name='disponibilidadpaquete' value='1'/>
                          <label class="form-check-label" for="disponibilidadpaquete">Disponibilidad de paquete</label>
                        </div>
                        <div class="form-check">
                              <input type='hidden' name='aprobacionpaquete' value='0'/>
                              <input type='checkbox' name='aprobacionpaquete' value='1'/>
                          <label class="form-check-label" for="aprobacionpaquete">Aprobacion de paquete</label>
                        </div>
                        </div>
                        </div>
                        <!-- /.box-body -->

                         <div class="box-footer" align="center">
                                    <button  type="submit" class="btn  btn-primary btn-flat">Guardar</button>
                                    <button  type="reset" class="btn  btn-warning btn-flat">Limpiar</button>
                                </div>



                        </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
