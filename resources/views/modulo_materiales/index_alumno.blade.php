 @extends('layouts.index')

@section('title', 'Materiales')  

@section('content')

<!-- INDEX MATERIALES ALUMNO -->
<section class="content-header">
    <h1>
        Listado de Asignaturas
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
            Materiales
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
	                            <li class="list-group-item active"><h4><strong>{{$alumno->primer_nombre.' '.$alumno->segundo_nombre.' '.$alumno->apellido_paterno.' '.$alumno->apellido_materno}}</strong></h4></li>
	                            <li class="list-group-item">
	                                 Curso : {{$alumno->curso->nivel.' ° '.$alumno->curso->grado.' '.$alumno->curso->letra}}
	                            </li>
	                            <li class="list-group-item">
	                                 Rut alumno : {{$alumno->rut}}
	                            </li>
	                            <li class="list-group-item">
	                                 Correo alumno : {{$alumno->correo}}
	                            </li>
	                           	<li class="list-group-item">
	                                 N° de asignaturas : {{$alumno->curso->asignaturas->count()}}
	                            </li>

	                            <li class="list-group-item">
	                                 Profesor jefe : {{$alumno->curso->profesor->primer_nombre.' '.$alumno->curso->profesor->apellido_paterno.' '.$alumno->curso->profesor->apellido_materno}}
	                            </li>
	                            <li class="list-group-item">
	                                 Correo profesor jefe : {{$alumno->curso->profesor->correo}}
	                            </li>

	                        </ul>
	                        <div>
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
                            		@if($alumno->curso->asignaturas->count() > 0)
	                            	<!-- Custom Tabs -->
	                                <div class="nav-tabs-custom">
	                                    <ul class="nav nav-tabs">
	                                         <li class="active"><a href="#tab_1" data-toggle="tab">Asignaturas</a></li>           
	                                    </ul>
	                                    <div class="tab-content">
	                                        <div class="tab-pane active" id="tab_1">
	                                        	<div class="row"></br>
	                                        		<?php
	                                                     $asignaturas = DB::table('curso_asignatura')
													        ->join('asignaturas','curso_asignatura.asignatura_id','asignaturas.id')
													        ->join('asignatura_profesor','asignaturas.id','asignatura_profesor.asignatura_id')
													        ->join('profesors','asignatura_profesor.profesor_id','profesors.id')
													        ->where('curso_asignatura.curso_id',$alumno->curso->id)
													        ->where('nivel',$alumno->curso->nivel)
	                                                     	->where('grado',$alumno->curso->grado)
	                                                     	->where('letra',$alumno->curso->letra)
	                                                     	->orderBy('nombre')
	                                                     	->get();
	                                                 ?>
						                            @foreach($asignaturas as $asignatura)
						                            <div class="col-lg-4 col-xs-6">
						                              <!-- small box -->
						                              <div class="small-box {{$asignatura->color}}">
						                                <div class="inner">
						                                  <h4>{{$asignatura->nombre}}</h4>
						                                  <p>Profesor. {{$asignatura->primer_nombre.' '.$asignatura->apellido_paterno}}</p>
						                                </div>
						                                <div class="icon">
						                                  <i class="fa {{$asignatura->icono}}"></i>
						                                </div>
						                                @if($asignatura->nombre!="Orientación")
						                                <a href="{{ route('modulo_materiales.alumno.vista_curso', ['id_curso' => $asignatura->curso_id , 'id_asignatura'=> $asignatura->asignatura_id,'id_profesor' => $asignatura->profesor_id]) }}" class="small-box-footer">
						                                  Ver asignatura <i class="fa fa-arrow-circle-right"></i>
						                                </a>
						                                @else
						                                    <span class="small-box-footer">Asignatura formativa</span>
						                                @endif
						                              </div>
						                            </div>						                            
						                            @endforeach
                        						</div>
	                                        </div>
	                                        <!-- /.tab-pane -->
	                                        <div class="tab-pane" id="tab_3">
	                                            
	                                        </div>
	                                        <!-- /.tab-pane -->
	                                        <div class="tab-pane" id="tab_2">
	                                        	
	                                        </div>
	                                        <!-- /.tab-pane -->

	                                    </div>
	                                    <!-- /.tab-content -->
	                                </div>
	                                <!-- .Custom Tabs -->
	                                @else
	                               	<div class="callout callout-info">
                						<h4> ¡No tiene ninguna asignatura asignada aún! <i class="fa fa-frown-o"></i></h4>
                						<p><i class="icon fa fa-info-circle"></i> Debe tener mínimo 1 asignatura asignada para desplegar las unidades correspondientes.</p>
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