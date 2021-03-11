<div class="modal fade bd-example-modal-lg" id="subir_archivo" role="dialog">
<div class="modal-dialog">
    {{!!Form::open(['url'=>'documentos_institucionales/index/subir_archivo','method'=>'put', 'files'=>'true'])!!}
    {{ csrf_field() }}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h3 class="modal-title" align="center">Nuevo Documento</h3> 
            </div>
                 <div class="modal-body">
                     <div class="form-group">

                        <label for ="">Título</label>
                        <input type="text" class="form-control" name="titulo_documento" placeholder="Ej. Reglamento Interno" required="true">

                        <label for="">Tipo de Documento</label>
                        <select class="form-control" name="tipo">
                            <option value="">--Seleccione--</option>
                            <option value="Conducto">Conducto</option>
                            <option value="Documento">Documento</option>
                            <option value="Lista de Útiles">Lista de Útiles</option>
                            <option value="Protocolo">Protocolo</option>
                            <option value="Reglamento">Reglamento</option>
                        </select>

                        <label for ="">Descripción</label>
                        <input class="form-control" name="descripcion" placeholder="Documentación 2020">
                        <div class="form-group has-warning">
                        <span class="help-block"><i class="fa fa-exclamation-circle"></i> Si no desea agregar descripción, omita este campo</span> 
                        </div>

                        <label for ="">Documento</label>
                        <input type="file" name="documentos" class="form-control" required="true">

                     </div>
                 </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-social bg-green" type="submit">
                    <i class="fa fa-cloud-upload"></i>Agregar
                </button>
            </div>
        </div>
    </div>
    {{Form::Close()}}
</div>  
</div>