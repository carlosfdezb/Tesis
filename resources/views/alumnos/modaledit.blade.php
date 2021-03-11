<div class="modal fade bd-example-modal-lg" id="modaledit-{{$alumno->id}}" role="dialog">
<div class="modal-dialog">
{!!Form::model($alumno,['method'=>'PATCH','route'=>['alumnos.update',$alumno->id]])!!}
    {{ csrf_field() }}
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
      <h4 class="modal-title" align="center">Modificar datos de {{ $alumno->primer_nombre.' '.$alumno->apellido_paterno }}</h4>
      

    </div>
    <div class="modal-body">
      
        <div class="box-body">
              <input type="hidden" class="form-control" name="id" value="{{ $alumno->id}}">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombres</label>

                  <input type="text" class="form-control" name="primer_nombre" placeholder="Primer nombre" value="{{ $alumno->primer_nombre}}" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="segundo_nombre" placeholder="Segundo nombre" value="{{ $alumno->segundo_nombre}}" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Apellidos</label>
                  <input type="text" class="form-control" name="apellido_paterno" placeholder="Apellido paterno" value="{{ $alumno->apellido_paterno}}" required>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="apellido_materno" placeholder="Apellido materno" value="{{ $alumno->apellido_materno}}" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Rut</label>
                  <input type="text" class="form-control" name="rut" placeholder="Rut" value="{{ $alumno->rut}}" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <input type="email" class="form-control" name="correo" placeholder="Correo electrónico" value="{{ $alumno->correo}}" required>
                </div>
           
               
              </div>
   
   </div>       
            
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-social btn-warning" type="submit">
                    <i class="fa fa-floppy-o"></i>Modificar
                </button>
      </div>
  </div>
  {{Form::Close()}}
</div> 

</div>



