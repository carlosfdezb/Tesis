@extends('layouts.index')

@section('title', 'Materiales')  

@section('content')

<!-- INDEX MATERIALES PROFESOR -->
<section class="content-header">
    <h1>
       Materiales Asignatura
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
        
        	@if(auth()->user()->rol == '4')
        	<li>
            	<a href="{{url('/modulo_materiales/alumno/index')}}">
                	Materiales
            	</a>
            </li>
            @elseif(auth()->user()->rol == '3')
            <li>
            	<a href="{{url('/modulo_materiales/profesor/index')}}">
                	Materiales
            	</a>
            </li>
            @elseif(auth()->user()->rol == '5')
            <li>
            	<a href="{{url('/modulo_materiales/administrador/index')}}">
            		Profesores
            	</a>
            </li>
            <li>
            	<a href="{{url('/modulo_materiales/administrador/profesor/'.$profesor->id.'/index')}}">
                	Asignaturas
            	</a>
            </li>
            @endif
        
        <li class="active">
            {{$asignatura->nombre.' - '.$curso->nivel.' ° '.$curso->grado.' '.$curso->letra}}
        </li>
    </ol>
</section>

<!-- Main content -->
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            @include('alerts.success')
            @include('alerts.warning')
            @include('alerts.danger')
            @if(auth()->user()->rol != '4')
	            @include('modulo_materiales.agregar_unidad_modal')
	            @include('modulo_materiales.subir_archivo_profesor')
            @endif
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title text-light-blue">
                        Perfil del Curso
                    </h3>
                </div>
                    <!-- /.box-header -->
                <div class="row">
                    <div class="col-md-12">
	                    <div class="col-md-3">
	                        <br>
	                        <ul class="list-group">
	                            <li class="list-group-item active"><h4><strong>{{$asignatura->nombre.' - '.$curso->nivel.' ° '.$curso->grado.' '.$curso->letra}} </strong></h4></li>
	                            <li class="list-group-item">
	                               Profesor : {{$profesor->primer_nombre.' '.$profesor->apellido_paterno.' '.$profesor->apellido_materno}}
	                            </li>
	                            <li class="list-group-item">
	                                Rut : {{$profesor->rut}}
	                            </li>
	                            <li class="list-group-item">
	                                Correo : {{$profesor->correo}}
	                            </li>
	                            @if(auth()->user()->rol != '4')
	                           		<li class="list-group-item">
	                                	N° de Alumnos : {{$curso->alumnos->count()}}
	                            	</li>
	                            @endif
	                        </ul>
	                        <div>
	                        @if(auth()->user()->rol == '3')
	                        <ul class="pagination pagination-sm no-margin pull-left">
	                            <a href="{{url('/modulo_materiales/profesor/index')}}" class="btn btn-app">
	                                <i class="fa fa-arrow-circle-left">
	                                </i>
	                                Atrás
	                            </a>
	                           	<a class="btn btn-app" data-target="#agregar_unidad" data-toggle="modal">
	                                <i class="fa fa-plus">
	                                </i>
	                                Sección
	                            </a>
	                             <a class="btn btn-app" data-target="#subir_archivo_profesor" data-toggle="modal">
	                                <i class="fa fa-cloud-upload">
	                                </i>
	                                Documento
	                            </a>
	                        </ul>
	                        @elseif(auth()->user()->rol == '5')
	                        <ul class="pagination pagination-sm no-margin pull-left">
	                            <a href="/modulo_materiales/administrador/profesor/{{$profesor->id}}/index " class="btn btn-app">
	                                <i class="fa fa-arrow-circle-left">
	                                </i>
	                                Atrás
	                            </a>
	                        </ul>
	                       	@elseif(auth()->user()->rol == '4')
	                        <ul class="pagination pagination-sm no-margin pull-left">
	                            <a href="{{url('/modulo_materiales/alumno/index')}}" class="btn btn-app">
	                                <i class="fa fa-arrow-circle-left">
	                                </i>
	                                Atrás
	                            </a>
	                        </ul>
	                       	@endif
	                        <br>
	                        <br>
	                        <br>
	                        <br>
	                        </div>
	                    </div>
                    <br>
                		<div class="col-md-9">
                    		<div class="row">
                            	<div class="col-md-12">
	                            	<!-- Custom Tabs -->
	                                <div class="nav-tabs-custom">
	                                	@if(DB::table('titulo_unidads')->where('id_profesor',$profesor->id)->where('id_curso',$curso->id)->where('id_asignatura',$asignatura->id)->count() > 0)
	                                    <ul class="nav nav-tabs">
	                                        <li class="active"><a href="#tab_1" data-toggle="tab">Menú Secciones</a></li>
	                                    </ul>                                        
	                                    <div class="tab-content">
	                                        <div class="tab-pane active" id="tab_1">                                      
                                    	       	<div class="box-body table-responsive">
	                                            @foreach($titulos->sortBy('titulo_unidad') as $titulo) <!-- foreach titulo -->
	                                            @if(auth()->user()->rol == '3')
		                                            @include('modulo_materiales.actualizar_nombre_unidad')
		                                            @include('modulo_materiales.eliminar_nombre_unidad')
		                                        @endif
	                                            <div class="form-group">
	                                                <div class="input-group date">
	                                                    <div class="input-group-addon">
	                                                        <i class="fa fa-caret-right text-blue"></i>
	                                                    </div>
	                                                    <span class="form-control">
	                                                        <a aria-expanded="false" class="pull-left" data-parent="#accordion" data-toggle="collapse" href="#1collapse{{$titulo->id}}"> 
	                                                        	{{$titulo->titulo_unidad}} 
	                                                        </a>
	                                                    </span>
	                                                    @if(auth()->user()->rol == '3')
	                                                   	<div class="input-group-addon">
	                                                    	<button type="button" style=" background-color: white;border: none;">
	                                                    		<a href="{{route('modulo_materiales.actualizar_nombre_unidad', ['id_curso' => $curso->id,'id_asignatura' => $asignatura->id,'id_titulo' => $titulo->id])}}"data-target="#actualizar-nombre-unidad-{{$titulo->id}}" data-toggle="modal" >
	                                                    			<i class="fa fa-edit"></i>
	                                                    		</a>
	                                                    	</button>
	                                                    	
	                                                    	<button type="button" style=" background-color: white;border: none;">
	                                                    		<a href="{{route('modulo_materiales.eliminar_nombre_unidad', ['id_curso' => $curso->id,'id_asignatura' => $asignatura->id,'id_titulo' => $titulo->id])}}" data-target="#eliminar-nombre-unidad-{{$titulo->id}}" data-toggle="modal">
	                                                    			<i class="fa fa-trash"></i>
	                                                    		</a>
	                                                    	</button>
	                                                    </div>
	                                                    @endif
	                                                </div>
	                                            </div>
	                                            <div aria-expanded="false" class="panel-collapse collapse" id="1collapse{{$titulo->id}}" style="">
	                                                <table aria-describedby="example1_info" class="table table-bordered dataTable" id="example1" role="grid" style="font-size: 14px;">
	                                                    <thead>
	                                                        <th width="30%">
	                                                            Título 
	                                                        </th>
	                                                        <th width="30%">
	                                                            Descripción
	                                                        </th>
	                                                        <th width="30%">
	                                                            Documento
	                                                        </th>
	                                                        <th width="10%">
	                                                            Opciones
	                                                        </th>
	                                                    </thead>
	                                                     @foreach($documentos as $documento)<!-- foreach documento -->
	                                                    <tr>
	                                                    	@if($documento->id_titulo_unidad != NULL)
		                                                    	@if($documento->id_titulo_unidad == $titulo->id)
		                                                    		@include('modulo_materiales.actualizar_archivo_profesor')
		                                                    		@include('modulo_materiales.eliminar_archivo_profesor')
			                                                    	<td>
			                                                    		{{$documento->titulo}}
			                                                    	</td>
			                                                    		
			                                                    	<td>
			                                                    		{{$documento->descripcion}}
			                                                    	</td>
			                                                    	<td>
			                                                    		{{$documento->archivo}}
			                                                    	</td>
			                                                        
			                                                        <!-- botones -->
			                                                        <td>
			                                                            <div class="btn-group">
			                                                                <!-- principal  -->
			                                                                <a class="btn btn-flat" style="height: 34px;width: 40px;background-color: #EFEFEF;" type="button" href="{{route('modulo_materiales.descargar_archivo', ['id_curso' => $curso->id,'id_asignatura' => $asignatura->id,'file' => $documento->archivo])}}">
			                                                                    <i class="fa fa-download">
			                                                                    </i>
			                                                                </a>
			                                                                @if(auth()->user()->rol == '3')
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
			                                                                        <a href="{{ route('modulo_materiales.actualizar_archivo', ['id_curso' => $curso->id,'id_asignatura' => $asignatura->id,'id_archivo' => $documento->id]) }}" data-target="#actualizar-archivo-{{$documento->id}}" data-toggle="modal">
			                                                                            <i class="fa fa-edit">
			                                                                            </i>
			                                                                            Actualizar
			                                                                        </a>
			                                                                    </li>
			                                                                    <li>
			                                                                        <a href="{{ route('modulo_materiales.actualizar_archivo', ['id_curso' => $curso->id,'id_asignatura' => $asignatura->id,'id_archivo' => $documento->id]) }}" data-target="#eliminar-archivo-{{$documento->id}}" data-toggle="modal">
			                                                                            <i class="fa fa-trash btn-">
			                                                                            </i>
			                                                                            Eliminar
			                                                                        </a>
			                                                                    </li>
			                                                                </ul>
			                                                                @endif
			                                                            </div>
			                                                        </td>
			                                                        <!-- .botones  -->
			                                                    @endif
			                                                @endif                              
	                                                    </tr>
	                                                   @endforeach  <!-- .foreach documento -->
	                                                </table>
	                                            </div>
	                                                <br>
	                                            @endforeach <!-- .foreach titulo -->
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
	                                </div>
	                                   @else <!-- /.tab-content -->
	                                </div>
	                                		@if(auth()->user()->rol == '3')
					                        	<div class="callout callout-info">
		                							<h4>¡No a añadido ninguna sección aún! <i class="fa fa-frown-o"></i></h4>
		                							<p><i class="icon fa fa-info-circle"></i> Seleccione el botón Sección para crear una nueva.</p>
		             							</div>
		             						@else
		             							<div class="callout callout-info">
		                							<h4>¡El profesor no ha añadido ninguna sección aún!<i class="fa fa-frown-o"></i></h4>
		                							<p><i class="icon fa fa-info-circle"></i> Espere que el profesor suba material.</p>
		             							</div>
		             						@endif
			                        	@endif
	                                <!-- .Custom Tabs -->
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
                <div class="box-footer clearfix">
                </div>
            </div>
            <!-- .panel box primary -->
        </div>
        <!-- .col-md-12 -->
    </div>
    <!-- .row -->
</section>
<!-- .Main content -->

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