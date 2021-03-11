@extends('layouts.index')

@section('title', 'Administrativos')  

@section('content')
<!-- INDEX ADMINISTRATIVOS -->
<section class="content-header">
    <h1>
        Listado de Administrativos
        <small>
            CEISP
        </small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="/">
                <i class="fa fa-home"> 
                </i>
                Inicio
            </a>
        </li>
        <li class="active">
            Administrativos
        </li>
    </ol>
</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            {{ Form::open(['url' => 'administrativos', 'method' => 'GET']) }}
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
                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" name="nombre" placeholder="Nombre y Apellido">
                            </div>

                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" name="rut" placeholder="Rut">
                            </div>

                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" name="correo" placeholder="Correo Electrónico">
                            </div>

                            <div class="form-group col-md-3">
                                <input type="text" class="form-control" name="cargo" placeholder="Cargo">
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
                        Todos los administrativos del sistema
                    </h3>
                </div>
                <br>
                <!-- /.box-header -->
                <div class="row">
                    <div class="col-md-12">
                        <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#tab_1" data-toggle="tab">Activos</a></li>
                                    <li><a href="#tab_2" data-toggle="tab">Inactivos</a></li>
                                <!--<li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>
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
                                    <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>-->
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="tab_1">
                                        <table aria-describedby="example1_info" class="table table-bordered table-striped dataTable" id="example1" role="grid">
                                            <thead>
                                                <th>
                                                    Rut
                                                </th>
                                                <th>
                                                    Nombre
                                                </th>
                                                <th>
                                                    Correo
                                                </th>
                                                <th>
                                                    Cargo
                                                </th>
                                                <th>
                                                    Opciones
                                                </th>
                                            </thead>
                                            @foreach($administrativos as $administrativo) 
                                            <tr>
                                                <td>
                                                    {{ $administrativo->rut}}
                                                </td>
                                                <td>
                                                    {{ $administrativo->apellido_paterno.' '.$administrativo->apellido_materno.' , '.$administrativo->primer_nombre.' '.$administrativo->segundo_nombre}}
                                                </td>
                                                <td>
                                                    {{ $administrativo->correo}} 
                                                </td>
                                                <td>
                                                    {{ $administrativo->cargo}}
                                                </td>
                                                </td>
                                                <!-- botones  -->
                                                <td>
                                                    <div class="btn-group">
                                                        <!-- principal  -->
                                                        <button class="btn btn-flat" data-target="#modal-edit-{{$administrativo->id}}" data-toggle="modal" style="height: 34px;" type="button">
                                                            <i class="fa fa-edit">
                                                            </i>
                                                        </button>
                                                        @if(auth()->user()->rol == "0" or auth()->user()->rol == "2")
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
                                                                <a data-target="#estado-modal-{{$administrativo->id}}" data-toggle="modal" href="#">
                                                                    <i class="fa fa-minus-square">
                                                                    </i>
                                                                    Deshabilitar
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        @endif
                                                    </div>
                                                </td>
                                                <!-- botones  -->
                                                @include('administrativos.createmodal')
                                                @include('administrativos.editmodal')
                                                @include('administrativos.estadomodal')
                                            </tr>
                                            @endforeach
                                        </table>
                                        <ul class="pagination pagination-sm no-margin pull-right">
                                            {{ $administrativos->render() }}
                                        </ul>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_2">
                                        <table aria-describedby="example1_info" class="table table-bordered table-striped dataTable" id="example1" role="grid">
                                            <thead>
                                                <th>
                                                    Rut
                                                </th>
                                                <th>
                                                    Nombre
                                                </th>
                                                <th>
                                                    Correo
                                                </th>
                                                <th>
                                                     Cargo
                                                </th>
                                                <th>
                                                    Opciones
                                                </th>
                                            </thead>
                                            @foreach($inactivos as $administrativo) 
                                            <tr>
                                                <td>
                                                    {{ $administrativo->rut}}
                                                </td>
                                                <td>
                                                    {{ $administrativo->apellido_paterno.' '.$administrativo->apellido_materno.' , '.$administrativo->primer_nombre.' '.$administrativo->segundo_nombre}}
                                                </td>
                                                <td>
                                                    {{ $administrativo->correo}} 
                                                </td>
                                                <td>
                                                    {{ $administrativo->cargo}}
                                                </td>
                                                <!-- botones  -->
                                                <td>
                                                @if(auth()->user()->rol == "0" or auth()->user()->rol == "2")
                                                    <div class="btn-group">
                                                        <!-- principal  -->
                                                        <button class="btn btn-flat" data-target="#modal-edit-" data-toggle="modal" style="height: 34px;" type="button">
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
                                                                <a data-target="#estado-modal-{{$administrativo->id}}" data-toggle="modal" href="#">
                                                                    <i class="fa fa-plus-square">
                                                                    </i>
                                                                    Habilitar
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                @else
                                                    No disponible
                                                @endif
                                                </td>
                                                <!-- botones  -->
                                                @include('administrativos.editmodal')
                                                @include('administrativos.estadomodal')
                                            </tr>
                                            @endforeach
                                        </table>
                                        <ul class="pagination pagination-sm no-margin pull-right">
                                            {{ $inactivos->render() }}
                                        </ul>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane" id="tab_3">
                
                                    </div> 
                                    <!-- /.tab-pane -->
                                </div>
                                <!-- /.tab-content -->
                                <div class="box-footer clearfix">
                                    <ul class="pagination pagination-sm no-margin pull-left">
                                        @if(auth()->user()->rol == "0" or auth()->user()->rol == "2")
                                        <a class="btn btn-app" data-target="#create" data-toggle="modal">
                                            <i class="fa fa-user-plus">
                                            </i>
                                            Administrativo
                                        </a>
                                        @endif
                                    </ul>
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                    </ul>
                                </div>
                            </div>
                            <!-- nav-tabs-custom -->
                    </div>
                    <!-- /.col -->
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
