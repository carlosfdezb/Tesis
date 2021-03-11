@extends('layouts.index')

@section('title', 'Especialistas')  

@section('content')
<!-- INDEX ESPECIALISTAS -->
<section class="content-header">
    <h1>
        Listado de Especialistas
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
            Especialistas
        </li>
    </ol>
</section>
<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            {{ Form::open(['url' => 'especialistas', 'method' => 'GET']) }}
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
                                <input type="text" class="form-control" name="especialidad" placeholder="Especialidad">
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
                        Todos los especialistas del sistema
                    </h3>
                </div>
                <!-- /.box-header -->
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <!-- Custom Tabs -->
                        <div class="nav-tabs-custom">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#tab_1" data-toggle="tab">Activos</a></li>
                                <li><a href="#tab_2" data-toggle="tab">Inactivos</a></li>
                                <!-- <li><a href="#tab_3" data-toggle="tab">Tab 3</a></li>
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
                                <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li> -->
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_1">
                                    <table aria-describedby="example1_info" class="table table-bordered table-striped dataTable" id="example1" role="grid">
                                        <thead>
                                            <th>
                                                Nombre
                                            </th>
                                            <th>
                                                Rut
                                            </th>
                                            <th>
                                                Especialidad
                                            </th>
                                            <th>
                                                Correo
                                            </th>
                                            <th>
                                                PIE
                                            </th>
                                            <th>
                                                Opciones
                                            </th>
                                        </thead>
                                        @foreach($especialistas as $especialista)
                                        <tr>
                                            <td>
                                                {{ $especialista->apellido_paterno.' '.$especialista->apellido_materno.' , '.$especialista->primer_nombre.' '.$especialista->segundo_nombre}}
                                            </td>
                                            <td>
                                                {{ $especialista->rut}}
                                            </td>

                                            <td>
                                                {{ $especialista->especialidad}}
                                            </td>
                                            <td>
                                                {{ $especialista->correo}}
                                            </td>

                                            @if(DB::table('equipo_pies')->where('id_especialista',$especialista->id)->where('estado','Activo')->count() > 0)
                                            <td>
                                                Sí
                                            </td>
                                            @else
                                            <td>
                                                No
                                            </td>
                                            @endif
                                            <!-- botones  -->
                                            <td>
                                                <div class="btn-group">
                                                <!-- principal  -->
                                                    <button class="btn btn-flat" data-target="#modal-edit-{{$especialista->id}}" data-toggle="modal" style="height: 34px;" type="button">
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
                                                        @if(DB::table('equipo_pies')->where('id_especialista',$especialista->id)->where('estado','Activo')->count() > 0)
                                                        <li>
                                                            <a data-target="#agregar_a_pie-{{$especialista->id}}" data-toggle="modal" href="#">
                                                                <i class="fa fa-flag-o">
                                                                </i>
                                                                Quitar PIE
                                                            </a>
                                                        </li>
                                                        @else
                                                        <li>
                                                            <a data-target="#agregar_a_pie-{{$especialista->id}}" data-toggle="modal" href="#">
                                                                <i class="fa fa-flag-o">
                                                                </i>
                                                                Agregar PIE
                                                            </a>
                                                        </li>
                                                        @endif
                                                        @if(auth()->user()->rol == '0')
                                                            @if($especialista->estado == 'Inactivo')
                                                            <li>
                                                                <a data-target="#estado-modal-{{$especialista->id}}" data-toggle="modal" href="#">
                                                                    <i class="fa fa-plus-square">
                                                                    </i>
                                                                    Habilitar
                                                                </a>
                                                            </li>
                                                            @else
                                                            <li>
                                                                <a data-target="#estado-modal-{{$especialista->id}}" data-toggle="modal" href="#">
                                                                    <i class="fa fa-minus-square">
                                                                    </i>
                                                                    Deshabilitar
                                                                </a>
                                                            </li>
                                                            @endif
                                                        @endif
                                                    </ul>
                                                </div>
                                            </td>
                                            <!-- botones  -->
                                            @include('especialistas.createmodal')
                                            @include('especialistas.editmodal')
                                            @include('especialistas.estadomodal')
                                            @include('especialistas.agregar_quitar_pie')
                                        </tr>
                                        @endforeach
                                    </table>
                                    <ul class="pagination pagination-sm no-margin pull-right">
                                        {{ $especialistas->render() }}
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
                                                Especialidad
                                            </th>
                                            <th>
                                                Correo
                                            </th>
                                            <th>
                                                PIE
                                            </th>
                                            <th>
                                                Opciones
                                            </th>
                                        </thead>
                                        @foreach($inactivos as $especialista)
                                        <tr>
                                            <td>
                                                {{ $especialista->rut}}
                                            </td>
                                            <td>
                                                {{ $especialista->primer_nombre.' '.$especialista->segundo_nombre.' '.$especialista->apellido_paterno.' '.$especialista->apellido_materno}}
                                            </td>
                                            <td>
                                                {{ $especialista->especialidad}}
                                            </td>
                                            <td>
                                                {{ $especialista->correo}}
                                            </td>

                                            @if(DB::table('equipo_pies')->where('id_especialista',$especialista->id)->where('estado','Activo')->count() > 0)
                                            <td>
                                                Sí
                                            </td>
                                            @else
                                            <td>
                                                No
                                            </td>
                                            @endif
                                            <!-- botones  -->
                                            <td>
                                            @if(auth()->user()->rol == "0")
                                                <div class="btn-group">
                                                <!-- principal  -->
                                                    <button class="btn btn-flat" data-target="#modal-edit-{{$especialista->id}}" data-toggle="modal" style="height: 34px;" type="button">
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
                                                    
                                                        @if($especialista->estado == 'Inactivo')
                                                        <li>
                                                            <a data-target="#estado-modal-{{$especialista->id}}" data-toggle="modal" href="#">
                                                                <i class="fa fa-plus-square">
                                                                </i>
                                                                Habilitar
                                                            </a>
                                                        </li>
                                                        @else
                                                        <li>
                                                            <a data-target="#estado-modal-{{$especialista->id}}" data-toggle="modal" href="#">
                                                                <i class="fa fa-minus-square">
                                                                </i>
                                                                Deshabilitar
                                                            </a>
                                                        </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                                @else
                                                    No disponible
                                                @endif
                                            </td>
                                            <!-- botones  -->
                                            @include('especialistas.estadomodal')
                                            @include('especialistas.editmodal')
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
                                    @if(auth()->user()->rol == '0')
                                    <a class="btn btn-app" data-target="#create" data-toggle="modal">
                                        <i class="fa fa-user-plus">
                                        </i>
                                        Especialista
                                    </a>
                                    @endif
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