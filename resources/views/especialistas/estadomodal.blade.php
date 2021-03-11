<div class="modal fade bd-example-modal-lg" id="estado-modal-{{$especialista->id}}" role="dialog">
	<div class="modal-dialog">
	 {!!Form::model($especialista,['method'=>'put', 'route'=>['estado',$especialista->id]])!!}
	 {{ csrf_field() }}
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal"  
	        aria-label="Close">
	                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
	        </button>
	            @if($especialista->estado == 'Activo')
                <h3 class="modal-title" align="center"> Deshabilitar {{$especialista->primer_nombre.' '.$especialista->apellido_paterno}}</h3>
                @else
                <h3 class="modal-title" align="center"> Habilitar {{$especialista->primer_nombre.' '.$especialista->apellido_paterno}}
                @endif 
	      </div>
	      <div class="modal-body">

	        @if($especialista->estado == 'Activo')

				     		<div class="form-group has-warning">
            					<span class="help-block" style="text-align: center;">
              						<i class="fa fa-exclamation-circle"></i> ¿Está seguro que desea deshabilitar a {{$especialista->primer_nombre.' '.$especialista->apellido_paterno}}?
            					</span>
          					</div>
          					@if(DB::table('equipo_pies')->where('id_especialista', $especialista->id)->count() > 0)
          						@if($especialista->equipo_pie->alumno_pie->where('estado','Activo')->first())
          							<div class="form-group has-error">
            						<span class="help-block" style="text-align: center;">
              							<i class="fa fa-warning"></i> Especialista tiene alumnos activos asociados, por favor asigne estos alumnos a otro especialista <i class="fa fa-warning"></i>
            						</span>
          						</div>
          						@endif
          					@endif
				     	@else  	
				     		<div class="form-group has-warning">
            					<span class="help-block" style="text-align: center;">
              						<i class="fa fa-exclamation-circle"></i> ¿Está seguro que desea habilitar a {{$especialista->primer_nombre.' '.$especialista->apellido_paterno}}?
            					</span>
          					</div>
				     	@endif       
	      </div>
	      <div class="modal-footer">

	        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
	        @if($especialista->estado == 'Activo')
				    @if(DB::table('equipo_pies')->where('id_especialista', $especialista->id)->count() > 0)
					      @if($especialista->equipo_pie->alumno_pie->where('estado','Activo')->first())

                @else
                  <button class="btn btn-social bg-yellow" type="submit">
                  <i class="fa fa-close"></i>Deshabilitar
                  </button>
            		@endif
            @else
              <button class="btn btn-social bg-yellow" type="submit">
                <i class="fa fa-close"></i>Deshabilitar
              </button>
            @endif
          @else
            	<button class="btn btn-social bg-yellow" type="submit">
              			<i class="fa fa-check"></i>Habilitar
            	</button>
          @endif

	      </div>
	    </div>
	  </div>
	  {{Form::Close()}}
	</div>  
</div>  