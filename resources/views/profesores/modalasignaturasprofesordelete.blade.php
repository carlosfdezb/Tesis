<div class="modal fade bd-example-modal-lg" id="modalasignaturasprofesordelete-{{$profesores->id}}" role="dialog">
    <div class="modal-dialog">
        {!!Form::model($profesores,['method'=>'PUT','route'=>['profesores.eliminar',$profesores->id]])!!}
    {{ csrf_field() }}
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h4 class="modal-title" align="center">
                    Eliminar asignatura dictada por {{$profesores->primer_nombre.' '.$profesores->apellido_paterno}}
                </h4>
            </div>
            <div class="modal-body">
                <?php 
                  $dictada = DB::table('asignatura_profesor')
                  ->
                join('asignaturas','asignatura_profesor.asignatura_id','=','asignaturas.id')
                  ->where('asignatura_profesor.profesor_id','=',$profesores->id)
                  ->get();

                ?>
                <input class="form-control" name="id" type="hidden" value="{{ $profesores->id}}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                @if($dictada->count() > 0)
                                <label for="exampleInputEmail1">
                                    Asignaturas dictadas
                                </label>
                                <select class="form-control" name="selectasignaturas">
                                    @foreach($dictada as $dictadas)
                                    <option value="{{$dictadas->asignatura_id}}">
                                        {{$dictadas->nombre.' -- '.$dictadas->nivel.' '.$dictadas->grado.' '.$dictadas->letra}}
                                    </option>
                                    @endforeach
                                </select>
                                @else
                                <h3>
                                    El profesor seleccionado no registra asignaturas asociadas.
                                </h3>
                                @endif
                            </div>
                        </div>
                    </div>
                </input>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button">
                    Cerrar
                </button>
                @if($dictada->count() > 0)
                <button class="btn btn-social btn-danger" type="submit">
                    <i class="fa fa-trash"></i>Eliminar
                </button>
                @else

                <button class="btn btn-social btn-danger" disabled="" type="submit">
                    <i class="fa fa-trash"></i>Eliminar
                </button>
                @endif
            </div>
        </div>
        {{Form::Close()}}
    </div>
</div>