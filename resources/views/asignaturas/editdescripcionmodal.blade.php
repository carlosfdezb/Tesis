<div class="modal fade bd-example-modal-lg" id="editdescripcionmodal-{{$descripciones->id}}" role="dialog">
<div class="modal-dialog">
{!!Form::model($descripciones,['method'=>'POST','route'=>['asignaturas.editDescripcion',$descripciones->id]])!!}
    {{ csrf_field() }}
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
      <h3 class="modal-title" align="center">Modificar descripción de {{$descripciones->numero}}° nota</h3>
      

    </div>
    <div class="modal-body">
      
        <div class="box-body">
              <input type="hidden" class="form-control" name="id" value="{{$descripciones->id}}">
                <div class="form-group">
                  <label for="exampleInputEmail1">Descripción actual</label>

                  <input type="text" class="form-control" name="descripcion" placeholder="Descripción" value="{{$descripciones->descripcion}}" required>
                </div>
                
           
               
              </div>
   
   </div>       
            
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button class="btn btn-social bg-yellow" type="submit">
                    <i class="fa fa-floppy-o"></i>Guardar
                </button>
      </div>
  </div>
  {{Form::Close()}}
</div> 

</div>



