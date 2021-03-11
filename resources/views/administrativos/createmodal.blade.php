<div class="modal fade bd-example-modal-lg" id="create" role="dialog">
<div class="modal-dialog">
	{{!!Form::open(['url'=>'administrativos','method'=>'POST' , 'name'=> 'FormularioAdministrativoCreate'])!!}
	{{ csrf_field() }}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"  
				aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h3 class="modal-title" align="center">Nuevo Administrativo</h3> 
			</div>
			     <div class="modal-body">

			<label for ="">Nombres</label> 

            <div class="form-group"> 
		    <input type="text" class="form-control" name="primer_nombre" placeholder="Primer nombre" required="true">
		    </div>

		    <div class="form-group"> 
		    <input type="text" class="form-control" name="segundo_nombre" placeholder="Segundo nombre" required="true">
 			</div>

 			<label for ="">Apellidos </label>

 			<div class="form-group"> 
		    <input type="text" class="form-control" name="apellido_paterno" placeholder="Apellido Paterno" required="true">
			</div>

			<div class="form-group">	
		    <input type="text" class="form-control" name="apellido_materno" placeholder="Apellido Materno" required="true">
			</div>

		   	<label for ="">Rut</label>
		   	<div class="form-group">
		    <input type="text" class="form-control" name="rut" placeholder="11111111-1" required="true">
			</div>

		    <label for ="">Correo</label>

		    <div class="form-group">
		    <input type="email" class="form-control" name="correo" placeholder="Ejemplo@correo.com" required="true" >
			</div>

			<label for ="">Cargo </label>

		    <div class="form-group">
		    	<select name="cargo" required="true" class="form-control" type="text">
		    		<option value="">- Seleccione Cargo -</option>
  					<option value="Coordinador">Coordinador</option> 
					<option value="Contador">Contador</option>
					<option value="Tesorero">Tesorero</option>
					<option value="Secretaria">Secretaria</option>
					<option value="Inspector">Inspector</option>
					<option value="Inspector General">Inspector General</option>
					<option value="Jefe UTP">Jefe UTP</option>
					<option value="ViceRector">ViceRector</option>
					<option value="Rector">Rector</option>
				</select>
		    </div> 
			     </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button class="btn btn-social bg-green" type="submit">
                    <i class="fa fa-floppy-o"></i>Agregar
                </button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>  
</div>  

