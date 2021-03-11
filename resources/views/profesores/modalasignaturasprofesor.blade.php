<?php 
  use App\Asignatura;

?>
<div class="modal fade bd-example-modal-lg" id="modalasignaturasprofesor-{{$profesores->id}}" role="dialog">
    <div class="modal-dialog">
        {!!Form::model($profesores,['method'=>'PUT','route'=>['profesores.asignar',$profesores->id]])!!}
    {{ csrf_field() }}
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h4 class="modal-title" align="center">
                    Agregar asignatura a {{$profesores->primer_nombre.' '.$profesores->apellido_paterno}}
                </h4>
            </div>
            <div class="modal-body">
                <?php 
                  $asignatura = Asignatura::all();

                ?>
                <input class="form-control" name="id" type="hidden" value="{{ $profesores->id}}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    Asignaturas
                                </label>
                                <select class="form-control" name="selectasignaturas">
                                    @foreach($asignatura as $asignaturas)
                                    <option value="{{$asignaturas->id}}">
                                        {{$asignaturas->nombre}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    Curso
                                </label>
                                <select class="form-control" name="selectnivel">
                                    @foreach($cursos as $curso)
                              @if($curso->nivel!='Kinder')
                                    <option value="{{$curso->nivel}}">
                                        {{$curso->nivel.'°'}}
                                    </option>
                                    @endif
                             @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    Grado
                                </label>
                                <select class="form-control" name="selectgrado">
                                    <option value="Básico">
                                        Básica
                                    </option>
                                    <option value="Medio">
                                        Media
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="exampleInputEmail1">
                                    Letra
                                </label>
                                <select class="form-control" name="selectletra">
                                    <option value="A">
                                        A
                                    </option>
                                    <option value="B">
                                        B
                                    </option>
                                </select>
                            </div>
                        </div>
                    </div>
                </input>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button">
                    Cerrar
                </button>
                <button class="btn btn-social btn-success" type="submit">
                    <i class="fa fa-floppy-o"></i>Agregar
                </button>
            </div>
        </div>
        {{Form::Close()}}
    </div>
</div>
