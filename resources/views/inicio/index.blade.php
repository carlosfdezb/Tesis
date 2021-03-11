@extends('layouts.index')

@section('title', 'Noticias')  

@section('content')

<section class="content-header">
    <h1>
        Noticias
        <small>
            CEISP 
        </small>
        @if(auth()->user()->rol == '0' or auth()->user()->rol == '2' or auth()->user()->rol == '5')
        <button type="button" class="btn bg-olive btn-flat margin" data-target="#modal_add" data-toggle="modal" ><i class="fa fa-plus"></i> Nueva noticia</button>
        <small class="help-block"><i class="fa fa-exclamation-circle"></i> Para eliminar alguna noticia, solamente pinche sobre ella</small> 
        @endif
        @include('inicio.modal_add')
    </h1>
    <ol class="breadcrumb">

        <li>
            <a href=""{{ action('NoticiasController@index') }}"">
                <i class="fa fa-home">
                </i>
                Inicio
            </a>
        </li>

    </ol>
</section>


<section class="content container-fluid">
	@include('alerts.success')
            @include('alerts.warning')
            @include('alerts.danger')
	<div class="row">
		<div class="col-md-9">
       
  
            <!-- /.box-header -->
            <div class="box-body">
              <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <?php $i=0?>
                  @foreach($principal as $principales)
                    <li data-target="#carousel-example-generic" data-slide-to="{{$i++}}" class=""></li>
                    @if($i == 10)
                        @break
                      @endif
                  @endforeach
                </ol>
                <div class="carousel-inner">
                  <?php $i=0 ?>
                  @foreach($principal as $principales)
                    
                    @if($i == 0)
                    
                    <div class="item active">
                    @else

                    <div class="item">

                    @endif
                    <?php $i++ ?>
                   

                    <a  @if(auth()->user()->rol == "0" or auth()->user()->rol == '2' or auth()->user()->rol == '5') data-target="#modal_delete-{{$principales->id}}" data-toggle="modal" @else href="{{$principales->url}}" target="_blank" @endif >
                    	
                      @if($principales->imagen != NULL)
                        <img src="{{ asset('noticias/'.$principales->imagen) }}"  alt="First slide" style="width: 1300px;">
                      @else
                        <img src="{{ asset('noticias/sin-imagen.jpg') }}"  alt="First slide" style="width: 1300px;">
                      @endif
                        </a>
                      <div class="carousel-caption">

                        <h2>{{$principales->titulo}}</h2>
                        {{$principales->descripcion}}
                      </div>
                    </div>
                      @if($i == 10)
                        @break
                      @endif
                    @include('inicio.modal_delete')
                  @endforeach
                </div>
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                  <span class="fa fa-angle-left"></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                  <span class="fa fa-angle-right"></span>
                </a>
              </div>
            </div>
            <!-- /.box-body -->
        
        </div>
        <div class="col-md-3">
          <?php $i=0 ?>
          @foreach($lateral as $laterales)
            <?php $i++?>
            <a  @if(auth()->user()->rol == "0" or auth()->user()->rol == '2' or auth()->user()->rol == '5') data-target="#modal_delete2-{{$laterales->id}}" data-toggle="modal"  @else href="{{$laterales->url}}" target="_blank" @endif>
          	<div class="alert bg-light-blue disabled">
                  <h4>{{$laterales->titulo}}</h4>
                  {{$laterales->descripcion}}
                </div>
              </a>
                @if($i == 7)
                  @break
                @endif
                @include('inicio.modal_delete2')
          @endforeach
        </div>
            </div>
</section>
@endsection