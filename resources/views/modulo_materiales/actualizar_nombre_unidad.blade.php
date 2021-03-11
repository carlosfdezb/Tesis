<div class="modal fade bd-example-modal-lg" id="actualizar-nombre-unidad-{{$titulo->id}}" role="dialog">
<div class="modal-dialog">
	{!!Form::model($titulo,['method'=>'put','route'=>['modulo_materiales.actualizar_nombre_unidad',$curso->id,$asignatura->id,$titulo->id]])!!}
	{{ csrf_field() }}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"  
				aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h3 class="modal-title" align="center">Actualizar Título</h3> 
			</div>
			     <div class="modal-body">
				     <div class="form-group">

					     	<label for ="">Título</label>
					     	<div type="text" class="form-group">
					     		<input name="titulo_unidad" class="form-control" value="{{$titulo->titulo_unidad}}">
					     		<div class="form-group has-warning">
						    	<span class="help-block"><i class="fa fa-exclamation-circle"></i> Ingrese el nuevo nombre de la unidad
						    	</span>
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