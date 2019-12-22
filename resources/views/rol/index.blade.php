@extends('principal')
@section('contenido')
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb bg-gradient-dark">
        <li class="breadcrumb-item active">
            <a href="/" class="text-uppercase text-success">
                Roles - SISTEMA DE COMPRAS - VENTAS
            </a>
        </li>
    </ol>
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card shadow-lg">
            <div class="card-header bg-grey-soft-zipek shadow">

                <h4 class="card-title pb-0">Listado de Roles</h4>
            </div>
            <div class="card-body bg-light shadow">
                <div class="form-group row">
                    <div class="col-md-6">
                        {!!Form::open(array('url'=>'rol','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
                        <div class="input-group">

                            <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="{{$buscarTexto}}">
                            <button type="submit" class="btn btn-primary  bg-primary-zipek "><i class="fa fa-search"></i> Buscar</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
                <table class="table table-bordered table-striped table-sm table-dark shadow bg-gradient-dark">
                    <thead>
                        <tr class="bg-primary-zipek text-uppercase text-center text-truncate">

                            <th>Rol</th>
                            <th>Descripción</th>
                            <th>Estado</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($roles as $rol)

                        <tr class="text-center">

                            <td>{{$rol->nombre}}</td>
                            <td>{{$rol->descripcion}}</td>
                            <td>

                                @if($rol->condicion=="1")

                                <button type="button" class="btn btn-success bg-gradient-success btn-md">

                                    <i class="fa fa-check fa-2x"></i> Activo
                                </button>

                                @else
                                <button type="button" class="btn btn-danger bg-gradient-danger btn-md">

                                    <i class="fa fa-check fa-2x"></i> Desactivado
                                </button>

                                @endif


                            </td>


                        </tr>

                        @endforeach

                    </tbody>
                </table>

                {{$roles->render()}}

            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>


</main>

@endsection