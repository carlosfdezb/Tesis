<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
    <head>
        <meta charset="utf-8">
            <meta content="IE=edge" http-equiv="X-UA-Compatible">
                <title>
                    Intranet | @yield('title')
                </title>
                  <link rel="icon" href="{{asset('dist/img/logo chico.png')}}">
                <!-- Tell the browser to be responsive to screen width -->
                <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
                    <link href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
                        <!-- Font Awesome -->
                        <link href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
                            <!-- Ionicons -->
                            <link href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}" rel="stylesheet">
                                <!-- Theme style -->
                                <link href="{{asset('dist/css/AdminLTE.min.css')}}" rel="stylesheet">
                                    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
                                    <link href="{{asset('dist/css/skins/skin-blue.min.css')}}" rel="stylesheet">
                                        <script crossorigin="anonymous" src="https://unpkg.com/jspdf@1.5.3/dist/jspdf.min.js">
                                        </script>
                                        <script crossorigin="anonymous" src="https://unpkg.com/jspdf-autotable@3.5.6/dist/jspdf.plugin.autotable.js">
                                        </script>
                                        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
                                        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
                                        <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
                                        <!-- Google Font -->
                                        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic" rel="stylesheet">
                                        </link>
                                    </link>
                                </link>
                            </link>
                        </link>
                    </link>
                </meta>
            </meta>
        </meta>
    </head>
    <!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->


    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <!-- Main Header -->
            <header class="main-header">
                <!-- Logo -->
                <a class="logo" href="{{url('/inicio')}}">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini">
                        <img alt="User Image" src="{{asset('dist/img/logo chico.png')}}" style="height:35px;vertical-align: middle;"></img>
                    </span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg">
                        <img alt="User Image" src="{{asset('dist/img/logocompleto.png')}}" style="height:45px;vertical-align: middle;"></img>      
                    </span>
                </a>
                <!-- Header Navbar -->
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a class="sidebar-toggle" data-toggle="push-menu" href="#" role="button">
                        <span class="sr-only">
                            Toggle navigation
                        </span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">

                        <ul class="nav navbar-nav">
                            @if(auth()->user()->rol == "10")
                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                  <i class="fa fa-bell-o"></i>
                                  <span class="label label-danger">10</span>
                                </a>
                                <ul class="dropdown-menu">
                                  <li class="header">Tiene N notificaciones</li>
                                  <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu">
                                      <li>
                                        <a href="#">
                                          <i class="fa fa-warning text-yellow"></i> 5 new members joined today
                                        </a>
                                      </li>
                                    </ul>
                                  </li>
                                  
                                </ul>
                              </li>
                            @endif
                            <!-- User Account Menu -->
                            <li class="dropdown user user-menu">
                                <!-- Menu Toggle Button -->
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <!-- The user image in the navbar-->
                                    <img alt="User Image" class="user-image" src="{{asset('dist/img/user.png')}}">
                                        <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                        <span class="hidden-xs">
                                            {{auth()->user()->name}}
                                        </span>
                                    </img>
                                </a>
                                <ul class="dropdown-menu">
                                    <!-- The user image in the menu -->

                                    <li class="user-header">
                                        <img alt="User Image" class="img-circle" src="{{asset('dist/img/user.png')}}">
                                            <p>
                                                {{auth()->user()->name}}
                                                <small>
                                                    {{auth()->user()->rut}}
                                                </small>
                                                <small>
                                                    {{auth()->user()->email}}
                                                </small>
                                            </p>
                                        </img>
                                    </li>
                                    <!-- Menu Footer-->

                                    <li class="user-footer">
                                        <div class="row">
                                            <div class="col-md-12">
                                            <a class="btn btn-default btn-flat btn-block" href="#" data-target="#modalEditDatos-{{auth()->user()->id}}" data-toggle="modal">
                                                Configuración
                                            </a>

                                            <a class="btn btn-default btn-flat btn-block" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                {{ __('Salir') }}
                                            </a>
                                            <form action="{{ route('logout') }}" id="logout-form" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                        </div>

                                        </div>

                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
             
                    <!-- Sidebar Menu -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="header">
                            @if(auth()->user()->rol == "0")
                                INTRANET - ADMINISTRADOR
                            @endif
                            @if(auth()->user()->rol == "2")
                                INTRANET - ADMINISTRATIVO
                            @endif
                            @if(auth()->user()->rol == "3")
                                INTRANET - PROFESOR
                            @endif
                            @if(auth()->user()->rol == "4")
                                INTRANET - ALUMNO
                            @endif
                            @if(auth()->user()->rol == "5")
                                INTRANET - UTP
                            @endif
                            @if(auth()->user()->rol == "6")
                                INTRANET - ESPECIALISTA
                            @endif

                        </li>
                        <!-- Optionally, you can add icons to the links -->
                        <li class="{{ request()->is('inicio') ? 'active' : '' }}">
                            <a href="{{ action('HomeController@index') }}">
                                <i class="fa fa-home">
                                </i>
                                <span>
                                    Inicio
                                </span>
                            </a>
                        </li>
                         <!-- MENÚ PARA ROL DE ALUMNOS -->
                        
                        <li class="{{ request()->is('docs') ? 'active' : '' }}">
                            <a href="{{ url('/docs') }}">
                                <i class="fa  fa-book">
                                </i>
                                <span>
                                    Manual de Usuario
                                </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('documentos_institucionales') ? 'active' : '' }}">
                            <a href="{{ url('/documentos_institucionales')   }}">
                                <i class="fa fa-archive">
                                </i>
                                <span>
                                    Documentos Institucionales
                                </span>
                            </a>
                        </li>

                        <!-- ALUMNOS -->
                        @if(auth()->user()->rol == '4')
                        <li class="{{ request()->is('alumnos') ? 'active' : '' }}">
                            <a href="{{ action('AlumnoController@index') }}">
                                <i class="fa fa-inbox">
                                </i>
                                <span>
                                    Mis Asignaturas
                                </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('modulo_materiales/alumno/index') ? 'active' : '' }}">
                            <a href="{{ action('MaterialProfesorController@index_alumno') }}">
                                <i class="fa fa-list">
                                </i>
                                <span>
                                    Materiales
                                </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('calendario') ? 'active' : '' }}">
                            <a href="{{ action('CalendarioController@index') }}">
                                <i class="fa fa-calendar-o">
                                </i>
                                <span>
                                    Calendario Académico
                                </span>
                            </a>
                        </li>
                        
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-folder-open">
                                </i>
                                <span>
                                    Documentos
                                </span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right">
                                    </i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="{{ request()->is('nuevo-certificado') ? 'active' : '' }}">
                                    <a href="{{ action('CertificadoController@certificado') }}">
                                        Certificados
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ action('LicenciaMedicaController@index_licencias_alumno') }}">
                                        Licencias Médicas
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        <!-- PROFESORES -->
                        @if(auth()->user()->rol == '3')
                        <li class="{{ request()->is('calendario/profesor/index') ? 'active' : '' }}">
                            <a href="{{ action('CalendarioController@indexProfesor') }}">
                                <i class="fa fa-calendar-o">
                                </i>
                                <span>
                                    Calendario Evaluaciones
                                </span>
                            </a>
                        </li>
                        <?php $profesor=DB::table('profesors')->where('rut',auth()->user()->rut)->first()?>
                        @if(DB::table('cursos')->where('id_profesor',$profesor->id)->count() > 0)
                        <?php $curso= DB::table('cursos')->where('id_profesor',$profesor->id)->first() ?>
                        <li class="{{ request()->is('cursos/'.$curso->id.'/detalle') ? 'active' : '' }}">
                            <a href="{{ url('cursos/'.$curso->id.'/detalle') }}">
                                <i class="fa fa-coffee">
                                </i>
                                <span>
                                    Jefatura De Curso
                                </span>
                            </a>
                        </li>
                        @endif
                        <li class="{{ request()->is('mis-asignaturas') ? 'active' : '' }}">
                            <a href="{{ action('ProfesorController@asignaturas') }}">
                                <i class="fa fa-list">
                                </i>
                                <span>
                                    Mis Asignaturas
                                </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('modulo_materiales/profesor/index') ? 'active' : '' }}">
                            <a href="{{ action('MaterialProfesorController@index_profesor')}}" >
                                <i class="fa fa-inbox">
                                </i>
                                <span>
                                    Materiales
                                </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('planificaciones') ? 'active' : '' }}">
                            <a href="{{ url('/planificaciones') }}">
                                <i class="fa fa-file">
                                </i>
                                <span>
                                    Planificaciones
                                </span>
                            </a>
                        </li>
                        @endif

                        <!-- UTP -->
                        @if(auth()->user()->rol == "5")
                        <li class="treeview">
                            <a href="#">
                                <i class="fa fa-folder-open">
                                </i>
                                <span>
                                    Administración PIE
                                </span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right">
                                    </i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li class="{{ request()->is('especialistas') ? 'active' : '' }}">
                                    <a href="{{ action('EspecialistaController@index') }}">
                                        Especialistas
                                    </a>
                                </li>
                                <li class="{{ request()->is('modulo_pie/alumnos/index') ? 'active' : '' }}">
                                    <a href="{{ action('AlumnoPieController@index_alumnos') }}">
                                        Alumnos
                                    </a>
                                </li>
                                <li class="{{ request()->is('modulo_pie/alumnos_pie/index') ? 'active' : '' }}">
                                    <a href="{{ action('AlumnoPieController@index_alumnos_pie') }}">
                                        Alumnos PIE
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="{{ request()->is('cursos') ? 'active' : '' }}">
                            <a href="{{ url('/cursos') }}">
                                <i class="fa fa-bookmark ">
                                </i>
                                <span>
                                    Cursos
                                </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('profesores') ? 'active' : '' }}">
                            <a href="{{ url('/profesores') }}">
                                <i class="fa fa-users">
                                </i>
                                <span>
                                    Profesores
                                </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('planificaciones') ? 'active' : '' }}">
                            <a href="{{ url('/planificaciones') }}">
                                <i class="fa fa-file">
                                </i>
                                <span>
                                    Planificaciones
                                </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('modulo_materiales/administrador/index') ? 'active' : '' }}">
                            <a href="{{ action('MaterialProfesorController@index_administrador') }}">
                                <i class="fa fa-inbox">
                                </i>
                                <span>
                                    Materiales
                                </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('licencias_medicas/administrador/index') ? 'active' : '' }}">
                            <a href="{{ action('LicenciaMedicaController@index_administrador') }}">
                                <i class="fa fa-ambulance">
                                </i>
                                <span>
                                    Licencias Médicas
                                </span>
                            </a>
                        </li>
                        @endif


                        <!-- ADMINISTRATIVO -->
                        @if(auth()->user()->rol == "2")

                            <li class="{{ request()->is('certificado/index') ? 'active' : '' }}">
                            <a href="{{ url('/certificado') }}">
                                <i class="fa  fa-file">
                                </i>
                                <span>
                                    Certificados
                                </span>
                            </a>
                        </li>

                        @endif


                        <!-- ESPECIALISTA -->
                        @if(auth()->user()->rol == "6")

                        <li class="{{ request()->is('modulo_pie/alumnos_pie/index') ? 'active' : '' }}">
                            <a href="{{ action('AlumnoPieController@index_alumnos_pie') }}">
                                <i class="fa fa-puzzle-piece">
                                </i>
                                <span>
                                    Módulo PIE
                                </span>
                            </a>
                        </li>

                        @endif


                        <!-- ADMIN -->
                        @if(auth()->user()->rol == "0")
                        <li class="{{ request()->is('administrativos') ? 'active' : '' }}">
                            <a href="{{ url('/administrativos') }}">
                                <i class="fa fa-odnoklassniki">
                                </i>
                                <span>
                                    Administrativos
                                </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('cursos') ? 'active' : '' }}">
                            <a href="{{ url('/cursos') }}">
                                <i class="fa fa-bookmark ">
                                </i>
                                <span>
                                    Cursos
                                </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('profesores') ? 'active' : '' }}">
                            <a href="{{ url('/profesores') }}">
                                <i class="fa fa-users">
                                </i>
                                <span>
                                    Profesores
                                </span>
                            </a>
                        </li>
                        <li class="{{ request()->is('especialistas') ? 'active' : '' }}">
                            <a href="{{ url('/especialistas') }}">
                                <i class="fa fa-child">
                                </i>
                                <span>
                                    Especialistas
                                </span>
                            </a>
                        </li>
                        

                        @endif
                        
                    </ul>
                    <!-- /.sidebar-menu -->
                </section>
                <!-- /.sidebar -->
            </aside>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                @yield('content')
                <!-- /.content -->
                @include('inicio.modalEditDatos')
            </div>
            <!-- /.content-wrapper -->
            <!-- Main Footer -->
            <footer class="main-footer">
                <!-- To the right -->
                <!-- Default to the left -->
                <strong>
                    Copyright © 2020
                    <a href="#">
                        Colegio Instituto San Pedro
                    </a>
                    .
                </strong>
                Todos los derechos reservados.
            </footer>
           
            <div class="control-sidebar-bg">
            </div>
        </div>
        <!-- ./wrapper -->
        <!-- REQUIRED JS SCRIPTS -->
        <!-- jQuery 3 -->
        <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}">
        </script>
        <!-- Bootstrap 3.3.7 -->
        <script src="{{asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}">
        </script>
        <!-- AdminLTE App -->
        <script src="{{asset('dist/js/adminlte.min.js')}}">
        </script>
        <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
    </body>
</html>