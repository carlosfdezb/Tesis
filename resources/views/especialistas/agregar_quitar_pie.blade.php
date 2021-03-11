<div class="modal fade bd-example-modal-lg" id="agregar_a_pie-{{$especialista->id}}" role="dialog">
	<div class="modal-dialog">
		{!!Form::model($especialista,['method'=>'put', 'route'=>['agregar_quitar_pie',$especialista->id]])!!}
		{{ csrf_field() }}
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"  
					aria-label="Close">
	                    <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
	                </button>
	                @if(DB::table('equipo_pies')->where('id_especialista', $especialista->id)->where('estado','Activo')->count() > 0)
	                <h3 class="modal-title" align="center">Quitar de PIE</h3>
	                @else
	                <h3 class="modal-title text-blue" align="center">Agregar a PIE</h3>
	                @endif
				</div>
				     <div class="modal-body">
				     	@if(DB::table('equipo_pies')->where('id_especialista', $especialista->id)->where('estado','Activo')->count() > 0)

				     		<div class="form-group has-warning">
            					<span class="help-block" style="text-align: center;">
              						<i class="fa fa-exclamation-circle"></i> ¿Está seguro que desea quitar de PIE a {{$especialista->primer_nombre.' '.$especialista->apellido_paterno}}?
            					</span>
          					</div>
          						@if($especialista->equipo_pie->alumno_pie->where('estado','Activo')->first())
          							<div class="form-group has-error">
            						<span class="help-block" style="text-align: center;">
              							<i class="fa fa-warning"></i> Especialista tiene alumnos activos asociados, por favor asigne estos alumnos a otro especialista <i class="fa fa-warning"></i>
            						</span>
          						</div>
          						@endif
				     	@else  	
				     		<div class="form-group">
            					<span class="help-block" style="text-align: center;">
              						<i class="fa fa-exclamation-circle"></i> ¿Está seguro que desea agregar a PIE a {{$especialista->primer_nombre.' '.$especialista->apellido_paterno}}?
            					</span>
          					</div>
				     	@endif
				     </div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
					@if(DB::table('equipo_pies')->where('id_especialista', $especialista->id)->where('estado','Activo')->count() > 0)
						@if($especialista->equipo_pie->alumno_pie->where('estado','Activo')->first())
            			<button class="btn btn-social bg-yellow" type="submit" disabled="true">
              				<i class="fa fa-close"></i>Quitar
            			</button>
            			@else
            			<button class="btn btn-social bg-yellow" type="submit">
              				<i class="fa fa-close"></i>Quitar
            			</button>
            			@endif
            		@else
            		<button class="btn btn-social bg-blue" type="submit">
              			<i class="fa fa-save"></i>Agregar
            		</button>
            		@endif
				</div>
			</div>
		</div>
		{{Form::Close()}}
	</div>  
</div>  