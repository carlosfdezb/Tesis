<div class="modal fade bd-example-modal-lg" id="modal-delete-{{$carpeta->id}}" role="dialog">
<div class="modal-dialog">
	{!!Form::model($carpeta,['method'=>'POST','files'=>'true','route'=>['modulo_pie.eliminar_archivo',$carpeta->id_alumno_pie,$carpeta->id]])!!}
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

				     	<label for ="">Documento a eliminar</label>
				     	<div type="text" class="form-group">
				     		<div class="form-control">
				     			{{$carpeta->archivo}}
				     		</div>
				     	</div>

						<label for ="">Tipo de Documento</label>
				        <div type="text" class="form-group">
				        	<div class="form-control">
				 				{{$carpeta->documento_pie->descripcion}}
				            </div>
				          </div>

				         <div class="form-group has-error">
				         	
					    	<span class="help-block"><i class="fa fa-exclamation-circle"></i> Este documento será eliminado del sistema</span> 
					    	
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