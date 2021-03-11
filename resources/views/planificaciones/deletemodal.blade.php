  <div class="modal fade bd-example-modal-lg" id="modal-delete-{{$planificacion->id}}" role="dialog">
<div class="modal-dialog">
	{!!Form::model($planificacion,['method'=>'POST','files'=>'true','route'=>['planificaciones.eliminar_archivo',$planificacion->id]])!!}
	{{ csrf_field() }}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"  
				aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                	<h3 class="modal-title" align="center">Eliminar Planificación</h3>
			</div>
			     <div class="modal-body">
				     <div class="form-group">

				     	@if(auth()->user()->rol == '5')

				     		<label for ="">Nombre profesor </label>
					     	<div class="form-group">
					     		<div class="form-control">
					     			{{$planificacion->profesor->primer_nombre.' '.$planificacion->profesor->segundo_nombre.' '.$planificacion->profesor->apellido_paterno.' '.$planificacion->profesor->apellido_materno}}
					     		</div>
					     	</div>

					     	<label for ="">Rut profesor </label>
					     	<div class="form-group">
					     		<div class="form-control">
					     			{{$planificacion->profesor->rut}}
					     		</div>
					     	</div>
					    @endif


					     	<label for ="">Documento a eliminar </label>
					     	<div class="form-group">
					     		<div class="form-control">
					     			{{$planificacion->archivo}}
					     		</div>
					     	</div>

					     	<label for ="">Unidad </label>
					     	<div type="text" class="form-group">
					     		<div name="unidad" class="form-control">{{$planificacion->unidad}}</div>
					     	</div>

					    	<div class="form-group has-error">
						    	<div class="help-block"><i class="fa fa-exclamation-circle"></i> ¿Está seguro que desea eliminar esta planificación?</div> 
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