  <div class="modal fade bd-example-modal-lg" id="eliminar-archivo-{{$documento->id}}" role="dialog">
<div class="modal-dialog">
	{!!Form::model($documento,['method'=>'POST','files'=>'true','route'=>['documentos_institucionales.eliminar_archivo',$documento->id]])!!}
	{{ csrf_field() }}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"  
				aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                	<h3 class="modal-title" align="center">Eliminar Documento</h3>
			</div>
			     <div class="modal-body">
				     <div class="form-group">

				     	<label for ="">Documento a Eliminar </label>
				     	<div class="form-group">
				     		<div class="form-control">
				     			{{$documento->archivo}}
				     		</div>
				     	</div>

				     	<label for ="">Tipo de Documento</label>
				     	<div class="form-control">
				     		{{$documento->tipo}}
				     	</div>

				     	<label for ="">Descripción</label>
				     	<div class="form-control">
				     		{{$documento->descripcion}}
				     	</div>

				    	<div class="form-group has-error">
					    	<div class="help-block"><i class="fa fa-exclamation-circle"></i> ¿Está seguro que desea eliminar este documento institucional?</div>
					    </div>

	                 </div>
			     </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button class="btn btn-social bg-red" type="submit">
                    <i class="fa fa-trash"></i>Eliminar
                </button>
			</div>
		</div>
	</div>
	{{Form::Close()}}
</div>  
</div>   