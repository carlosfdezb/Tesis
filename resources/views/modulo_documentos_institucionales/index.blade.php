@extends('layouts.index')

@section('title', 'Documentos Institucionales')  

@section('content')
<!-- INDEX ADMINISTRATIVOS -->
<section class="content-header">
    <h1>
        Listado de Documentos
        <small>
            CEISP
        </small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{url('/inicio')}}">
                <i class="fa fa-home"> 
                </i>
                Inicio
            </a>
        </li>
        <li class="active">
            Documentos Institucionales
        </li>
    </ol>
</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            {{ Form::open(['url' => 'documentos_institucionales', 'method' => 'GET']) }}
            @include('alerts.success')
            @include('alerts.warning')
            @include('alerts.danger')
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="box-title">
                                <a aria-expanded="true" class="" data-parent="#accordion" data-toggle="collapse" href="#collapseOne">
                                    Buscador 
                                </a>     
                            </h4>
                            
                            <button type="submit" class="btn btn-default pull-right">
                                <span class="glyphicon glyphicon-search"></span>
                            </button>
                            
                        </div>
                    </div>
                </div>
                <div aria-expanded="true" class="panel-collapse collapse in" id="collapseOne" style="">
                    <div class="box-body">
                        <div class="box-tools">
                            <div class="row" >       
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="scope_titulo" placeholder="Título del documento">
                            </div>

                            <div class="form-group col-md-6">
                                <select class="form-control" name="scope_tipo">
                                <option value="">--Tipo de documento--</option>
                                <option value="Conducto">Conducto</option>
                                <option value="Lista de Útiles">Lista de Útiles</option>
                                <option value="Protocolo">Protocolo</option>
                                <option value="Reglamento">Reglamento</option>
                                </select>
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
        <!-- /.col -->
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Documentos Institucionales
                    </h3>
                </div>
                <br>
                <!-- /.box-header -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                                <!-- <ul class="nav nav-tabs">

                                    <li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>
                                        <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                            Dropdown <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Action</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Another action</a></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Something else here</a></li>
                                            <li role="presentation" class="divider"></li>
                                            <li role="presentation"><a role="menuitem" tabindex="-1" href="#">Separated link</a></li>
                                        </ul>
                                    </li>
                                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
                                </ul>--> 
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <table aria-describedby="example1_info" class="table table-bordered table-striped dataTable" id="example1" role="grid">
                                            <thead>
                                                <th width="20%">
                                                    Título
                                                </th>
                                                <th width="20%">
                                                    Tipo
                                                </th>
                                                <th width="25%">
                                                    Documento
                                                </th>
                                                <th width="25%">
                                                    Descripción
                                                </th>

                                                <th width="10%">
                                                    Opciones
                                                </th>
                                            </thead>
                                            @foreach($documentos as $documento)
                                            <tr>
                                                <td>
                                                    {{$documento->titulo}}
                                                </td>
                                                <td>
                                                    {{$documento->tipo}}
                                                </td>
                                                <td>
                                                    {{$documento->archivo}}
                                                </td>
                                                <td>
                                                    {{$documento->descripcion}}
                                                </td>
                                                <!-- botones  -->
                                                <td>
                                                    <div class="btn-group">
                                                        <!-- principal  -->
                                                        <a class="btn btn-flat" style="width: 40px; background-color: #EFEFEF" type="button" href="/documentos_institucionales/index/{{$documento->archivo}}">
                                                            <i class="fa fa-download">
                                                            </i>
                                                        </a>
                                                        @if(auth()->user()->rol == '5')
                                                        <!-- dropdown  -->
                                                        <button class="btn btn-flat dropdown-toggle" data-toggle="dropdown" style="height: 34px;" type="button">
                                                            <span class="caret">
                                                            </span>
                                                            <span class="sr-only">
                                                                Toggle Dropdown
                                                            </span>
                                                        </button>
                                                        <!-- botones del dropdown, donde cada 'li' es un boton  -->
                                                        <ul class="dropdown-menu dropdown-menu-right " role="menu">
                                                            <li>
                                                                <a data-target="#actualizar-archivo-{{$documento->id}}" data-toggle="modal" href="#">
                                                                    <i class="fa fa-edit">
                                                                    </i>
                                                                    Modificar
                                                                </a>
                                                                <a data-target="#eliminar-archivo-{{$documento->id}}" data-toggle="modal" href="#">
                                                                    <i class="fa fa-trash">
                                                                    </i>
                                                                    Eliminar
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        @endif
                                                    </div>
                                                </td>
                                                <!-- botones  -->
                                               @include('modulo_documentos_institucionales.subir_archivo')
                                               @include('modulo_documentos_institucionales.actualizar_archivo')
                                               @include('modulo_documentos_institucionales.eliminar_archivo')
                                            </tr>
                                            @endforeach
                                        </table>
                                       
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">
                                        
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_3">
                
                                    </div> 
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                                @if(auth()->user()->rol == '5' or auth()->user()->rol == '0' or auth()->user()->rol == '2' ) 
                                <div class="box-footer clearfix">
                                    <ul class="pagination pagination-sm no-margin pull-left">
                                        
                                        <a class="btn btn-app" data-target="#subir_archivo" data-toggle="modal">
                                            <i class="fa fa-cloud-upload">
                                            </i>
                                            Documento
                                        </a>
                                        
                                    </ul>
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        {{$documentos->render()}}
                                    </ul>
                                </div>
                                @endif
                            </div>
                            <!-- nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </div>
    </div>
</section>




<div class="modal fade bd-example-modal-lg" id="subir_archivo" role="dialog">
<div class="modal-dialog">
    {{!!Form::open(['url'=>'documentos_institucionales/index/subir_archivo','method'=>'put', 'files'=>'true'])!!}
    {{ csrf_field() }}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h3 class="modal-title" align="center">Nuevo Documento</h3> 
            </div>
                 <div class="modal-body">
                     <div class="form-group">

                        <label for ="">Título</label>
                        <input type="text" class="form-control" name="titulo_documento" placeholder="Ej. Reglamento Interno" required="true">

                        <label for="">Tipo de Documento</label>
                        <select class="form-control" required="true" name="tipo">
                            <option value="">--Seleccione--</option>
                            <option value="Conducto">Conducto</option>
                            <option value="Lista de Útiles">Lista de Útiles</option>
                            <option value="Protocolo">Protocolo</option>
                            <option value="Reglamento">Reglamento</option>
                        </select>

                        <label for ="">Descripción</label>
                        <input class="form-control" name="descripcion" placeholder="Ej.Reglamento 2020">
                        <div class="form-group has-warning">
                        <span class="help-block"><i class="fa fa-exclamation-circle"></i> Si no desea agregar descripción, omita este campo</span> 
                        </div>

                        <label for ="">Documento</label>
                        <input type="file" name="documentos" class="form-control" required="true">

                     </div>
                 </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button class="btn btn-social bg-green" type="submit">
                    <i class="fa fa-cloud-upload"></i>Agregar
                </button>
            </div>
        </div>
    </div>
    {{Form::Close()}}
</div>  
</div>





@endsection
