<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema Compras-Ventas con Laravel">
    <meta name="keyword" content="Sistema Compras-Ventas con Laravel y Vue Js">
    <title>SisVentas Laravel</title>
    <!-- Icons -->
    <!-- <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet"> -->
    <script src="https://kit.fontawesome.com/f89c29ca65.js" crossorigin="anonymous"></script>
    <link href="{{asset('css/simple-line-icons.min.css')}}" rel="stylesheet">
    <!-- libs -->
     <link href="{{asset('css/libs/bootstrap-select.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/background-gradient.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/materialize.css')}}" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
   <link rel="stylesheet" href="{{asset('css/bootstrap441/bootstrap.min.css')}}" rel="stylesheet">
   

</head>

<body class=" app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
    <header class="app-header navbar">
        <button class="navbar-toggler mobile-sidebar-toggler d-lg-none mr-auto" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!--PONER LOGO-->
        <!--<a class="navbar-brand" href="#"></a>-->
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item px-3">
                <a class="nav-link" href="#">Sistema de Ventas en Laravel</a>
            </li>

        </ul>
        <ul class="nav navbar-nav ml-auto">

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img src="{{asset('storage/img/usuario/'.Auth::user()->imagen)}}" class="img-avatar" class="img-avatar" alt="admin@bootstrapmaster.com">
                    <span class="d-md-down-none">{{Auth::user()->usuario}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Cuenta</strong>
                    </div>
                    <a class="dropdown-item" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-lock"></i> Cerrar sesión</a>

                    <form id="logout-form" action="{{route('logout')}}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </div>
            </li>
        </ul>
    </header>

    <div class="app-body ">

        @if(Auth::check())
        @if (Auth::user()->idrol == 1)
        @include('plantilla.sidebaradministrador')

        @elseif (Auth::user()->idrol == 2)
        @include('plantilla.sidebarvendedor')

        @elseif (Auth::user()->idrol == 3)
        @include('plantilla.sidebarcomprador')
        @else

        @endif

        @endif
        <!-- Contenido Principal -->

        @yield('contenido')

        <!-- /Fin del contenido principal -->
    </div>

    <footer class="app-footer">
        <span><a href="http://peteraraya.tk/#/home" target="_blank">PeterApp</a> &copy; 2019</span>
        <span class="ml-auto">Desarrollado por <a href="http://peteraraya.tk/#/home" target="_blank">Pedro Araya Gálvez</a></span>
    </footer>

    <!-- Bootstrap and necessary plugins -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    @stack('scripts')
    <script src="{{asset('js/Popper/popper.min.js')}}"></script>

    <script src="{{asset('js/bootstrap441/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/pace.min.js')}}"></script>
    <!-- Plugins and scripts required by all views -->
    <script src="{{asset('js/Chart.min.js')}}"></script>
    <!-- GenesisUI main scripts -->
    <script src="{{asset('js/template.js')}}"></script>
    <script src="{{asset('js/sweetalert2.all.min.js')}}"></script>
    <script src="{{asset('js/libs/bootstrap-select.min.js')}}"></script>
    <!-- Vistas -->
    <script src="{{asset('js/views/categoria.js')}}"></script>
    <script src="{{asset('js/views/producto.js')}}"></script>
    <script src="{{asset('js/views/proveedor.js')}}"></script>
    <script src="{{asset('js/views/cliente.js')}}"></script>
    <script src="{{asset('js/views/user.js')}}"></script>
    <script src="{{asset('js/views/compra.js')}}"></script>
    <script src="{{asset('js/views/venta.js')}}"></script>

    <script>
         $(function () {
            $('select').selectpicker();
        });
    </script>
</body>

</html>