 <div class="modal fade bd-example-modal-lg" id="actualizar-archivo-{{$documento->id}}" role="dialog">
<div class="modal-dialog">
	{!!Form::model($documento,['method'=>'put','files'=>'true','route'=>['documentos_institucionales.actualizar_archivo',$documento->id]])!!}
	{{ csrf_field() }}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"  
				aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h3 class="modal-title" align="center">Actualizar Documento</h3> 
			</div>
			     <div class="modal-body">
				     <div class="form-group">

						<label for ="">Título</label>
                        <input type="text" class="form-control" name="titulo_documento" placeholder="Ej. Reglamento Interno" required="true" value="{{$documento->titulo}}">

                        <label for="">Tipo de Documento</label>
                        <select class="form-control" required="true" name="tipo">
                            <option value="{{$documento->tipo}}">Actual : {{$documento->tipo}}</option>
                            <option value="Conducto">Conducto</option>
                            <option value="Lista de Útiles">Lista de Útiles</option>
                            <option value="Protocolo">Protocolo</option>
                            <option value="Reglamento">Reglamento</option>
                        </select>

                        <label for ="">Descripción</label>
                        <input class="form-control" name="descripcion" placeholder="Ej.Reglamento 2020" value="{{$documento->descripcion}}">
                        <div class="form-group has-warning">
                        	<span class="help-block"><i class="fa fa-exclamation-circle"></i> Si no desea agregar descripción, omita este campo</span> 
                        </div>

                        <label for ="">Documento Actual</label>
                        <div class="form-control" required="true">{{$documento->archivo}}</div>

                        <label for ="">Nuevo Documento</label>
                        <input type="file" name="documentos" class="form-control">
                        <div class="form-group has-warning">
                        	<span class="help-block"><i class="fa fa-exclamation-circle"></i> El nuevo documento ingresado reemplazará al que ya se encuentra en el sistema, si no desea reemplazarlo omita este campo</span> 
                        </div>

	                 </div>
			     </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button class="btn btn-social bg-yellow" type="submit">
                    <i class="fa fa-cloud-upload"></i>Actualizar
                </button>
			</div>
		</div>
	</div>
	{{Form::Close()}}
</div>  
</div>   