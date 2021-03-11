<div class="modal fade bd-example-modal-lg" id="modalpie-{{$profesores->id}}" role="dialog">
    <div class="modal-dialog">
        {!!Form::model($profesores,['method'=>'PUT','route'=>['profesores.pie',$profesores->id]])!!}
    {{ csrf_field() }}
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>  
                <h4 class="modal-title">
                    Agregar profesor a PIE
                </h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <input class="form-control" name="id" type="hidden" value="{{ $profesores->id}}">
                    <input class="form-control" name="operacion" type="hidden" value="1">
                    <div class="form-group">
                            <label for="exampleInputEmail1">
                                Nombres
                            </label>
                            <div class="form-control" name="primer_nombre" placeholder="Primer nombre" type="text">{{ $profesores->primer_nombre}}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-control" name="segundo_nombre" placeholder="Segundo nombre" type="text">{{ $profesores->segundo_nombre}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampledivEmail1">
                                Apellidos
                            </label>
                            <div class="form-control" name="apellido_paterno" placeholder="Apellido paterno" type="text">{{ $profesores->apellido_paterno}}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-control" name="apellido_materno" placeholder="Apellido materno" type="text">{{ $profesores->apellido_materno}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampledivEmail1">
                                Rut
                            </label>
                            <div class="form-control" name="rut" placeholder="Rut" type="text">{{ $profesores->rut}}
                            </div>
                        </div>
                    <div class="form-group">
                            <label for="exampleInputEmail1">
                                Especialidad
                            </label>
                            <input class="form-control" name="especialidad" placeholder="Ingrese especialidad" type="text" required>
                            </input>
                        </div>
                </div>

                
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button">
                    Cerrar
                </button>
                <button class="btn btn-success" type="submit">
                    Agregar
                </button>
            </div>
        </div>
        {{Form::Close()}}
    </div>
</div>
