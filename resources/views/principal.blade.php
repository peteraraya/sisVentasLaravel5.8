<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema Compras-Ventas con Laravel y Vue Js- webtraining-it.com">
    <meta name="keyword" content="Sistema Compras-Ventas con Laravel y Vue Js">
    <title>SisVentas Laravel</title>
    <!-- Icons -->
    <link href="{{asset('css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/simple-line-icons.min.css')}}" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
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
                    <img src="img/avatars/peter.jpg" class="img-avatar" alt="admin@bootstrapmaster.com">
                    <span class="d-md-down-none">Peter Araya </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <div class="dropdown-header text-center">
                        <strong>Cuenta</strong>
                    </div>
                    <a class="dropdown-item" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-lock"></i> Cerrar sesión</a>

                    <form id="logout-form" action="" method="POST" style="display: none;">

                    </form>
                </div>
            </li>
        </ul>
    </header>

    <div class="app-body">
        @include('plantilla.sidebar')

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
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
    <script src="{{asset('js/pace.min.js')}}"></script>
    <!-- Plugins and scripts required by all views -->
    <script src="{{asset('js/Chart.min.js')}}"></script>
    <!-- GenesisUI main scripts -->
    <script src="{{asset('js/template.js')}}"></script>
    <script>
        /*EDITAR CATEGORIA EN VENTANA MODAL*/

        $('#abrirmodalEditar').on('show.bs.modal', function(event) {

            //console.log('modal abierto');
            // Cargando la info
            var button = $(event.relatedTarget)
            var nombre_modal_editar = button.data('nombre')
            var descripcion_modal_editar = button.data('descripcion')
            var id_categoria = button.data('id_categoria')
            var modal = $(this)

            // Encuentra dentro del modal body que tenga cada uno de estos elementos
            modal.find('.modal-body #nombre').val(nombre_modal_editar);
            modal.find('.modal-body #descripcion').val(descripcion_modal_editar);
            modal.find('.modal-body #id_categoria').val(id_categoria);

        })


        /******************************************************/
        /*INICIO ventana modal para cambiar estado de Categoria*/

        $('#cambiarEstado').on('show.bs.modal', function(event) {

            //console.log('modal abierto');

            var button = $(event.relatedTarget);
            var id_categoria = button.data('id_categoria');
            var modal = $(this);

            modal.find('.modal-body #id_categoria').val(id_categoria);
        })

        /*FIN ventana modal para cambiar estado de la categoria*/

        /*EDITAR PRODUCTO EN VENTANA MODAL*/
        $('#abrirmodalEditar').on('show.bs.modal', function(event) {

            //console.log('modal abierto');
            /*el button.data es lo que está en el button de editar*/
            var button = $(event.relatedTarget)
            /*este id_categoria_modal_editar selecciona la categoria*/
            var id_categoria_modal_editar = button.data('id_categoria')
            var nombre_modal_editar = button.data('nombre')
            var precio_venta_modal_editar = button.data('precio_venta')
            var codigo_modal_editar = button.data('codigo')
            var stock_modal_editar = button.data('stock')
            //var imagen_modal_editar = button.data('imagen1')
            var id_producto = button.data('id_producto')
            var modal = $(this)
            // modal.find('.modal-title').text('New message to ' + recipient)
            /*los # son los id que se encuentran en el formulario*/
            modal.find('.modal-body #id').val(id_categoria_modal_editar);
            modal.find('.modal-body #nombre').val(nombre_modal_editar);
            modal.find('.modal-body #precio_venta').val(precio_venta_modal_editar);
            modal.find('.modal-body #codigo').val(codigo_modal_editar);
            modal.find('.modal-body #stock').val(stock_modal_editar);
            // modal.find('.modal-body #subirImagen').html("<img src="img/producto/imagen_modal_editar">");
            modal.find('.modal-body #id_producto').val(id_producto);
        })
    </script>
</body>

</html>