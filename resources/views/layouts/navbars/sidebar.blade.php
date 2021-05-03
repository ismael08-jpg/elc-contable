<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://analitics-as.com" class="simple-text logo-normal">
      {{ __('Eurolatin') }}
    </a>
  </div>

  <div class="sidebar-wrapper">
    <ul class="nav">

      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('administrador.index') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>


      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('assets') }}/img/laravel.svg"></i>
          <p>{{ __('Laravel Examples') }}
            <b class="caret"></b>
          </p>
        </a>

        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'profile' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('maestroCliente.index') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('maestroCliente.index') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('maestroCliente.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('User Management') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>

      {{-- ----------------------------------------- --}}

      <li class="nav-item{{ $activePage == 'maestro-cliente' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('maestroCliente.index') }}">
          <i class="material-icons">content_paste</i>
            <p>{{ __('Maestro Cliente') }}</p>
        </a>
      </li>


      <li class="nav-item{{ $activePage == 'maestro-proveedor' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('maestroProveedor.index') }}">
          <i class="material-icons">library_books</i>
            <p>{{ __('Maestro Proveedor') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'icons' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('maestroCliente.index') }}">
          <i class="material-icons">bubble_chart</i>
          <p>{{ __('Icons') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'map' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('maestroCliente.index') }}">
          <i class="material-icons">location_ons</i>
            <p>{{ __('Maps') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'notifications' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('maestroCliente.index') }}">
          <i class="material-icons">notifications</i>
          <p>{{ __('Notifications') }}</p>
        </a>
      </li>

      <li class="nav-item{{ $activePage == 'language' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('maestroCliente.index') }}">
          <i class="material-icons">language</i>
          <p>{{ __('RTL Support') }}</p>
        </a>
      </li>

    </ul>
  </div>

</div>
