@extends('master')

@section('head')

@endsection
@section('Title')
<strong>Crear paquete a partir de paquete existente</strong>
@endsection

@section('contenido')
      @if(session('status'))
              <script type="text/javascript">
                alertify.success('<h4><i class="icon fa fa-check"></i> Alert!</h4> {{ session("status") }}');
                </script>
            @endif
            @if(session('fallo'))
                <script type="text/javascript">
               alertify.error('<h4><i class="icon fa fa-ban"></i> Alert!</h4> {{session("fallo") }}');
               </script>
            @endif
    <div class="container spark-screen">
        <div class="row">
            <div class="col-md-9 col-md-offset-1">
                    <form method="post" action="{{$paquete->IdPaquete}}" files = "true" enctype="multipart/form-data" >
                          {{ csrf_field() }}

                        <div class="col-md-12">
                        <div class="box box-warning">
                        <!-- /.box-header -->
                        <!-- form start -->
                        <div class="box-body">

                        <div class="form-group">
                            <label for="nombrepaquete">Nombre de Paquete Turístico</label>
                            <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-automobile"></i></span>
                              <input type="text" name="nombrepaquete" value="{{$paquete->NombrePaquete}}" class="form-control" id="nombrepaquete" placeholder="Nombre paquete" required>
                                @if ($errors->has('nombrepaquete'))
                                <span class="help-block">{{ $errors->first('nombrepaquete') }}</span>
                                @endif
                              </div>
                        </div>
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                                <label name="idrutaturistica" for="nombrerutaturistica">Nombre de Ruta Turística</label>
                                  @if($ruta !=null)
                                    <select  class="form-control" name="idrutaturistica"  id="idrutaturistica" readonly>
                                    @foreach ($ruta as $ruta)
                                      <option value="{{ $ruta->IdRutaTuristica }}" {{ $ruta->IdRutaTuristica == $ruta->IdRutaTuristica ? 'selected' : '' }}>{{ $ruta->NombreRutaTuristica }}</option>
                                    @endforeach
                                    </select>

                                   @else
                                    <label>No hay rutas</label>
                                   @endif
                            </div>
                      </div>
                        <div class="col-md-4">
                        <div class="form-group">
                          <label for="fechadesalida">Fecha de Salida</label>
                           <div class="input-group date">
                             <div class="input-group-addon">
                                   <i class="fa fa-calendar"></i>
                             </div>
                            <input name="fechasalida" type="date" class="form-control pull-right" id="fechasalida" placeholder="Fecha de Salida" required>
                          </div>
                          @if ($errors->has('fechasalida'))
                          <span class="help-block">{{ $errors->first('fechasalida') }}</span>
                          @endif
                      </div>
                    </div>
                    <div class="col-md-4">
                         <div class="form-group">
                          <label for="hora">Hora de Salida</label>
                         <div class="input-group time">
                           <div class="input-group-addon">
                                 <i class="fa fa-history"></i>
                           </div>
                          <input name="hora" type="time" id="hora"  max="24:00:00" min="00:00:00" class="form-control pull-right" value="{{$paquete->HoraSalida}}" required>
                        </div>
                        @if ($errors->has('hora'))
                        <span class="help-block">{{ $errors->first('hora') }}</span>
                        @endif
                        </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                        <div class="form-group">
                          <label for="fechaderegreso">Fecha de Regreso</label>
                           <div class="input-group date">
                             <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                             </div>
                            <input name="fecharegreso" type="date" class="form-control pull-right" id="fecharegreso" placeholder="Fecha de Regreso" required>

                          </div>
                          @if ($errors->has('fecharegreso'))
                          <span class="help-block">{{ $errors->first('fecharegreso') }}</span>
                          @endif
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="lugar">Lugar de Salida</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-map"></i></span>
                              <input type="text" name="lugarsalida" class="form-control" id="lugarsalida" placeholder="Lugar" value="{{$paquete->LugarRegreso}}" required>
                            </div>
                            @if ($errors->has('lugarsalida'))
                            <span class="help-block">{{ $errors->first('lugarsalida') }}</span>
                            @endif
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                            <label for="precio">Precio</label>
                            <div class="input-group">
                              <span class="input-group-addon"><i class="fa fa-money"></i>
                              $</span><input class="form-control" name="precio" type="number" min="0.01" step="0.01" max="10,0000" placeholder="25,00" id="precio" value="{{$paquete->Precio}}" required>
                              </div>
                              @if ($errors->has('precio'))
                              <span class="help-block">{{ $errors->first('precio') }}</span>
                              @endif
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
                          <input  class="form-control" name="cupos" type="number" min="1" step="1" max="10,0000" value="{{$paquete->Cupos}}" id="cupos" required>
                        </div>
                        @if ($errors->has('cupos'))
                        <span class="help-block">{{ $errors->first('cupos') }}</span>
                        @endif
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="tipopaquete">Tipo Paquete</label>
                          <br>
                          <select class="form-control" id="tipopaquete" name="tipopaquete">
                            <option value="Nacional" @if (old('tipopaquete') == "Nacional" ) {{ 'selected' }} @endif>Nacional</option>
                            <option value="Internacional" @if (old('tipopaquete') == "Internacional" ) {{ 'selected' }} @endif>Internacional</option>
                            </select>
                      </div>
                    </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label for="dificultad">Dificultad Paquete</label>
                          <br>
                          <select class="form-control" id="dificultad" name="dificultad">
                            <option value="Baja" @if (old('dificultad') == "Baja" ) {{ 'selected' }} @endif>Baja</option>
                            <option value="Media" @if (old('dificultad') == "Media" ) {{ 'selected' }} @endif>Media</option>
                            <option value="Alta" @if (old('dificultad') == "Alta" ) {{ 'selected' }} @endif>Alta</option>
                            <option value="Extrema" @if (old('dificultad') == "Extrema" ) {{ 'selected' }} @endif>Extrema</option>
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

                    <div class="form-group">
                        <label for="iti">Itinerario</label>
                        @php $x='f';
                        @endphp


                        <select class="form-control select2" multiple="multiple" name="itinerario[]" required>
                          @for ($i = 0; $i < count($itinerario); $i++)

                           @for ($j = 0; $j < count($itinerariopaquete); $j++)
                           @if($itinerariopaquete[$j]->itinerario_id == $itinerario[$i]->IdItinerario)
                                 <option value="{{ $itinerario[$i]->IdItinerario }}"{{ 'selected'}} > {{$itinerario[$i]->NombreItinerario}}</option>
                                 @php $x='t';
                                 @endphp
                            @endif
                           @endfor
                           @if($x == 't')
                             @php $x ='f';
                             @endphp
                           @else
                            <option value="{{ $itinerario[$i]->IdItinerario }}" > {{$itinerario[$i]->NombreItinerario}}</option>
                           @endif
                          @endfor

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="re">Recomendaciones</label>
                        @php $x='f';
                        @endphp
                        <select class="form-control select2" multiple="multiple" name="recomendaciones[]" required>
                          @for ($i = 0; $i < count($recomendaciones); $i++)

                           @for ($j = 0; $j < count($recomendacionespaquete); $j++)
                           @if($recomendacionespaquete[$j]->recomendaciones_id == $recomendaciones[$i]->IdRecomendaciones)
                                 <option value="{{ $recomendaciones[$i]->IdRecomendaciones }}"{{ 'selected'}}> {{$recomendaciones[$i]->NombreRecomendaciones}}</option>
                                 @php $x='t';
                                 @endphp
                            @endif
                           @endfor
                           @if($x == 't')
                             @php $x ='f';
                             @endphp
                           @else
                            <option value="{{ $recomendaciones[$i]->IdRecomendaciones }}" > {{$recomendaciones[$i]->NombreRecomendaciones}}</option>
                           @endif
                          @endfor

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="in">Que incluye</label>
                        @php $x='f';
                        @endphp
                        <select class="form-control select2" multiple="multiple" name="incluye[]" required>
                          @for ($i = 0; $i < count($incluye); $i++)

                           @for ($j = 0; $j < count($incluyepaquete); $j++)
                           @if($incluyepaquete[$j]->incluye_id == $incluye[$i]->IdIncluye)
                                 <option value="{{ $incluye[$i]->IdIncluye }}"{{ 'selected'}}> {{$incluye[$i]->NombreIncluye}}</option>
                                 @php $x='t';
                                 @endphp
                            @endif
                           @endfor
                           @if($x == 't')
                             @php $x ='f';
                             @endphp
                           @else
                            <option value="{{ $incluye[$i]->IdIncluye }}" > {{$incluye[$i]->NombreIncluye}}</option>
                           @endif
                          @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="con">Condiciones</label>
                        @php $x='f';
                        @endphp
                        <select class="form-control select2" multiple="multiple" name="condiciones[]" required>
                          @for ($i = 0; $i < count($condiciones); $i++)

                           @for ($j = 0; $j < count($condicionespaquete); $j++)
                           @if($condicionespaquete[$j]->condiciones_id == $condiciones[$i]->IdCondiciones)
                                 <option value="{{ $condiciones[$i]->IdCondiciones }}"{{ 'selected'}}> {{$condiciones[$i]->NombreCondiciones}}</option>
                                 @php $x='t';
                                 @endphp
                            @endif
                           @endfor
                           @if($x == 't')
                             @php $x ='f';
                             @endphp
                           @else
                            <option value="{{ $condiciones[$i]->IdCondiciones }}" > {{$condiciones[$i]->NombreCondiciones}}</option>
                           @endif
                          @endfor
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gastosextras">Gastos Extras</label>
                        @php $x='f';
                        @endphp
                        <select class="form-control select2" multiple="multiple" name="gastosextras[]" required>
                          @for ($i = 0; $i < count($gastosextras); $i++)

                           @for ($j = 0; $j < count($gastosextraspaquete); $j++)
                           @if($gastosextraspaquete[$j]->gastosextras_id == $gastosextras[$i]->IdGastosExtras)
                                 <option value="{{ $gastosextras[$i]->IdGastosExtras }}"{{ 'selected'}}> {{$gastosextras[$i]->NombreGastos}}--${{$gastosextras[$i]->Gastos}}</option>
                                 @php $x='t';
                                 @endphp
                            @endif
                           @endfor
                           @if($x == 't')
                             @php $x ='f';
                             @endphp
                           @else
                            <option value="{{ $gastosextras[$i]->IdGastosExtras }}" > {{$gastosextras[$i]->NombreGastos}}{{$gastosextras[$i]->Gastos}}</option>
                           @endif
                          @endfor
                        </select>
                    </div>
                        <h4><span class="label label-primary">Imagenes</span></h4>
                        <div class="row">
                          <div  id="lightgallery" >
                            <div class="row">
                              <input class="nuevaFoto" type="file" name="imagen1" id="imagen1" required>
                              <a href="">
                               <img src="{{Storage::url("geoturismo.png")}}"  style="width: 200px; height: 200px; border: 334px vspace=10" class="img-responsive img-rounded col-md-4 previsualizar" required>
                              </a>
                            </div>
                            <div class="row">
                              <input class="nuevaFoto2" type="file" name="imagen2" required>
                                <a href="">
                                  <img src="{{Storage::url("geoturismo.png")}}"  style="width: 200px; height: 200px; border: 334px vspace=10" class="img-responsive img-rounded col-md-4 previsualizar2" required>
                                </a>
                            </div>
                            <div class="row">
                                <input class="nuevaFoto3" type="file" name="imagen3" required>
                                  <a href="">
                                    <img src="{{Storage::url("geoturismo.png")}}"  style="width: 200px; height: 200px; border: 334px vspace=10" class="img-responsive img-rounded col-md-4 previsualizar3" required>
                                  </a>
                            </div>
                           </div>
                          </div>
                        </div>
                        <!-- /.box-body -->

                         <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Guardar</button>
                         </div>
                        </div>
                        </form>
                    </div>
        </div>
    </div>

@endsection
