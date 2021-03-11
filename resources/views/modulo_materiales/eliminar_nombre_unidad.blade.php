<div class="modal fade bd-example-modal-lg" id="eliminar-nombre-unidad-{{$titulo->id}}" role="dialog">
<div class="modal-dialog">
	{!!Form::model($titulo,['method'=>'POST','route'=>['modulo_materiales.eliminar_nombre_unidad',$curso->id,$asignatura->id,$titulo->id]])!!}
	{{ csrf_field() }}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"  
				aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h3 class="modal-title" align="center">Eliminar Título</h3> 
			</div>
			     <div class="modal-body">
				     <div class="form-group">


						@if(DB::table('material_profesors')->where('id_titulo_unidad',$titulo->id)->count() > 0)
				     		<div class="form-group has-warning">
					    		<span class="help-block"><i class="fa fa-exclamation-circle"></i> Antes de eliminar la unidad debe eliminar todos los documentos asociados a esa unidad
					    		</span>
					    	</div>
				     	@else
					     	<label for ="">Título</label>
					     	<div type="text" class="form-group">
					     		<div class="form-control">{{$titulo->titulo_unidad}}</div>
					     		<div class="form-group has-error">
						    	<span class="help-block"><i class="fa fa-exclamation-circle"></i> Esta sección será eliminada del módulo,¿Está seguro que desea continuar?.
						    	</span>
						    	</div>				     			
					     	</div>
				     	@endif

	                 </div>
			     </div>
			<div class="modal-footer">
				@if(DB::table('material_profesors')->where('id_titulo_unidad',$titulo->id)->count() > 0)
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				@else
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					<button class="btn btn-social bg-red" type="submit">
	                    <i class="fa fa-trash"></i>Eliminar
	                </button>
				@endif
			</div>
		</div>
	</div>
	{{Form::Close()}}
</div>  
</div>   