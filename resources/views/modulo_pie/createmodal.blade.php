<div class="modal fade bd-example-modal-lg" id="create" role="dialog">
<div class="modal-dialog">
	{{!!Form::open(['url'=>'alumno_pies','method'=>'POST' , 'name'=> 'FormularioAlumnoPieCreate'])!!}
	{{ csrf_field() }}
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal"  
				aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h3 class="modal-title" align="center">Nuevo Alumno Pie</h3> 
			</div>
			     <div class="modal-body">
				     <div class="form-group"> 

		    <label for ="">Primer Nombre</label>
		    <input type="text" class="form-control" name="primer_nombre" placeholder="Primer nombre">

		    <label for ="">Segundo Nombre</label>
		    <input type="text" class="form-control" name="segundo_nombre" placeholder="Segundo nombre">


	                 </div>
			     </div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<button type="submit" class="btn btn-primary">Confirmar</button>
			</div>
		</div>
	</div>
	{{Form::Close()}}

</div>  
</div>  