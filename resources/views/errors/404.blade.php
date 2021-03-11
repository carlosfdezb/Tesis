@extends('layouts.index')

@section('title', '404')  

@section('content')


<section class="content">
      <div class="error-page">
        <h2 class="headline text-yellow"> 404</h2>

        <div class="error-content">
        </br>
          <h3><i class="fa fa-warning text-yellow"></i> Oops! Página no encontrada</h3>

          <p>
            No pudimos o no tienes permiso para ingresar a la página ingresada.
            De todas formas, puedes <a href="{{url('/inicio')}}">volver a la página principal</a>
          </p>

        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>


@endsection