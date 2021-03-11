@extends('layouts.index')

@section('title', 'Materiales')  

@section('content')

<!-- INDEX MATERIALES PROFESOR -->
<section class="content-header">
    <h1>
        Listado de Cursos
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
        @if(auth()->user()->rol == '5')
        <li>
        	<a href="{{url('/modulo_materiales/administrador/index')}}">
            	Profesores
            </a>
        </li>
        <li class="active">
        	Asignaturas
        </li>
        @else
        <li class="active">
            Materiales
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
                        Perfil del Profesor
                    </h3>
                </div>
                    <!-- /.box-header -->
                <div class="row">
                    <div class="col-md-12">
	                    <div class="col-md-3">
	                        <br>
	                        <ul class="list-group">
	                            <li class="list-group-item active"><h4><strong>{{$profesor->primer_nombre.' '.$profesor->segundo_nombre.' '.$profesor->apellido_paterno.' '.$profesor->apellido_materno}}</strong></h4></li>
	                            <li class="list-group-item">
	                                 Rut : {{$profesor->rut}}
	                            </li>
	                            <li class="list-group-item">
	                                 Correo : {{$profesor->correo}}
	                            </li>
	                           	<li class="list-group-item">
	                                 N° de asignaturas : {{$profesor->asignaturas->count()}}
	                            </li>
	                        </ul>
	                        <div>
	                        @if(auth()->user()->rol == '5')
	                        <ul class="pagination pagination-sm no-margin pull-left">
	                            <a href="/modulo_materiales/administrador/index" class="btn btn-app">
	                                <i class="fa fa-arrow-circle-left">
	                                </i>
	                                Atrás
	                            </a>
	                              <!-- <a class="btn btn-app" data-target="#" data-toggle="modal">
	                                <i class="fa fa-cloud-upload">
	                                </i>
	                                Documento
	                            </a>
	                            <a class="btn btn-app">
	                                <i class="fa fa-plus">
	                                </i>
	                                Unidad
	                            </a>-->
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
                            		@if($profesor->asignaturas->count() > 0)
	                            	<!-- Custom Tabs -->
	                                <div class="nav-tabs-custom">
	                                    <ul class="nav nav-tabs">
	                                         <li class="active"><a href="#tab_1" data-toggle="tab">Asignaturas impartidas</a></li> 
	                                    </ul>
	                                    <div class="tab-content">
	                                    
	                                        <div class="tab-pane active" id="tab_1">
	                                            <div class="box-body table-responsive">
	                                            @foreach($profesor->asignaturas as $asignatura)
	                                            	<?php
	                                                     $id_curso = DB::table('cursos')
	                                                     	->where('nivel',$asignatura->pivot->nivel)
	                                                     	->where('grado',$asignatura->pivot->grado)
	                                                     	->where('letra',$asignatura->pivot->letra)
	                                                     	->first();
	                                                 ?>	
	                                            @if(auth()->user()->rol == '3')						 
	                                            <div class="form-group">
	                                                <div class="input-group date">
	                                                    <div class="input-group-addon">
	                                                        <i class="fa fa-caret-right text-blue"></i>
	                                                    </div>
	                                                    <span class="form-control">
	                                                        <a  class="pull-left" href="{{ route('modulo_materiales.profesor.vista_curso', ['id_curso' => $id_curso->id , 'id_asignatura'=> $asignatura->id]) }}"> 
	                                                        	{{$asignatura->nombre.' - '.$asignatura->pivot->nivel.' ° '.$asignatura->pivot->grado.' '.$asignatura->pivot->letra}}
	                                                        </a>
	                                                    </span>
	                                                   	<div class="input-group-addon">
	                                                    	<button type="button" style=" background-color: white;border: none;">
	                                                    		<a href="{{ route('modulo_materiales.profesor.vista_curso', ['id_curso' => $id_curso->id , 'id_asignatura'=> $asignatura->id]) }}">
	                                                    			<i class="fa fa-folder-open"></i>
	                                                    		</a>
	                                                    	</button>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                            @else
	                                            <div class="form-group">
	                                                <div class="input-group date">
	                                                    <div class="input-group-addon">
	                                                        <i class="fa fa-caret-right text-blue"></i>
	                                                    </div>
	                                                    <span class="form-control">
	                                                        <a  class="pull-left" href="{{ route('modulo_materiales.administrador.vista_curso', ['id_curso' => $id_curso->id , 'id_asignatura'=> $asignatura->id,'id' => $profesor->id]) }}"> 
	                                                        	{{$asignatura->nombre.' - '.$asignatura->pivot->nivel.' ° '.$asignatura->pivot->grado.' '.$asignatura->pivot->letra}}
	                                                        </a>
	                                                    </span>
	                                                   	<div class="input-group-addon">
	                                                    	<button type="button" style=" background-color: white;border: none;">
	                                                    		<a href="{{ route('modulo_materiales.administrador.vista_curso', ['id_curso' => $id_curso->id , 'id_asignatura'=> $asignatura->id,'id' => $profesor->id]) }}">
	                                                    			<i class="fa fa-folder-open"></i>
	                                                    		</a>
	                                                    	</button>
	                                                    </div>
	                                                </div>
	                                            </div>
	                                            @endif
	                                            @endforeach
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
	                               	<div class="callout callout-info">
                						<h4> ¡No tiene ninguna asignatura asignada aún! <i class="fa fa-frown-o"></i></h4>
                						<p><i class="icon fa fa-info-circle"></i> Debe tener mínimo 1 asignatura asignada.</p>
             						</div>
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