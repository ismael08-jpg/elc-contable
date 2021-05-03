{{-- @extends('layouts.master')

@section('title', 'Inicio de Sesión')


@section('content')
    <div class="container-login">
        <div class="d-flex w-100 justify-content-center">
            <form method="POST" action="{{ route('login') }}" class="p-4 frm-login" id="frm-login">
                @csrf
                <div class="d-flex justify-content-between align-items-center mt-2 mb-4">
                    <div class="linea"></div>
                    <div><span class="encabezado-login">Iniciar</span></div>
                    <div class="linea"></div>
                </div>




                <div class="form-group">
                    <label for="usuario">Nombre de usuario</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" value="{{ old('usuario') }}"
                        autofocus>
                    <div class="texto-error div-error" id="error-usuario">
                        @error('usuario')
                            {{ $message }}
                        @enderror
                    </div>
                </div>



                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <div class="position-r">
                        <input type="password" id="password" name="password" class="form-control">
                        <i class="fas fa-eye-slash icono-password" id="icono-password"></i>
                    </div>
                    <div class="texto-error div-error" id="error-password">
                        @error('password')
                            {{ $message }}
                        @enderror
                    </div>
                </div>



                <div class="row justify-content-center">
                    <input type="submit" value="Acceder" class="btn btn-radius btn-azul">
                </div>
            </form>
        </div>
        <div class="row justify-content-center p-4">
            <span>&copy <span id="cr-year"></span> AS Analytics. Todos los derechos reservados.</span>
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
@endsection --}}



@extends('layouts.main', ['class' => 'off-canvas-sidebar', 'activePage' => 'login', 'title' => __('Eurolatin Centroamerica')])

@section('title', 'Login')

@section('content')
<div class="container" style="height: auto;">
  <div class="row align-items-center">
    <div class="col-md-9 ml-auto mr-auto mb-3 text-center">
      <h3>{{ __('') }} </h3>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-8 ml-auto mr-auto">
      <form class="form" method="POST" action="{{ route('login') }}">
        @csrf

        <div class="card card-login card-hidden mb-3">
          <div class="card-header card-header-primary text-center">
            <h4 class="card-title"><strong>{{ __('Login') }}</strong></h4>
            
          </div>
          <div class="card-body">
            <p class="card-description text-center">{{ __('Autentícate para acceder, con tu ') }} <strong>usuario</strong> {{ __(' y contraseña ') }}<strong>secreta</strong> </p>
            <div class="bmd-form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">email</i>
                  </span>
                </div>
                <input type="text" name="usuario" class="form-control" placeholder="{{ __('usuario') }}" value="{{ old('usuario') }}" required>
              </div>
              @if ($errors->has('usuario'))
                <div id="usuario-error" class="error text-danger pl-3" for="email" style="display: block;">
                  <strong>{{ $errors->first('usuario') }}</strong>
                </div>
              @endif
            </div>
            <div class="bmd-form-group{{ $errors->has('password') ? ' has-danger' : '' }} mt-3">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="material-icons">lock_outline</i>
                  </span>
                </div>
                <input type="password" name="password" id="password" class="form-control" placeholder="{{ __('Password') }}"  required>
              </div>
              @if ($errors->has('password'))
                <div id="password-error" class="error text-danger pl-3" for="password" style="display: block;">
                  <strong>{{ $errors->first('password') }}</strong>
                </div>
              @endif
            </div>
            
          </div>
          <div class="card-footer justify-content-center">
            <button type="submit" value="Acceder"  class="btn btn-primary btn-link btn-lg">{{ __('Continuar') }}</button>
          </div>
        </div>
      </form>
      <div class="row">

        <div class="col-6">
            
        </div>

        <div class="col-6 text-right">
            
        </div>
      </div>
    </div>
  </div>
</div>
@endsection