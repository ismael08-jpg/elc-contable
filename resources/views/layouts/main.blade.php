<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png')}}">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png')}}">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('assets/css/material-dashboard.css?v=2.1.1')}}" rel="stylesheet" />
    <!-- CSS Personalizado -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}"> --}}

    <!--Bootstrap-->
    {{-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous"> --}}
    
    <!-- DataTables -->
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">

    <!--TOASTR-->
    <link rel="stylesheet" href="{{ asset('assets/toastr/toastr.css') }}">
    @yield('styles')
    
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.page_templates.auth')
        @endauth
        @guest()
            @include('layouts.page_templates.guest')
        @endguest
        @if (auth()->check())
        <div class="fixed-plugin">

          <div class="dropdown show-dropdown">

            <a href="#" data-toggle="dropdown">
              <i class="fa fa-cog fa-2x"> </i>
            </a>

            <ul class="dropdown-menu">
              <li class="header-title"> Sidebar Filters</li>
              <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger active-color">
                  <div class="badge-colors ml-auto mr-auto">
                    <span class="badge filter badge-purple " data-color="purple"></span>
                    <span class="badge filter badge-azure" data-color="azure"></span>
                    <span class="badge filter badge-green" data-color="green"></span>
                    <span class="badge filter badge-warning active" data-color="orange"></span>
                    <span class="badge filter badge-danger" data-color="danger"></span>
                    <span class="badge filter badge-rose" data-color="rose"></span>
                  </div>
                  <div class="clearfix"></div>
                </a>
              </li>
              <li class="header-title">Images</li>
              <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                  <img src="{{ asset('assets/img/sidebar-1.jpg')}}" alt="">
                </a>
              </li>
              <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                  <img src="{{ asset('assets/img/sidebar-2.jpg')}}" alt="">
                </a>
              </li>
              <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                  <img src="{{ asset('assets/img/sidebar-3.jpg')}}" alt="">
                </a>
              </li>
              <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                  <img src="{{ asset('assets/img/sidebar-4.jpg')}}" alt="">
                </a>
              </li>
              
             
              
            </ul>
            
          </div>
        </div>

        @endif
        <!--   Core JS Files   -->
        
        <script src="{{ asset('assets/js/core/jquery.min.js')}}"></script>
        <script src="{{ asset('assets/js/core/popper.min.js')}}"></script>
        <script src="{{ asset('assets/js/core/bootstrap-material-design.min.js')}}"></script>
        <script src="{{ asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
        <!-- Plugin for the momentJs  -->
        <script src="{{ asset('assets/js/plugins/moment.min.js')}}"></script>
        <!--  Plugin for Sweet Alert -->
        {{-- <script src="{{ asset('assets/js/plugins/sweetalert2.js')}}"></script> --}}
        <!-- Forms Validations Plugin -->
        <script src="{{ asset('assets/js/plugins/jquery.validate.min.js')}}"></script>
        <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
        <script src="{{ asset('assets/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
        <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
        <script src="{{ asset('assets/js/plugins/bootstrap-selectpicker.js')}}"></script>
        <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
        <script src="{{ asset('assets/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
        <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
        {{-- <script src="{{ asset('assets/js/plugins/jquery.dataTables.min.js')}}"></script> --}}
        <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
        <script src="{{ asset('assets/js/plugins/bootstrap-tagsinput.js')}}"></script>
        <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
        {{-- <script src="{{ asset('assets/js/plugins/jasny-bootstrap.min.js')}}"></script> --}}
        <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
        {{-- <script src="{{ asset('assets/js/plugins/fullcalendar.min.js')}}"></script> --}}
        <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
        {{-- <script src="{{ asset('assets/js/plugins/jquery-jvectormap.js')}}"></script> --}}
        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        {{-- <script src="{{ asset('assets/js/plugins/nouislider.min.js')}}"></script> --}}
        <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
        <!-- Library for adding dinamically elements -->
        <script src="{{ asset('assets/js/plugins/arrive.min.js')}}"></script>
      
        <!-- Chartist JS -->
        <script src="{{ asset('assets/js/plugins/chartist.min.js')}}"></script>
        <!--  Notifications Plugin    -->
        {{-- <script src="{{ asset('assets/js/plugins/bootstrap-notify.js')}}"></script> --}}
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset('assets/js/material-dashboard.js?v=2.1.1')}}" type="text/javascript"></script>
        <!-- Material Dashboard DEMO methods, don't include it in your project! -->
        {{-- <script src="{{ asset('demo/demo.js')}}"></script> --}}
        <script src="{{ asset('assets/js/settings.js')}}"></script>
        
        <!--Toastr-->
    <script src="{{ asset('assets/toastr/toastr.min.js') }}"></script>
    <!--DataTables-->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
        @stack('js')
    </body>
</html>