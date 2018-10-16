@extends('master')

@section('head')
    @section('Title','Paquetes Turísticos')
@endsection

@section('contenido')
    <div class="container spark-screen" CONTENT="no-cache">
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
              @if(session('status'))
                <br>
                 <script type="text/javascript">
                alertify.success('<p class="fa fa-check" style="color: white"></p> {{ session("status") }}');
                </script>
              @endif
              @if(session('alert'))
                <br>
                <script type="text/javascript">
               alertify.error('<p class="fa fa-close" style="color: white"></p> {{session("alert") }}');
               </script>
              @endif
                <div class="panel">
                    <div class="panel-heading">Registrar de Paquete Turistico</div>

                      <div class="panel-body">
                        <form method="post" action="/CrearPaquete" enctype="multipart/form-data">


                        <div class="box box-warning">
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">

                        <div class="form-group">
                            <label for="nombrepaquete"  class="control-label">Nombre de Paquete Turístico</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-automobile"></i></span>
                              <input type="text" name="nombrepaquete" class="form-control" id="nombrepaquete" placeholder="Nombre paquete" required >
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
                              <select class="form-control" id="tipopaquete" name="tipopaquete" required>
                                  <option value="Nacional">Nacional</option>
                                  <option value="Internacional">Internacional</option>
                                </select>
                          </div>
                        </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <label for="dificultad">Dificultad Paquete</label>
                              <br>
                              <select class="form-control" id="dificultad" name="dificultad" required>
                                  <option value="Baja">Baja</option>
                                  <option value="Media">Media</option>
                                  <option value="Alta">Alta</option>
                                  <option value="Extrema">Extrema</option>
                                </select>
                          </div>
                          </div>


                    </div>

                    <label for="exampleInputFile">Mapa</label>
                    <br>
                    <div class="form-group row">
                      <a href="">
                          <img src="{{Storage::url("geoturismo.png")}}"  style="width: 800px; height: 400px; border: 334px vspace=10" class="img-responsive img-rounded col-md-4 previsualizar4" >
                      </a>
                      <br>
                      <br>
                      <br>
                      <input class="nuevaFoto4" type="file" name="imagen4" required>
                      <p class="help-block">Subir Imagen del Mapa.</p>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="fechadesalida">Fecha de Salida</label>
                         <div class="input-group date">
                           <div class="input-group-addon">
                                 <i class="fa fa-calendar"></i>
                           </div>
                          <input name="fechasalida" type="date" class="form-control pull-right" id="fechasalida" placeholder="Fecha de Salida" required>
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
                          <input name="hora" type="time" id="hora" value="06:00:00"  max="24:00:00" min="00:00:00" class="form-control pull-right" required>

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
                          <input name="fecharegreso" type="date" class="form-control pull-right" id="fecharegreso" placeholder="Fecha de Regreso" required>

                        </div>
                        </div>
                      </div>
                    </div>
                      <div class="row">
                        <div class="col-md-3">
                           <div class="form-group">
                            <label for="cupos">Número de Cupos</label>
                            <div class="input-group">
                          <span class="input-group-addon">
                            <i class="fa fa-child"></i>
                            </span>
                            <input  class="form-control" name="cupos" type="number" min="10" step="1" max="10,0000" placeholder="10" id="cupos" required>

                          </div>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group">
                              <label for="precio">Precio</label>
                                <div class="input-group">
                              <span class="input-group-addon">
                                <i class="fa fa-money"></i> $
                                </span>
                                <input class="form-control" name="precio" type="number" min="0.01" step="0.01" max="10,0000" placeholder="25,00" id="precio" required>
                          </div>
                                </div>
                          </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="lugar">Lugar de Salida</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map"></i></span>
                                <input type="text" name="lugarsalida" class="form-control" id="lugarsalida" value="Gasolinera UNO, Boulevard de Los Héroes" required>

                              </div>
                          </div>
                        </div>

                      </div>

                      <div class="form-group">
                          <label name="itinerario" for="itinerario">Itinerario</label>
                                  <select class="form-control select2" multiple="multiple" name="itinerario[]" id="itinerario[]" required>
                                  @foreach ($itinerario as $iti)

                                  <option value="{{$iti->IdItinerario }}">{{$iti->NombreItinerario}}</option>
                                  @endforeach
                                  </select>

                      </div>


                        <div class="form-group">
                            <label name="gastosextras" for="gastosextras">Gastos Extras</label>
                                    <select class="form-control select2" multiple="multiple" name="gastosextras[]" id="gasto[]" required>
                                    @foreach ($gastosextras as $gastos)

                                    <option value="{{$gastos->IdGastosExtras }}">{{$gastos->NombreGastos}} --> ${{$gastos->Gastos}}</option>
                                    @endforeach
                                    </select>

                        </div>

                        <div class="form-group">
                            <label for="queincluye">Que incluye</label>
                            <select class="form-control select2" multiple="multiple" name="incluye[]" required>
                            @foreach ($incluye as $incluye)

                            <option value="{{ $incluye->IdIncluye }}"> {{$incluye->NombreIncluye}}</option>
                            @endforeach
                            </select>
                              </div>

                        <div class="form-group">
                            <label for="con">Condiciones</label>
                            <select class="form-control select2" multiple="multiple" name="condiciones[]" required>
                            @foreach ($condiciones as $condiciones)

                            <option value="{{$condiciones->IdCondiciones}}">{{$condiciones->NombreCondiciones}} </option>
                            @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="re">Recomendaciones</label>
                            <select class="form-control select2" multiple="multiple" name="recomendaciones[]" required>
                            @foreach ($recomendaciones as $recomendaciones)

                            <option value="{{ $recomendaciones->IdRecomendaciones }}"> {{$recomendaciones->NombreRecomendaciones}}</option>
                            @endforeach
                            </select>
                        </div>
                      </div>
                      <label for="exampleInputFile">Imagenes</label>
                      <br>
                      <div class="form-group row">
                        <a href="">
                            <img src="{{Storage::url("geoturismo.png")}}"  style="width: 200px; height: 200px; border: 334px vspace=10" class="img-responsive img-rounded col-md-4 previsualizar" >
                        </a>
                        <br>
                        <br>
                        <br>
                            <input class="nuevaFoto" type="file" name="imagen1" required>
                       <p class="help-block">Subir Imagen 1.</p>
                      </div>

                      <div class="form-group row">
                        <a href="">
                            <img src="{{Storage::url("geoturismo.png")}}"  style="width: 200px; height: 200px; border: 334px vspace=10" class="img-responsive img-rounded col-md-4 previsualizar2" >
                        </a>
                        <br>
                        <br>
                        <br>
                        <input  class="nuevaFoto2" type="file"  name="imagen2" required >
                        <p class="help-block">Subir Imagen 2.</p>
                      </div>
                      <div class="form-group row">
                        <a href="">
                            <img src="{{Storage::url("geoturismo.png")}}"  style="width: 200px; height: 200px; border: 334px vspace=10" class="img-responsive img-rounded col-md-4 previsualizar3" >
                        </a>
                        <br>
                        <br>
                        <br>
                        <input type="file"  class="nuevaFoto3" name="imagen3" required >
                        <p class="help-block">Subir Imagen 3.</p>
                      </div>


                        </div>
                        <!-- /.box-body -->

                        <div class="row">
                          <div class="col-md-10 col-md-offset-4">
                            <button type="submit" class="btn btn-info ">Registrar</button>
                            <button type="reset" class="btn btn-warning ">Limpiar</button>
                          </div>

                          <!-- /.col -->
                        </div>

                        </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
