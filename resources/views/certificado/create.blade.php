@extends('layouts.index')

@section('title', 'Certificados')  

@section('content')
<!-- INDEX NOTAS -->
<section class="content-header">
    <h1>
        Solicitud de Certificado
        <small>
            CEISP
        </small>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="inicio">
                <i class="fa fa-home">
                </i>
                Inicio
            </a>
        </li>
        <li class="active">
            Certificados
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
                    <h3 class="box-title">
                        Datos Alumno
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="col-md-12">
                    <div class="row">
                            </br>
                            <div class="col-xs-12 col-lg-6">
                                <div class="form-group">
                                    <h4 class="col-sm-3 col-xs-12" style="color:#2c6aa0;font-family:calibri">Nombres</h4>
                                    <h4 class="col-sm-9 col-xs-12" style="color:#393939;font-family:calibri">{{$alumno->first()->primer_nombre.' '.$alumno->first()->segundo_nombre}}</h4>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-6">
                                <div class="form-group">
                                    <h4 class="col-sm-3 col-xs-12" style="color:#2c6aa0;font-family:calibri">Apellidos</h4>
                                    <h4 class="col-sm-9 col-xs-12" style="color:#393939;font-family:calibri">{{$alumno->first()->apellido_paterno.' '.$alumno->first()->apellido_materno}}</h4>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-6">
                                <div class="form-group">
                                    <h4 class="col-sm-3 col-xs-12" style="color:#2c6aa0;font-family:calibri">Rut</h4>
                                    <h4 class="col-sm-9 col-xs-12" style="color:#393939;font-family:calibri">{{$alumno->first()->rut}}</h4>
                                </div>
                            </div>

                            <div class="col-xs-12 col-lg-6">
                                <div class="form-group">
                                    <h4 class="col-sm-3 col-xs-12" style="color:#2c6aa0;font-family:calibri">Curso</h4>
                                    <h4 class="col-sm-9 col-xs-12" style="color:#393939;font-family:calibri">{{$alumno->first()->curso->nivel.'° '.$alumno->first()->curso->grado.' '.$alumno->first()->curso->letra}}</h4>
                                </div>
                            </div>


                            <div class="col-xs-12 col-lg-6">
                                <div class="form-group">
                                    <h4 class="col-sm-3 col-xs-12" style="color:#2c6aa0;font-family:calibri">Profesor jefe</h4>
                                    <h4 class="col-sm-9 col-xs-12" style="color:#393939;font-family:calibri">{{$alumno->first()->curso->profesor->primer_nombre.' '.$alumno->first()->curso->profesor->apellido_paterno.' '.$alumno->first()->curso->profesor->apellido_materno}}</h4>
                                </div>
                            </div> 
                            

                                                           
                    </div>

                </div>
                <div class="box-footer clearfix">

  
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="panel box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">
                        Antecedentes Certificado
                    </h3>
                </div>
                <!-- /.box-header -->
                {!!Form::model($alumno->first(),['method'=>'GET','route'=>['certificado.generarCertificado',$alumno->first()->id]])!!}
                {{ csrf_field() }}
                <div class="col-md-12">
                    <div class="row">
                            </br>
                            <div class="col-xs-12 col-lg-6">
                                <div class="form-group">
                                    <h4 class="col-sm-3 col-xs-12" style="color:#2c6aa0;font-family:calibri">Fecha emisión</h4>
                                    <h4 class="col-sm-9 col-xs-12" style="color:#393939;font-family:calibri">{{date('d/m/y')}}</h4>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-6">
                                <div class="form-group">
                                    <h4 class="col-sm-3 col-xs-12" style="color:#2c6aa0;font-family:calibri">Año</h4>
                                    <h4 class="col-sm-9 col-xs-12" style="color:#393939;font-family:calibri">{{date('Y')}}</h4>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-6">
                                <div class="form-group">
                                    <h4 class="col-sm-3 col-xs-12" style="color:#2c6aa0;font-family:calibri">Tipo</h4>
                                    <div class="col-sm-9 col-xs-12">
                                        <select class="form-control" name="tipo" required>
                                            <option value="">-- Seleccione --</option>
                                            <option value="1">Alumno Regular</option>
                                            <option value="2">Concentración de Notas</option>
                                          </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-6">
                                <div class="form-group">
                                    <h4 class="col-sm-3 col-xs-12" style="color:#2c6aa0;font-family:calibri">Semestre</h4>
                                    <div class="col-sm-9 col-xs-12">
                                        <select class="form-control" name="semestre" required>
                                            <option value="">-- Seleccione --</option>
                                            <option value="Primer">Primero</option>
                                            <option value="Segundo">Segundo</option>
                                          </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-lg-6">
                                <div class="form-group">
                                    <h4 class="col-sm-3 col-xs-12" style="color:#2c6aa0;font-family:calibri">Tipo Impresión</h4>
                                    <div class="col-sm-9 col-xs-12">
                                        <select class="form-control" name="color" required>
                                            <option value="">-- Seleccione --</option>
                                            <option value="normal">Color</option>
                                            <option value="blancoynegro">Blanco y negro</option>
                                          </select>
                                    </div>
                                </div>
                            </div>
                            <input class="hidden" name="rut" type="text" value="{{auth()->user()->rut}}">

                                        
                    </div>
                </div>

                <div class="box-footer clearfix" >
                    <ul class="pagination pagination-sm no-margin pull-left">
                    </br>
                        <button class="btn btn-app" type="submit">
                                <i class="fa fa-save" >
                                </i>
                                Descargar
                            </button>
                    </ul>

                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
    
</section>
<!-- -->



@endsection
