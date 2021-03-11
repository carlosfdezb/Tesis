<div class="modal fade bd-example-modal-lg" id="actualizar-archivo-{{$documento->id}}" role="dialog">
<div class="modal-dialog">
	{!!Form::model($documento,['method'=>'put','files'=>'true','route'=>['modulo_materiales.actualizar_archivo',$curso->id,$asignatura->id,$documento->id]])!!}
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
				     	<div type="text" class="form-group">
				     		<input name="titulo_documento" class="form-control" value="{{$documento->titulo}}">				     			
				     	</div>

				     	<label for ="">Descripción</label>
				     	<div type="text" class="form-group">
				     		<textarea class="form-control" name="descripcion" cols="5" rows="10" style="max-width: 100%;">{{$documento->descripcion}}</textarea>	     			
				     	</div>

				     	<label for ="">Documento a actualizar </label>
				     	<div type="text" class="form-group">
				     		<div class="form-control">
				     			{{$documento->archivo}}
				     		</div>

				     	</div>

					    <label for ="">Nuevo Documento</label>
					    <div class="form-group">
					    <input type="file" name="documentos" class="form-control">
					      <div class="form-group has-warning">
					    	<span class="help-block"><i class="fa fa-exclamation-circle"></i> Este documento reemplazará al que ya está en el sistema, si no desea actualizar el documento omita este paso.</span>
					    	</div>
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