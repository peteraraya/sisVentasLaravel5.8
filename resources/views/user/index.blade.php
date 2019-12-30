{{-- Plantilla principal --}}
@extends('principal')

{{-- Traer contenido de la Categoria --}}
@section('contenido')

<!-- Contenido Principal -->
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb bg-gradient-dark shadow">
        <li class="breadcrumb-item active">
            <a href="/" class="text-success text-uppercase green-text ">Usuarios - SISTEMA DE COMPRAS - VENTAS</a></li>
    </ol>
    <div class="container-fluid m-0 p-2">
        <!-- Ejemplo de tabla Listado -->
        <div class="card animated bounceInLeft shadow m-0">
            <div class="card-header shadow bg-grey-soft-zipek">

                <h4 class="card-title pb-2">Listado de Usuarios</h4>


                <button class="btn btn-dark bg-gradient-dark btn-md shadow-lg" type="button" data-toggle="modal" data-target="#abrirmodal">
                    <i class="fa fa-plus"></i>Agregar Usuario
                </button>
            </div>
            <div class="card-body bg-gradient-light">
                <div class="form-group row">
                    <div class="col-md-6">
                        {!!Form::open(array('url'=>'user','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
                        <div class="input-group">

                            <input type="text" name="buscarTexto" class="form-control text-muted" placeholder="Buscar por nombre,descripcion etc ...." value="{{$buscarTexto}}">
                            <button type="submit" class="btn btn-primary bg-gradient-primary shadow p-2"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
                <div class="table-responsive">
                <table class="table table-bordered bg-table-ventas-zipek shadow">

                    <thead>
                        <tr class="bg-primary-zipek text-center align-middle">

                            <th>Nombre</th>
                            <th>Documento<br>
                                N° Número</th>
                            <th>Dirección</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Usuario</th>
                            <th>Rol</th>
                            <th>Imagen</th>
                            <th>Estado</th>
                            <th>Editar</th>
                            <th>Cambiar Estado</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($usuarios as $user)

                        <tr class=" align-content-center text-center text-truncate align-middle">

                             <td class="align-middle">{{$user->nombre}}</td>
                             <td class="align-middle">{{$user->tipo_documento}} : 
                                                      {{$user->num_documento}}
                            </td>
                             <td class="align-middle">{{$user->direccion}}</td>
                             <td class="align-middle">{{$user->telefono}}</td>
                             <td class="align-middle">{{$user->email}}</td>
                             <td class="align-middle">{{$user->usuario}}</td>
                             <td class="align-middle">{{$user->rol}}</td>

                             <td class="align-middle">
                                <img src="{{asset('storage/img/usuario/'.$user->imagen)}}" id="imagen1" alt="{{$user->nombre}}" class="img-responsive" width="100px" height="100px">
                            </td>

                            <td class="align-middle">

                                @if($user->condicion=="1")
                                <button type="button" class="btn btn-success bg-gradient-success btn-sm">

                                    <i class="fa fa-check"></i> Activo
                                </button>

                                @else

                                <button type="button" class="btn btn-danger bg-gradient-danger btn-sm">

                                    <i class="fa fa-check"></i> Desactivado
                                </button>

                                @endif

                            </td>

                            <td class="align-middle">
                                <button type="button" class="btn btn-info bg-gradient-info btn-sm " data-id_usuario="{{$user->id}}" data-nombre="{{$user->nombre}}" data-tipo_documento="{{$user->tipo_documento}}" data-num_documento="{{$user->num_documento}}" data-direccion="{{$user->direccion}}" data-telefono="{{$user->telefono}}" data-email="{{$user->email}}" data-id_rol="{{$user->idrol}}" data-usuario="{{$user->usuario}}" data-imagen1="{{$user->imagen}}" data-toggle="modal" data-target="#abrirmodalEditar">
                                    <i class="fa fa-edit"></i> Editar
                                </button> &nbsp;
                            </td>


                            <td class="align-middle">

                                @if($user->condicion)

                                <button type="button" class="btn btn-danger bg-gradient-danger btn-sm" data-id_usuario="{{$user->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                    <i class="fa fa-times "></i> Desactivar
                                </button>

                                @else

                                <button type="button" class="btn btn-success bg-gradient-success btn-sm" data-id_usuario="{{$user->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                    <i class="fa fa-lock "></i> Activar
                                </button>

                                @endif

                            </td>


                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
                {{$usuarios->render()}}

            </div>

        </div>
    </div>
    <!-- Fin ejemplo de tabla Listado -->
    </div>
    <!--Inicio del modal agregar-->
    <div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">


                    <form action="{{route('user.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

                        @csrf
                        <!-- {{ csrf_field() }} -->


                        @include('user.form')

                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal-->

    <!--Inicio del modal actualizar-->
    <div class="modal fade" id="abrirmodalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Actualizar usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">


                    <form action="{{route('user.update','test')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

                        {{method_field('patch')}}
                        @csrf
                        <!-- {{ csrf_field() }} -->


                        <input type="hidden" id="id_usuario" name="id_usuario" value="">

                        @include('user.form')

                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal-->


    <!-- Inicio del modal Cambiar Estado del usuario -->
    <div class="modal fade" id="cambiarEstado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-danger" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cambiar Estado del Usuario</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('user.destroy','test')}}" method="POST">
                        {{method_field('delete')}}
                        {{csrf_field()}}

                        <input type="hidden" id="id_usuario" name="id_usuario" value="">

                        <p>Estas seguro de cambiar el estado?</p>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i>Cerrar</button>
                            <button type="submit" class="btn btn-success"><i class="fa fa-lock fa-2x"></i>Aceptar</button>
                        </div>

                    </form>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- Fin del modal Eliminar -->



</main>


@endsection