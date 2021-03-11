<div class="modal fade bd-example-modal-lg" id="create" role="dialog">
    <div class="modal-dialog">
        {!!Form::open(['url'=>'profesores','method'=>'POST','name'=> 'FormularioProfesorCreate', 'files'=>'true'])!!}
  {{csrf_field()}}
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h4 class="modal-title" align="center">
                    Agregar nuevo profesor
                </h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Nombres
                        </label>
                        <input class="form-control" name="primer_nombre" placeholder="Primer nombre" type="text" required>
                        </input>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="segundo_nombre" placeholder="Segundo nombre" type="text" required>
                        </input>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Apellidos
                        </label>
                        <input class="form-control" name="apellido_paterno" placeholder="Apellido paterno" type="text" required>
                        </input>
                    </div>
                    <div class="form-group">
                        <input class="form-control" name="apellido_materno" placeholder="Apellido materno" type="text" required>
                        </input>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Rut
                        </label>
                        <input class="form-control" name="rut" placeholder="Rut" type="text" required>
                        </input>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Email
                        </label>
                        <input class="form-control" name="correo" placeholder="Correo electrónico" type="email" required>
                        </input>
                    </div>
                </div>
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
