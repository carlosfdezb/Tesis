@extends('layouts.index')

@section('title', 'Profesores')  

@section('content')
	
<!-- INDEX MATERIALES -->
<section class="content-header">
    <h1>
        Listado de Profesores
        <small>
            CEISP
        </small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/home">
                <i class="fa fa-home"> 
                </i>
                Inicio
            </a>
        </li>
        <li class="active">
            Profesores
        </li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            {{ Form::open(['url' => '/modulo_materiales/administrador/index', 'method' => 'GET']) }}
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
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="scope_nombre" placeholder="Nombre ">
                            </div>

                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="scope_rut" placeholder="Rut ">
                            </div>

                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="scope_correo" placeholder="Correo">
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
                        Todos los profesores del sistema
                    </h3>
                </div>
                <br>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive no-padding">
                        <div class="col-md-12">
                            <table class="table table-bordered table-striped dataTable" id="my-table">
                                <thead>
                                    <th width="30%">
                                        Nombre Profesor
                                    </th>
                                    <th width="30%">
                                        Rut Profesor
                                    </th>
                                    <th width="30%">
                                        Correo
                                    </th>
                                    <th width="10%">
                                        Carpeta
                                    </th>
                                </thead>
                              	@foreach($profesores as $profesor)
                                <tr>
                                    <td>
                                        {{$profesor->apellido_paterno.' '.$profesor->apellido_materno.' , '.$profesor->primer_nombre.' '.$profesor->segundo_nombre}}
                                    </td>
                                    <td>
                                        {{$profesor->rut}}
                                    </td>
                                    <td>
                                        {{$profesor->correo}}
                                    </td>
                                   <!-- botones  -->
                                    <td>
                                        <div class="btn-group">
                                            <!-- principal  -->
                                            <a class="btn btn-flat" style="width: : 40px; background-color: #EFEFEF ; color: #333" type="button" href="{{ route('modulo_materiales.administrador.index_profesor', ['id' => $profesor->id]) }}">
                                                <i class="fa fa-folder-open">
                                                 </i>
                                             </a>
                                        </div>
                                    </td>
                                    <!-- .botones  -->

                                    <!-- include  -->
                                    
                                    <!-- .include  -->
                                </tr>
                                @endforeach
                               
                            </table>

                        </div>
                    </div>

                    <div class="box-footer clearfix">
                        <ul class="pagination pagination-sm no-margin pull-left">
                        </ul>
                        <ul class="pagination pagination-sm no-margin pull-right">
                            {{ $profesores->render() }}
                        </ul>
                    </div>
                </br>
            </div>
        </div>
    </div>













</section>
@endsection