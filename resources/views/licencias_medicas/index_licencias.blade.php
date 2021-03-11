@extends('layouts.index')

@section('title', 'Licencias Médicas')  

@section('content')

<!-- INDEX ALUMNO LICENCIAS MEDICAS -->
<section class="content-header">
    <h1>
       Licencias Médicas
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
        @if(auth()->user()->rol == '5')
        <li>
           <a href="{{url('/licencias_medicas/administrador/index')}}">
                Alumnos
            </a>
        </li>
        <li class="active">
            Licencias Médicas
        </li>
        @else
        	<li class="active">
            	Licencias Médicas
        	</li>
        @endif
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
        @include('alerts.success')
        @include('alerts.warning')
        @include('alerts.danger')
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title text-light-blue">
                        Perfil del Alumno
                    </h3>
                </div>
                    <!-- /.box-header -->
                <div class="row">
                    <div class="col-md-12">
	                    <div class="col-md-3">
	                        <br>
	                        <ul class="list-group">
	                            <li class="list-group-item active"><h4><strong>{{$alumno->primer_nombre.' '.$alumno->segundo_nombre.' '.$alumno->apellido_paterno.' '.$alumno->apellido_materno}} </strong></h4></li>
	                            <li class="list-group-item">
	                               Rut : {{$alumno->rut}}
	                            </li>
	                            <li class="list-group-item">
	                               Curso : 	@if($alumno->curso->nivel == 'Kinder')
                                            	{{ $alumno->curso->nivel.' '.$alumno->curso->letra }}
                                        	@else
                                            	{{ $alumno->curso->nivel.' ° '.$alumno->curso->grado.' '.$alumno->curso->letra }}
                                        	@endif
	                            </li>
	                            <li class="list-group-item">
	                                Profesor Jefe : {{$alumno->curso->profesor->primer_nombre.' '.$alumno->curso->profesor->apellido_paterno.' '.$alumno->curso->profesor->apellido_materno}}
	                            </li>
	                        </ul>
	                        <div>
	                        	<ul class="pagination pagination-sm no-margin pull-left">
	                        		@if(auth()->user()->rol == '5')
		                            <a href="/licencias_medicas/administrador/index" class="btn btn-app">
		                                <i class="fa fa-arrow-circle-left">
		                                </i>
		                                Atrás
		                            </a>
		                            @elseif(auth()->user()->rol == '4')
		                             <a class="btn btn-app" data-target="#subir-licencia-{{$alumno->id}}" data-toggle="modal">
		                                <i class="fa fa-cloud-upload">
		                                </i>
		                                Licencia
		                            </a>
		                            @endif
	                        	</ul>
	                        </div>
	                        <br>
	                        <br>
	                        <br>
	                        <br>
	                    </div>
                    	<br>
                		<div class="col-md-9">
                    		<div class="row">
                            	<div class="col-md-12">
                            		@if(DB::table('licencia_medicas')->where('id_alumno',$alumno->id)->count() > 0)
	                            	<!-- Custom Tabs -->
	                                <div class="nav-tabs-custom">
	                                    <ul class="nav nav-tabs">
	                                        <li class="active"><a href="#tab_1" data-toggle="tab">Licencias Médicas</a></li>
	                                    </ul>                                        
	                                    <div class="tab-content">
	                                        <div class="tab-pane active" id="tab_1">                                
                                    	       	<div class="box-body table-responsive">                                            
	                                                <table aria-describedby="example1_info" class="table table-bordered table-striped dataTable" id="example1" role="grid" style="font-size: 14px;">
	                                                    <thead>
	                                                        <th>
	                                                            Licencia Médica 
	                                                        </th>
	                                                        <th>
	                                                            Fecha de Licencia
	                                                        </th>
	                                                        <th>
	                                                            Fecha de Subida
	                                                        </th>
	                                                        @if(auth()->user()->rol == '5')
	                                                        <th>
	                                                            Revisado por
	                                                        </th>
	                                                        @endif
	                                                        <th>
	                                                            Revisión
	                                                        </th>
	                                                     
	                                                        <th>
	                                                            Opciones
	                                                        </th>
	                                                    </thead>
	                                                    @foreach($licencias as $licencia)
	                                                    <tr>
	                                                    	<td>
	                                                    		{{$licencia->archivo}}
	                                                    	</td>
	                                                    	<td>
	                                                    		{{ date('d-m-Y',strtotime($licencia->fecha_licencia)) }}
	                                                    	</td>
	                                                    	<td>
	                                                    		{{ date('d-m-Y',strtotime($licencia->created_at)) }}
	                                                    	</td>
	                                                    	@if(auth()->user()->rol == '5')
	                                                    	<td>
	                                                    		{{$licencia->nombre_administrativo}}
	                                                    	</td>
	                                                    	@endif
	                                                    	<td>
	                                                    		@if($licencia->estado == 'Pendiente')
						                                        <div class="text-yellow">{{ $licencia->estado}}</div>
						                                        @elseif($licencia->estado == 'Aprobado')
						                                        <div class="text-green">{{ $licencia->estado}}</div>
						                                        @elseif($licencia->estado == 'Rechazado')
						                                        <div class="text-red">{{ $licencia->estado}}</div>
						                                        @endif
	                                                    	</td>
	                                                        <!-- botones -->
	                                                        <td>
	                                                            <div class="btn-group">
	                                                                <!-- principal  -->
	                                                                <button class="btn btn-flat"style="height: 34px;" type="button"><a href="/licencias_medicas/alumno/index/{{$licencia->archivo}}">
	                                                                    <i class="fa fa-download">
	                                                                    </i>
	                                                                </a></button>
	                                                                
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
	                                                                        <a href="" data-target="#modal-ver-{{$licencia->id}}" data-toggle="modal">
	                                                                            <i class="fa fa-eye">
	                                                                            </i>
	                                                                            Ver detalle
	                                                                        </a>
	                                                                    </li>
	                                                                    @if(auth()->user()->rol == '5')
	                                                                    <li>
	                                                                        <a href="#" data-target="#modal-estado-{{$licencia->id}}" data-toggle="modal">
	                                                                            <i class="fa fa-flag-o">
	                                                                            </i>
	                                                                            Revisión
	                                                                        </a>
	                                                                    </li>
	                                                                    @endif
	                                                                    @if(auth()->user()->rol == '4')
	                                                                    	@if($licencia->estado == 'Pendiente')
			                                                                    <li>
			                                                                        <a href="" data-target="#actualizar-archivo-{{$licencia->id}}" data-toggle="modal">
			                                                                            <i class="fa fa-edit">
			                                                                            </i>
			                                                                            Actualizar
			                                                                        </a>
			                                                                    </li>
			                                                                    <li>
			                                                                        <a href="" data-target="#modal-delete-{{$licencia->id}}" data-toggle="modal">
			                                                                            <i class="fa fa-trash">
			                                                                            </i>
			                                                                            Eliminar
			                                                                        </a>
			                                                                    </li>
		                                                                    @endif
	                                                                    @endif
	                                                                </ul>
	                                                            </div>
	                                                        </td>
	                                                        <!-- .botones  -->
	                                                    </tr>
	                                                    @include('licencias_medicas.subir_licencia_modal')
	                                                    @include('licencias_medicas.ver_licencia_modal')
	                                                    @include('licencias_medicas.actualizar_licencia_modal')
	                                                    @include('licencias_medicas.eliminar_licencia_modal')
	                                                    @if(auth()->user()->rol == '5')
	                                                    	@include('licencias_medicas.estado_licencia_modal')
	                                                    @endif
	                                                    @endforeach
	                                                </table>
	                                                <br>
	                                            </div>
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
	                                </div>
	                                <!-- .Custom Tabs -->
	                                @else
	                                	@if(auth()->user()->rol == '5')
		                            	<div class="callout callout-info">
			                				<h4>¡Alumno no presenta licencias médicas! <i class="fa fa-bullhorn"></i></h4>
			                				<p><i class="icon fa fa-info-circle"></i> El alumno no ha añadido ninguna licencia médica.</p>
			             				</div>
			             				@elseif(auth()->user()->rol == '4')
			             					<div class="callout callout-info">
			                				<h4>¡No presentas licencias médicas! <i class="fa fa-bullhorn"></i></h4>
			                				<p><i class="icon fa fa-info-circle"></i> Puedes añadir una nueva licencia médica con el botón Licencia.</p>
			             				</div>
			             				@endif
	                                @endif
                            	</div>
                            	<!-- .col-md-12 -->
                        	</div>
                        	<!-- .row --> 
                    	</div>
                    	<!-- .col-md-9 -->
                    </div>
                    <!-- .col-md-12 -->
                </div>
                <!-- .row -->
            </div>
            <!-- .panel box primary -->
        </div>
        <!-- .col-md-12 -->
    </div>
    <!-- .row -->
