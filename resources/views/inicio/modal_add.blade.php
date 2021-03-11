<div class="modal fade bd-example-modal-lg" id="modal_add" role="dialog">
    <div class="modal-dialog">
        {!!Form::open(['url'=>'inicio','method'=>'POST','name'=> 'FormularioNoticiasCreate', 'files'=>'true'])!!}
  {{csrf_field()}}
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h4 class="modal-title" align="center">
                    Agregar nueva noticia
                </h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Títular
                        </label>
                        <input class="form-control" name="titulo" placeholder="Ingrese titular de noticia" type="text" autocomplete="off" required>
                        </input>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Descripción
                        </label>
                
                        <textarea class="form-control" cols="5" rows="10" type="text" name="descripcion" style="max-width: 100%;" placeholder="Ingrese descripción de noticia" autocomplete="off"></textarea> 
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Imagen
                        </label>
                        <input class="form-control" name="imagen" type="file">
                        </input>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Url
                        </label>
                        <input class="form-control" name="url" placeholder="Ingrese url de la noticia original" type="text" autocomplete="off">
                        </input>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">
                            Tipo de noticia
                        </label>
                        <select class="form-control" name="tipo">
                            <option value="Principal">
                                Principal
                            </option>
                            <option value="Lateral">
                                Lateral
                            </option>
                        </select>
                          
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