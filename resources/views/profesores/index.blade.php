@extends('layouts.index')

@section('title', 'Profesores')  

@section('content')
<!-- INDEX NOTAS -->
<section class="content-header">
    <h1>
        Listado de Profesores
        <small>
            CEISP
        </small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="{{ action('NoticiasController@index') }}">
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
    @include('alerts.success')
    @include('alerts.warning')
    @include('alerts.danger')
    <div class="row">
        <div class="col-md-12">
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <div class="row">
                        <div class="col-md-12">
                            {{ Form::open(['url' => '/profesores', 'method' => 'GET']) }}
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
                                <input type="text" class="form-control" name="scope_nombre" placeholder="Nombre y Apellido">
                            </div>

                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" name="scope_rut" placeholder="Rut">
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
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1" data-toggle="tab">Profesores Activos</a></li>
                    <li><a href="#tab_2" data-toggle="tab">Profesores Inactivos</a></li>
                </ul>
                 <!-- DETALLE CURSO -->
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1">
                        <div>
                    
                            <!-- /.box-header -->
                            <div class="col-md-12">
                                <div class="box-body table-responsive">
                                    <div class="scrollable">
                                        <table class="table table-bordered table-striped" style="font-size: 14px;">
                                            <tr>
                                                <th>
                                                    Nombre
                                                </th>
                                                <th>
                                                    Rut
                                                </th>
                                                <th>
                                                    Correo
                                                </th>
                                                <th>
                                                    Jefatura
                                                </th>
                                                <th style="width: 10px">
                                                    Asignaturas
                                                </th>

                                                <th style="width: 110px">
                                                    Más
                                                </th>
                                            </tr>
                                            @foreach($profesor as $profesores)
                                            <tr>
                                                <td>
                                                    {{ $profesores->apellido_paterno.' '.$profesores->apellido_materno.', '.$profesores->primer_nombre.' '.$profesores->segundo_nombre}}
                                                </td>
                                                <td>
                                                    {{ $profesores->rut }}
                                                </td>
                                                <td>
                                                    {{ $profesores->correo }}
                                                </td>
                                                @if(!is_null($profesores->curso))
                                                <td>
                                                    {{ $profesores->curso->nivel.'° '.$profesores->curso->grado.' '.$profesores->curso->letra}}
                                                </td>
                                                @else
                                                <td>
                                                    No
                                                </td>
                                                 @endif 
                                         @if(!is_null($profesores->asignaturas->first()))
                                                <td>
                                                    
                                                    @foreach($profesores->asignaturas->sortBy('nombre') as $asignatura)

                                                    {{ '- '.$asignatura->nombre.', '.$asignatura->pivot->nivel.'° '.$asignatura->pivot->grado.' '.$asignatura->pivot->letra }}
                                                    <br>
                                                        @endforeach
                                                    </br>
                                                </td>
                                                @else
                                                <td>
                                                    Ninguna
                                                </td>
                                                @endif
                                                <!-- botones  -->
                                                <td>
                                                    <div class="btn-group">
                                                        <!-- principal  -->
                                                        <button class="btn btn-flat" data-target="#modaldatos-{{$profesores->id}}" data-toggle="modal" style="height: 34px;" type="button">
                                                            <i class="fa fa-edit">
                                                            </i>
                                                        </button>
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
                                                                <a data-target="#modalasignaturasprofesor-{{$profesores->id}}" data-toggle="modal" href="#">
                                                                    <i class="fa fa-plus-square">
                                                                    </i>
                                                                    Agregar asignaturas
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a data-target="#modalasignaturasprofesordelete-{{$profesores->id}}" data-toggle="modal" href="#">
                                                                    <i class="fa fa-minus-square">
                                                                    </i>
                                                                    Eliminar asignaturas
                                                                </a>
                                                            </li>
                                                            @if(auth()->user()->rol == "0")
                                                            <li class="divider">
                                                            </li>
                                                            <li>
                                                                <a data-target="#modaldelete-{{$profesores->id}}" data-toggle="modal" href="#">
                                                                    <i class="fa fa-trash btn-">
                                                                    </i>
                                                                    Deshabilitar
                                                                </a>
                                                            </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                </td>
                                                <!-- botones  -->
                                                @include('profesores.modalasignaturasprofesor')
                              @include('profesores.modalasignaturasprofesordelete')
                              @include('profesores.modaldelete')
                              @include('profesores.modaldatos')

                                            </tr>
                                            @endforeach
                                        </table>
                                        <span> Mostrando {{$profesor->firstItem().' - '.$profesor->lastItem().' de '.$profesor->total().' profesores'}}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer clearfix">
                                <ul class="pagination pagination-sm no-margin pull-left">
                                    @if(auth()->user()->rol == "0")
                                    <a class="btn btn-app" data-target="#create" data-toggle="modal">
                                        <i class="fa fa-user-plus">
                                        </i>
                                        Profesor
                                    </a>
                                    @endif

                                    <a class="btn btn-app" href="{{ action('ProfesorController@PDF') }}" type="button">
                                        <i class="fa fa-file-pdf-o">
                                        </i>
                                        PDF
                                    </a>
                        
                                    <a class="btn btn-app" href="{{ action('ProfesorController@Excel') }}" type="button">
                                        <i class="fa fa-file-excel-o">
                                        </i>
                                        Excel
                                    </a>
                                </ul>
                                <ul class="pagination pagination-sm no-margin pull-right">
                                    {{ $profesor->render() }}
                                </ul>
                                @include('profesores.create')
                            </div>
                        </div>  
                    </div>
                    <!-- /.tab-pane -->

                    <!-- CALENDARIO -->
                    <div class="tab-pane" id="tab_2">
                        <div>
                    
                            <!-- /.box-header -->
                            <div class="col-md-12">
                                <div class="box-body table-responsive">
                                    <div class="scrollable">
                                        <table class="table table-bordered table-striped">
                                            <tr>
                                                <th>
                                                    Nombre
                                                </th>
                                                <th>
                                                    Rut
                                                </th>
                                                <th>
                                                    Correo
                                                </th>
                                                @if(auth()->user()->rol == "0")
                                                <th style="width: 110px">
                                                    Más
                                                </th>
                                                @endif
                                            </tr>
                                            @foreach($profesoreliminado as $profesores)
                                            <tr>
                                                <td>
                                                    {{ $profesores->apellido_paterno.' '.$profesores->apellido_materno.', '.$profesores->primer_nombre.' '.$profesores->segundo_nombre}}
                                                </td>
                                                <td>
                                                    {{ $profesores->rut }}
                                                </td>
                                                <td>
                                                    {{ $profesores->correo }}
                                                </td>
                          
                                                <!-- botones  -->
                                                @if(auth()->user()->rol == "0")
                                                <td>
                                                    <div class="btn-group">
                                                        <!-- principal  -->
                                                        <button class="btn btn-flat" data-target="#modaldelete-{{$profesores->id}}" data-toggle="modal" style="height: 34px;" type="button">
                                                            <i class="fa fa-mail-reply">
                                                            </i>
                                                        </button>
                                           
                                                  
                                                    </div>
                                                </td>
                                                @endif
                                                <!-- botones  -->
                                                @include('profesores.modaldelete')
                                            </tr>
                                            @endforeach
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer clearfix">
                   
                                <ul class="pagination pagination-sm no-margin pull-right">
                                    {{ $profesoreliminado->render() }}
                                </ul>
                                @include('profesores.create')
                            </div>
                        </div>  
                                                            
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="tab_3">

                    </div>
                    <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
            </div>                              
        </div>
    </div>                    
</section>
<!-- -->

<!-- /.col -->

@endsection
<style type="text/css">
    .table-responsive {
  overflow-x: inherit !important;
 
}
@media screen and (max-width:768px){
.scrollable{
  height: 500px;
  overflow: scroll;
} 
}
</style>
