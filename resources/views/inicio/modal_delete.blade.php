<div class="modal fade bd-example-modal-lg" id="modal_delete-{{$principales->id}}" role="dialog">
<div class="modal-dialog">
{!!Form::model($principales,['method'=>'GET','route'=>['noticias.delete',$principales->id]])!!}
    {{ csrf_field() }}
  <!-- Modal content-->
  <div class="modal-content">
    <div class="modal-header">
      
      <button type="button" class="close" data-dismiss="modal"  
        aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>

    </div>
    <div class="modal-body">
      
        <h4 class="modal-title">¿Está seguro de eliminar la siguiente noticia?</h4>
   
   </div>       
            
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-danger">Eliminar</button>
      </div>
  </div>
  {{Form::Close()}}
</div> 

</div>
