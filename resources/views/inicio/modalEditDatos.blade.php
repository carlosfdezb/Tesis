<div class="modal fade bd-example-modal-lg" id="modalEditDatos-{{auth()->user()->id}}" role="dialog">
    <div class="modal-dialog">
        {!!Form::model(auth()->user(),['method'=>'PUT','route'=>['datosUsuarios.Edit',auth()->user()->id]])!!}
    {{ csrf_field() }}
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h4 class="modal-title" align="center">
                    Modificar sus datos
                </h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Email
                            </label>
                            <input class="form-control" name="correo" placeholder="Rut" type="text" value="{{ auth()->user()->email}}" required>
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Contraseña
                            </label>
                            <input class="form-control" name="contraseña" placeholder="Ingrese nueva contraseña" type="text">
                            </input>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Confirmar contraseña
                            </label>
                            <input class="form-control" name="contraseña_confirm" placeholder="Confirme nueva contraseña" type="text">
                            </input>
                        </div>
                    </input>
                </div>
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
