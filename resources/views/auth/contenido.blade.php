<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Sistema Ventas Laravel Vue Js- webtraining-it.com">
    <meta name="keyword" content="Sistema ventas Laravel Vue Js, Sistema compras Laravel Vue Js">


    <title>Proyecto</title>

    <!-- Icons -->
    <script src="https://kit.fontawesome.com/f89c29ca65.js" crossorigin="anonymous"></script>
    <link href="{{asset('css/simple-line-icons.min.css')}}" rel="stylesheet">
    <!-- libs -->
    <link href="{{asset('css/libs/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/background-gradient.css')}}" rel="stylesheet">
    <link href="{{asset('css/libs/materialize.css')}}" rel="stylesheet">
    <!-- Main styles for this application -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/bootstrap441/bootstrap.min.css')}}" rel="stylesheet">

</head>

<body class="app flex-row align-items-center bg-gradient-dark">
    <div class="container">
        @yield('login')
    </div>

    <!-- Bootstrap and necessary plugins -->
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/Popper/popper.min.js')}}"></script>

    <script src="{{asset('js/bootstrap441/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/pace.min.js')}}"></script>


    <!-- Plugins and scripts required by all views -->
    <script src="{{asset('js/Chart.min.js')}}"></script>
    <!-- GenesisUI main scripts -->
    <script src="{{asset('js/template.js')}}"></script>
</body>

</html>