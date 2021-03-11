<div class="modal fade bd-example-modal-lg" id="modalcreate-{{$curso->id}}" role="dialog">
<div class="modal-dialog">
{!!Form::open(['url'=>'alumnos/create','method'=>'get','name'=> 'FormularioAlumnoCreate'])!!}
    {{ csrf_field() }}
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
      <h4 class="modal-title" align="center">Agregar alumno nuevo al  
        @if($curso->nivel=='Kinder')
          {{ $curso->nivel.' '.$curso->letra }}
        @else
          {{ $curso->nivel.'° '.$curso->grado.' '.$curso->letra }}
        @endif</h4>
      

    </div>
    <div class="modal-body">
      
        <div class="box-body">
          <input type="hidden" class="form-control" name="id_curso" value="{{ $curso->id}}">
              <div class="form-group">
                  <label for="exampleInputEmail1">Nombres</label>
                  <input type="text" class="form-control" name="primer_nombre" placeholder="Primer nombre" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="segundo_nombre" placeholder="Segundo nombre" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Apellidos</label>
                  <input type="text" class="form-control" name="apellido_paterno" placeholder="Apellido paterno" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="apellido_materno" placeholder="Apellido materno" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Rut</label>
                  <input type="text" class="form-control" name="rut" placeholder="Rut" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" name="correo" placeholder="Correo electrónico" required>
                </div>
           
               
              </div>
   
   </div>       
            
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
       <button class="btn btn-social btn-success" type="submit">
                    <i class="fa fa-floppy-o"></i>Agregar
                </button>
      </div>
  </div>
  {{Form::Close()}}
</div> 

</div>



