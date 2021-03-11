<div class="modal fade bd-example-modal-lg" id="eliminar-archivo-{{$documento->id}}" role="dialog">
<div class="modal-dialog">
	{!!Form::model($documento,['method'=>'POST','files'=>'true','route'=>['modulo_materiales.eliminar_archivo',$curso->id,$asignatura->id,$documento->id]])!!}
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

				     	<label for ="">Título</label>
				     	<div type="text" class="form-group">
				     		<div class="form-control" >{{$documento->titulo}}</div>				     			
				     	</div>

				     	<label for ="">Descripción</label>
				     	<div type="text" class="form-group">
				     		<textarea class="form-control" cols="5" rows="10" readonly="true" style="max-width: 100%; background-color: white;">{{$documento->descripcion}}</textarea>		
				     	</div>

				     	<label for ="">Documento a eliminar</label>
				     	<div type="text" class="form-group">
				     		<div class="form-control">
				     			{{$documento->archivo}}
				     		</div>
				     	</div>

				         <div class="form-group has-error">
					    	<span class="help-block"><i class="fa fa-exclamation-circle"></i> Este documento será eliminado del sistema, ¿Está seguro que desea continuar?.</span> 
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