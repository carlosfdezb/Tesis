<?php 
use App\Profesor;
?>
<div class="modal fade bd-example-modal-lg" id="modalprofesorjefe-{{$cursos->id}}" role="dialog">
    <div class="modal-dialog">
        {!!Form::model($cursos,['method'=>'PATCH','route'=>['cursos.update',$cursos->id]])!!}
    {{ csrf_field() }}
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h4 class="modal-title"  align="center">
                    Modificar jefatura del @if($cursos->nivel=='Kinder')
          {{ $cursos->nivel.' '.$cursos->letra }}
        @else
          {{ $cursos->nivel.'° '.$cursos->grado.' '.$cursos->letra }}
        @endif
                </h4>
            </div>
            <div class="modal-body">
                <input class="form-control" name="id" type="hidden" value="{{ $cursos->id}}">
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Profesor jefe actual:
                        </label>
                        <h4>
                            {{ $cursos->profesor->primer_nombre.' '.$cursos->profesor->apellido_paterno.' '.$cursos->profesor->apellido_materno}}
                        </h4>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Rut:
                        </label>
                        <h4>
                            {{ $cursos->profesor->rut}}
                        </h4>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Correo:
                        </label>
                        <h4>
                            {{ $cursos->profesor->correo}}
                        </h4>
                    </div>
                    <hr>
                        <?php 
                    $profes = Profesor::all()->where('estado','Activo');

                ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Profesores actualmente sin jefatura:
                            </label>
                            <select class="form-control" name="selectprofes">
                                @foreach($profes as $profeslista)
                     @if(is_null($profeslista->curso))
                                <option value="{{$profeslista->id}}">
                                    Rut: {{$profeslista->rut.' - '.$profeslista->primer_nombre.' '.$profeslista->apellido_paterno}}
                                </option>
                                @endif
                    @endforeach
                            </select>
                        </div>
                    </hr>
                </input>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button">
                    Cerrar
                </button>
                <button class="btn btn-social btn-warning" type="submit">
                    <i class="fa fa-floppy-o"></i>Modificar
                </button>
            </div>
        </div>
        {{Form::Close()}}
    </div>
</div>
