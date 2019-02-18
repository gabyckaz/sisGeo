@extends('master')

@section('head')

@endsection
@section('Title')
<strong>Paquetes Turísticos</strong>
@endsection

@section('contenido')

        <div class="row">
            <div class="col-md-9 col-md-offset-1">
              @if(session('status'))
                <br>
                 <script type="text/javascript">
                alertify.success('<h4><i class="icon fa fa-check"></i> Alert!</h4> {{ session("status") }}');
                </script>
              @endif
              @if(session('alert'))
                <br>
                <script type="text/javascript">
               alertify.error('<h4><i class="icon fa fa-ban"></i> Alert!</h4> {{session("fallo") }}');
               </script>
              @endif
            <div class="panel panel-default">
                    <div class="panel-heading"><strong>Registrar un nuevo Paquete Turistico</strong></div>

                      <div class="panel-body">
                        <form method="post" action="/CrearPaquete" enctype="multipart/form-data">
                          {{ csrf_field() }}

                        <div class="box box-warning">
                        <!-- /.box-header -->
                        <!-- form start -->
                          <div class="box-body">

                              <div class="form-group">
                                  <label for="nombrepaquete"  class="control-label">Nombre de Paquete Turístico</label>
                                  <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-automobile"></i></span>
                                    <input type="text" name="nombrepaquete" class="form-control" id="nombrepaquete" value="{{ old('nombrepaquete')}}" placeholder="Nombre paquete" required >
                                  </div>
                              </div>

                              <div class="row">
                        	       <div class="col-md-4">
                                   <div class="form-group">
                                     <label name="idrutaturistica" for="nombrerutaturistica">Nombre de Ruta Turística</label>
                                        @if($ruta !=null)
                                          <select  class="form-control" name="idrutaturistica"  id="idrutaturisticas" data-placeholder="Seleccionar la ruta...">
                                        @foreach ($ruta as $ruta)
                                          <option value="{{ $ruta->IdRutaTuristica }}" @if (old('idrutaturistica') == $ruta->IdRutaTuristica ) {{ 'selected' }} @endif> {{$ruta->NombreRutaTuristica}}</option>
                                        @endforeach
                                          </select>
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
                                      <option value="Nacional" @if (old('tipopaquete') == "Nacional" ) {{ 'selected' }} @endif>Nacional</option>
                                      <option value="Internacional" @if (old('tipopaquete') == "Internacional" ) {{ 'selected' }} @endif>Internacional</option>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-md-4">
                                  <div class="form-group">
                                    <label for="dificultad">Dificultad Paquete</label>
                                    <br>
                                    <select class="form-control" id="dificultad" name="dificultad" required>
                                      <option value="Baja" @if (old('dificultad') == "Baja" ) {{ 'selected' }} @endif>Baja</option>
                                      <option value="Media" @if (old('dificultad') == "Media" ) {{ 'selected' }} @endif>Media</option>
                                      <option value="Alta" @if (old('dificultad') == "Alta" ) {{ 'selected' }} @endif>Alta</option>
                                      <option value="Extrema" @if (old('dificultad') == "Extrema" ) {{ 'selected' }} @endif>Extrema</option>
                                    </select>
                                  </div>
                                </div>
                          </div>
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group has-feedback{{ ( $errors->has('fechasalida') || session()->has('ErrorFs') || session()->has('ErrorFeschas') ) ? ' has-error' : '' }}">
                                <label for="fechadesalida">Fecha de Salida</label>
                                  <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input name="fechasalida" type="date" class="form-control pull-right" id="fechasalida"  value="{{$todayDate = date("Y-m-d")}}" placeholder="d-m-Y" required>
                                  </div>
                                  @if ($errors->has('fechasalida'))
                                    <span class="help-block">{{ $errors->first('fechasalida') }}</span>
                                  @endif
                                  @if(session()->has('ErrorFs'))
                                    <span class="help-block">{{ session()->get('ErrorFs') }}</span>
                                  @endif
                                  @if(session()->has('ErrorFeschas'))
                                    <span class="help-block">{{ session()->get('ErrorFeschas') }}</span>
                                  @endif
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group has-feedback{{ ( $errors->has('fecharegreso') || session()->has('ErrorFr') || session()->has('ErrorFeschas') ) ? ' has-error' : '' }}">
                                <label for="fechaderegreso">Fecha de Regreso</label>
                                  <div class="input-group date">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input name="fecharegreso" type="date" class="form-control pull-right" id="fecharegreso" value="{{$todayDate = date("Y-m-d")}}" placeholder="Fecha de Regreso" required>
                                  </div>
                                  @if ($errors->has('fecharegreso'))
                                    <span class="help-block">{{ $errors->first('fecharegreso') }}</span>
                                  @endif
                                  @if(session()->has('ErrorFr'))
                                    <span class="help-block">{{ session()->get('ErrorFr') }}</span>
                                  @endif
                                  @if(session()->has('ErrorFeschas'))
                                    <span class="help-block">{{ session()->get('ErrorFeschas') }}</span>
                                  @endif
                                </div>
                              </div>
                            <div class="col-md-3">
                              <div class="form-group">
                                <label for="hora">Hora de Salida</label>
                                <div class="input-group time">

                                  <span class="input-group-addon">  <i class="fa fa-history"></i></span>

                                  <input name="hora" type="time" id="hora" value="06:00:00"  max="24:00:00" min="00:00:00" value="{{ old('hora')}}" class="form-control pull-right" required>

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
                            <input  class="form-control" name="cupos" type="number" min="10" step="1" max="10,0000" value="{{ old('cupos')}}" placeholder="10" id="cupos" required>

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
                                <input class="form-control" name="precio" type="number" min="0.01" step="0.01" max="10,0000" value="{{ old('precio')}}" placeholder="25,00" id="precio" required>
                          </div>
                                </div>
                          </div>
                        <div class="col-md-6">
                          <div class="form-group">
                              <label for="lugar">Lugar de Salida</label>
                              <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-map"></i></span>
                                <input type="text" name="lugarsalida" class="form-control" id="lugarsalida" value="{{ old('lugarsalida','Gasolinera UNO, Boulevard de Los Héroes')}}" required>

                              </div>
                          </div>
                        </div>

                      </div>
                      <div class="row">
                        <div class="col-md-12">
                      <div class="form-group">
                          <label for="video"  class="control-label">URL del video en YouTube</label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-file-video-o"></i></span>
                            <input type="text" name="video" class="form-control" id="video" value="{{ old('video')}}" placeholder="URL del Video en YouTube como Copiar código de inserción">
                          </div>
                      </div>
                      </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                      <div class="form-group">
                          <label for="galeria"  class="control-label">URL de la galeria de Facebook de este paquete</label>
                          <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-image"></i></span>
                            <input type="text" name="galeria" class="form-control" id="galeria" value="{{ old('galeria')}}" placeholder="URL de la galeria de imagenes en Facebook">
                          </div>
                      </div>
                    </div>
                  </div>
                    <div class="row">
                    <div class="col-md-12">
                        <strong><p class="help-block">Mapa:</p></strong>
                      <a href="">
                          <img src="{{Storage::url("geoturismo.png")}}"  style="width: 800px; height: 400px; border: 334px vspace=10" class="img-responsive img-rounded col-md-4 previsualizar4" >
                      </a>
                        <input class="nuevaFoto4" type="file" name="imagen4" required>
                    </div>
                    </div>
                    <br>
                    <div class="row">
                    <div  class="col-md-12">
                      <div class="form-group">
                          <label name="itinerario" for="itinerario">Itinerario</label>
                            <select class="form-control select2" multiple="multiple" name="itinerario[]" id="itinerario[]" required>
                            @foreach ($itinerario as $iti)

                            <option value="{{$iti->IdItinerario }}" {{ (collect(old('itinerario'))->contains($iti->IdItinerario)) ? 'selected':'' }} >{{$iti->NombreItinerario}}</option>
                            @endforeach
                            </select>
                       </div>
                    </div>
                  </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                            <label name="gastosextras" for="gastosextras">Gastos Extras</label>
                                    <select class="form-control select2" multiple="multiple" name="gastosextras[]" id="gasto[]" required>
                                    @foreach ($gastosextras as $gastos)

                                    <option value="{{$gastos->IdGastosExtras }}" {{ (collect(old('gastosextras'))->contains($gastos->IdGastosExtras)) ? 'selected':'' }}>{{$gastos->NombreGastos}} --> ${{$gastos->Gastos}}</option>
                                    @endforeach
                                    </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                            <label for="queincluye">Que incluye</label>
                            <select class="form-control select2" multiple="multiple" name="incluye[]" required>
                            @foreach ($incluye as $incluye)

                            <option value="{{ $incluye->IdIncluye }}" {{ (collect(old('incluye'))->contains($incluye->IdIncluye )) ? 'selected':'' }}> {{$incluye->NombreIncluye}}</option>
                            @endforeach
                            </select>
                          </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                            <label for="con">Condiciones</label>
                            <select class="form-control select2" multiple="multiple" name="condiciones[]" required>
                            @foreach ($condiciones as $condiciones)

                            <option value="{{$condiciones->IdCondiciones}}" {{ (collect(old('condiciones'))->contains($condiciones->IdCondiciones )) ? 'selected':'' }}>{{$condiciones->NombreCondiciones}} </option>
                            @endforeach
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12">
                          <div class="form-group">
                            <label for="re">Recomendaciones</label>
                            <select class="form-control select2" multiple="multiple" name="recomendaciones[]" required>
                            @foreach ($recomendaciones as $recomendaciones)

                            <option value="{{ $recomendaciones->IdRecomendaciones }}" {{ (collect(old('recomendaciones'))->contains($recomendaciones->IdRecomendaciones )) ? 'selected':'' }}> {{$recomendaciones->NombreRecomendaciones}}</option>
                            @endforeach
                            </select>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                     <div class="panel panel-default">
                        <div class="panel-heading">
                          <strong><h3 class="panel-title">Imagenes para presentacion de paquete</h3></strong>
                        </div>
                        <div class="panel-body">
                          <table>
                            <tbody>
                              <tr>
                                <td><input class="nuevaFoto" type="file" name="imagen1" required></td>
                                <td>
                                 <a href="">
                                  <img src="{{Storage::url("geoturismo.png")}}"  style="width: 200px; height: 200px; border: 334px vspace=10" class="img-responsive img-rounded col-md-4 previsualizar" ></a>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <hr>
                          <table>
                            <tbody>
                              <tr>
                                <td><input  class="nuevaFoto2" type="file"  name="imagen2" required ></td>
                                <td>
                                  <a href="">
                                  <img src="{{Storage::url("geoturismo.png")}}"  style="width: 200px; height: 200px; border: 334px vspace=10" class="img-responsive img-rounded col-md-4 previsualizar2" ></a>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                          <hr>
                          <table>
                            <tbody>
                              <tr>
                                <td><input type="file"  class="nuevaFoto3" name="imagen3" required ></td>
                                <td>
                                  <a href="">
                                  <img src="{{Storage::url("geoturismo.png")}}"  style="width: 200px; height: 200px; border: 334px vspace=10" class="img-responsive img-rounded col-md-4 previsualizar3" ></a>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>
                      </div>
                    </div>
                  </div>

                  </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="row">
                          <div class="col-md-10 col-md-offset-4">
                            <button type="submit" class="btn btn-info ">Registrar</button>
                            <button type="reset" class="btn btn-warning ">Limpiar</button>
                          </div>

                          <!-- /.col -->
                        </div >

                        </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>

@endsection
