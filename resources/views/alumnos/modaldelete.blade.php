<div class="modal fade bd-example-modal-lg" id="modaldelete-{{$alumno->id}}" role="dialog">
<div class="modal-dialog">
{!!Form::model($alumno,['method'=>'GET','route'=>['alumnos.delete',$alumno->id]])!!}
    {{ csrf_field() }}
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
      <h4 class="modal-title" align="center">Está seguro de eliminar al siguiente alumno?</h4>
      

    </div>
    <div class="modal-body">
      
        <div class="box-body">
              <input type="hidden" class="form-control" name="id" value="{{ $alumno->id}}">
                <div class="form-group">
                  <label for="exampleInputEmail1">Nombre</label>

                  <div type="text" class="form-control" name="primer_nombre" >{{ $alumno->primer_nombre.' '.$alumno->apellido_paterno}}</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Rut</label>
                  <div type="text" class="form-control" name="rut">{{ $alumno->rut}}</div>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email</label>
                  <div type="email" class="form-control" name="correo">{{$alumno->correo}}</div>
                </div>
           
               
              </div>
   
   </div>       
            
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-social btn-danger" disabled="" type="submit">
                    <i class="fa fa-trash"></i>Eliminar
                </button>
      </div>
  </div>
  {{Form::Close()}}
</div> 

</div>

