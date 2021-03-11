<div class="modal fade bd-example-modal-lg" id="modalcreate" role="dialog">
    <div class="modal-dialog">
        {!!Form::model($certificados,['method'=>'GET','route'=>['certificado.generarCertificado',$certificados->first()->id]])!!}
    {{ csrf_field() }}
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                 <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h4 class="modal-title" align="center">
                    Generar nuevo certificado
                </h4>
            </div>
            <div class="modal-body">
                <div class="box-body">
                    
                        <div class="form-group">
                            <label for="exampleInputEmail1">
                                Rut
                            </label>
                            <input class="form-control" name="rut" type="text" placeholder="Digite rut de alumno"  autocomplete="off" required>
                            </input>
                             </div>
                            <div class="form-group">
                                    <label for="exampleInputEmail1">
                                        Tipo
                                    </label>
                  
                                        <select class="form-control" name="tipo" required>
                                            <option value="">-- Seleccione --</option>
                                            <option value="1">Alumno Regular</option>
                                            <option value="2">Concentración de Notas</option>
                                          </select>
                       
                                </div>
                            <div class="form-group">
                                    <label for="exampleInputEmail1">
                                        Semestre
                                    </label>
                          
                                        <select class="form-control" name="semestre" required>
                                            <option value="">-- Seleccione --</option>
                                            <option value="Primer">Primero</option>
                                            <option value="Segundo">Segundo</option>
                                          </select>
                            
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">
                                        Tipo impresión
                                    </label>
      
                                        <select class="form-control" name="color" required>
                                            <option value="">-- Seleccione --</option>
                                            <option value="normal">Color</option>
                                            <option value="blancoynegro">Blanco y negro</option>
                                          </select>
                                
                                </div>
                       
                        
                    </input>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-default" data-dismiss="modal" type="button">
                    Cerrar
                </button>
                <button class="btn btn-social btn-success" type="submit">
                    <i class="fa fa-floppy-o"></i>Generar
                </button>
            </div>
        </div>
        {{Form::Close()}}
    </div>
</div>
