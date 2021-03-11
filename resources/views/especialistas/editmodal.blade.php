<div class="modal fade bd-example-modal-lg" id="modal-edit-{{$especialista->id}}" role="dialog">
<div class="modal-dialog">
 {!!Form::model($especialista,['method'=>'PATCH', 'route'=>['especialistas.update',$especialista->id]])!!}
  {{ csrf_field() }}
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"  
        aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h3 class="modal-title text-yellow" align="center">Modificar {{$especialista->primer_nombre.' '.$especialista->apellido_paterno}}</h3> 
      </div>
      <div class="modal-body">
              

        <label for ="">Nombres</label>

        <div class="form-group">
          <input value="{{$especialista->primer_nombre}}" type="text" class="form-control" name="primer_nombre" placeholder="Primer nombre" required="true">
        </div>

        <div class="form-group">
          <input value="{{$especialista->segundo_nombre}}" type="text" class="form-control" name="segundo_nombre" placeholder="Segundo nombre" required="true">
        </div>

        <label for ="">Apellidos</label>

        <div class="form-group">
          <input value="{{$especialista->apellido_paterno}}" type="text" class="form-control" name="apellido_paterno" placeholder="Apellido Paterno" required="true">
        </div>

        <div class="form-group">
          <input value="{{$especialista->apellido_materno}}" type="text" class="form-control" name="apellido_materno" placeholder="Apellido Materno" required="true">
        </div>

        <label for ="">Rut</label>

        <div class="form-group">
          <input value="{{$especialista->rut}}" type="text" class="form-control" name="rut" placeholder="rut" required="true">
        </div>

        <label for ="">Correo</label>

        <div class="form-group">
          <input value="{{$especialista->correo}}" type="email" class="form-control" name="correo" placeholder="Correo Electrónico" required="true">
        </div>

        <label for ="">Especialidad</label>

        <div class="form-group">
          <input value="{{$especialista->especialidad}}" type="text" class="form-control" name="especialidad" placeholder="Especialidad" required="true">
        </div>

        <label for ="">N° Registro Secreduc</label>

        <div class="form-group">
        <input value="{{$especialista->numero_secreduc}}" type="text" class="form-control" name="numero_secreduc" placeholder="">
        <div class="form-group has-warning">
        <span class="help-block"><i class="fa fa-exclamation-circle"></i> Si no cuenta con un número de registro omita este campo</span> 
        </div>
       </div>

      

                   
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-social bg-yellow" type="submit">
              <i class="fa fa-edit"></i>Modificar
        </button>
      </div>
    </div>
  </div>
  {{Form::Close()}}

</div>  
</div>  