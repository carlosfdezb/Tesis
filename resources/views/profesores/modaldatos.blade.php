<div class="modal fade bd-example-modal-lg" id="modaldatos-{{$profesores->id}}" role="dialog">
    <div class="modal-dialog">
        {!!Form::model($profesores,['method'=>'PATCH','route'=>['profesores.update',$profesores->id]])!!}
    {{ csrf_field() }}
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h4 class="modal-title" align="center">
                    Modificar datos de {{ $profesores->primer_nombre.' '.$profesores->apellido_paterno }}
                </h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <input class="form-control" name="id" type="hidden" value="{{ $profesores->id}}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Nombres
                            </label>
                            <input class="form-control" name="primer_nombre" placeholder="Primer nombre" type="text" value="{{ $profesores->primer_nombre}}">
                            </input>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="segundo_nombre" placeholder="Segundo nombre" type="text" value="{{ $profesores->segundo_nombre}}">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Apellidos
                            </label>
                            <input class="form-control" name="apellido_paterno" placeholder="Apellido paterno" type="text" value="{{ $profesores->apellido_paterno}}">
                            </input>
                        </div>
                        <div class="form-group">
                            <input class="form-control" name="apellido_materno" placeholder="Apellido materno" type="text" value="{{ $profesores->apellido_materno}}">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Rut
                            </label>
                            <input class="form-control" name="rut" placeholder="Rut" type="text" value="{{ $profesores->rut}}">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Email
                            </label>
                            <input class="form-control" name="correo" placeholder="Correo electrónico" type="email" value="{{ $profesores->correo}}">
                            </input>
                        </div>
                    </input>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button">
                    Cerrar
                </button>
                <button class="btn btn-social btn-warning"type="submit">
                    <i class="fa fa-trash"></i>Modificar
                </button>
            </div>
        </div>
        {{Form::Close()}}
    </div>
</div>