</section>
<!-- .Main content -->






<div class="modal fade bd-example-modal-lg" id="subir-licencia-{{$alumno->id}}" role="dialog">
<div class="modal-dialog">
    {{!!Form::open(['url'=>'licencias_medicas/alumno/index/subir_archivo_licencia','method'=>'put', 'files'=>'true'])!!}
    {{ csrf_field() }}
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"  
                aria-label="Close">
                     <span aria-hidden="true"><i class="fa fa-times" aria-hidden="true"></i></span>
                </button>
                <h3 class="modal-title" align="center">Nueva Licencia Médica</h3> 
            </div>
                 <div class="modal-body">
                     <div class="form-group">

			<label for ="">Nombre Alumno</label>
            <div type="date" class="form-control" name="nombre_alumno">{{$alumno->primer_nombre.' '.$alumno->apellido_paterno.' '.$alumno->apellido_materno}}</div>
            

            <label for ="">Curso</label>
            <div type="date" class="form-control">
                @if($alumno->curso->nivel == 'Kinder')
                    {{ $alumno->curso->nivel.' '.$alumno->curso->letra }}
                @else
                    {{ $alumno->curso->nivel.' ° '.$alumno->curso->grado.' '.$alumno->curso->letra }}
                @endif
            </div>
            <input hidden="true" name="id_curso" value="{{$alumno->curso->id}}">

            <label for ="">Fecha de la licencia</label>
            <input type="date" class="form-control" name="fecha_licencia" required="true">
            <div class="form-group has-warning">
            <span class="help-block"><i class="fa fa-exclamation-circle"></i> Ingrese fecha inicio de la licencia médica</span> 
            </div>

			<label for ="">Descripción</label>
            <textarea class="form-control" name="descripcion" cols="5" rows="10" style="max-width: 100%" placeholder="Describa aquí el motivo,razón,etc..."></textarea>
            <div class="form-group has-warning">
            <span class="help-block"><i class="fa fa-exclamation-circle"></i> Si no desea agregar descripción, omita este campo</span> 
            </div>

            <label for ="">Documento</label>
            <input type="file" name="documentos" class="form-control" required="true">
            <div class="form-group has-warning">
            <span class="help-block"><i class="fa fa-exclamation-circle"></i> La licencia médica será revisada por UTP</span> 
            </div>
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