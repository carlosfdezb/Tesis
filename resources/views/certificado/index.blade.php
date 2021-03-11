@extends('layouts.index')

@section('title', 'Certificados')  

@section('content')
<!-- INDEX NOTAS -->
<section class="content-header">
    <h1>
        Listado de Certificados
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
                        Todos los certificados registrados en el sistema
                    </h3>
                </div>
                <!-- /.box-header -->
                <div class="col-md-12">
                    <div class="box-body table-responsive">
                        <div class="scrollable">
                            <table class="table table-bordered" id="my-table">
                                <tr>
                                    <th>Alumno</th>
                                    <th>Rut</th>
                                    <th>Curso</th>
                                    <th>Tipo Certificado</th>
                                    <th>Fecha Emisión</th>
                                    <th>Folio</th>

                                </tr>
                                 @foreach($certificados as $certificado)   
                                <tr>
                                    <td>{{$certificado->alumno->apellido_paterno.' '.$certificado->alumno->apellido_materno.', '.$certificado->alumno->primer_nombre.' '.$certificado->alumno->segundo_nombre}}</td>
                                    <td>{{$certificado->alumno->rut}}</td>
                                    <td>{{$certificado->alumno->curso->nivel.'° '.$certificado->alumno->curso->grado.' '.$certificado->alumno->curso->letra}}</td>
                                    <td>{{$certificado->tipo}}</td>
                                    <td>{{'Hora: '.$certificado->created_at->format('H:i, d-m-Y')}}</td>
                                    <td>{{$certificado->folio}}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
                <div class="box-footer clearfix">
                    <ul class="pagination pagination-sm no-margin pull-left">
                        <a class="btn btn-app" data-target="#modalcreate" data-toggle="modal">
                            <i class="fa fa-plus">
                            </i>
                            Certificado
                        </a>
            
                    </ul>
                    @include('certificado.modalcreate')

                </div>
            </div>
        </div>
    </div>
    
</section>

@endsection
