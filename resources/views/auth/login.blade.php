@extends('layouts.app')

@section('content')
<div class="container">
    <img alt="User Image" src="{{asset('dist/img/normal.png')}}" style="height:200px;vertical-align: middle;" class="center"></img>    </br>
           
             <style type="text/css">
                            .center {
                                  display: block;
                                  margin-left: auto;
                                  margin-right: auto;
                          
                                }
                </style>
    <div class="row justify-content-center">

        <div class="col-md-4">
            
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">  
                        @csrf
                        <div class="form-group">
                            <label for="email" class="col-md-12 col-form-label">{{ __('Correo electrónico') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-12 col-form-label">{{ __('Contraseña') }}</label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-1 ">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuérdame') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary btn-block">
                                    {{ __('Iniciar sesión') }}
                                </button>

                                @if (Route::has('register'))
                                    <a class="btn btn-link" href="{{ route('register') }}">
                                    {{ __('No tienes cuenta? regístrate.') }}
                                    </a>
                                @endif
                          
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
