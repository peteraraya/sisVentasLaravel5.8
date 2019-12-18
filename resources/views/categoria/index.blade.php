{{-- Plantilla principal --}}
@extends('principal')

{{-- Traer contenido de la Categoria --}}
@section('contenido')

<!-- Contenido Principal -->
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb bg-dark">
        <li class="breadcrumb-item active">
            <a href="/" class="text-success ">Categorías - SISTEMA DE COMPRAS - VENTAS</a></li>
    </ol>
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card">
            <div class="card-header  shadow-lg">

                <h2>Listado de Categorías</h2>

                <button class="btn btn-primary btn-md" type="button" data-toggle="modal" data-target="#abrirmodal">
                    <i class="fa fa-plus"></i><b> Categoría</b>
                </button>
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-md-6 table-responsive">
                        {!!Form::open(array('url'=>'categoria','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
                        <div class="input-group">

                            <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="{{$buscarTexto}}">
                            <button type="submit" class="btn btn-primary shadow"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr class="bg-primary text-center ">

                            <th>Categoría</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Editar</th>
                            <th>Cambiar Estado</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categorias as $cat)

                        <tr>

                            <td>{{$cat->nombre}}</td>
                            <td>{{$cat->descripcion}}</td>
                            <td class="text-center">
                                <button type="button" class="btn btn-success btn-sm shadow">

                                    <i class="fa fa-check fa-2x"></i> Activo
                                </button>

                            </td>

                            <td class="text-center">
                                <button type="button" class="btn btn-info btn-sm shadow" data-id_categoria="{{$cat->id}}" data-nombre="{{$cat->nombre}}" data-descripcion="{{$cat->descripcion}}" data-toggle="modal" data-target="#abrirmodalEditar">

                                    <i class="fa fa-edit fa-2x"></i> Editar
                                </button> &nbsp;
                            </td>

                            <td class="text-center">
                                @if($cat->condicion)

                                <button type="button" class="btn btn-danger btn-sm shadow" data-id_categoria="{{$cat->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                    <i class="fa fa-times fa-2x"></i> Desactivar
                                </button>

                                @else

                                <button type="button" class="btn btn-success btn-sm shadow" data-id_categoria="{{$cat->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                    <i class="fa fa-lock fa-2x"></i> Activar
                                </button>

                                @endif
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
                {{-- Paginación , eliminamos codigo de nav --}}
                {{$categorias->render()}}

            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    <!--Inicio del modal agregar-->
    <div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar categoría</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">


                    <form action="{{route('categoria.store')}}" method="post" class="form-horizontal">
                        <!-- evita ataques -->
                        @csrf
                        <!-- {{ csrf_field() }} -->

                        @include('categoria.form')

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
                    <h4 class="modal-title">Actualizar categoría</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">


                    <form action="{{route('categoria.update','test')}}" method="post" class="form-horizontal">

                        <!-- se utiliza cuando se va editar un registro -->
                        {{method_field('patch')}}
                        @csrf
                        <!-- {{ csrf_field() }} -->


                        <input type="hidden" id="id_categoria" name="id_categoria" value="">

                        @include('categoria.form')

                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal-->

    <!--Inicio del modal Cambiar Estado-->
    <div class="modal fade" id="cambiarEstado" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cambiar Estado de la Categoría</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">


                    <form action="{{route('categoria.destroy','test')}}" method="post" class="form-horizontal">

                        {{method_field('delete')}}
                        @csrf
                        <!-- {{ csrf_field() }} -->


                        <input type="hidden" id="id_categoria" name="id_categoria" value="">

                        <p>Estas seguro de cambiar el estado?</p>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i>Cerrar</button>
                            <button type="submit" class="btn btn-success"><i class="fa fa-lock fa-2x"></i>Aceptar</button>
                        </div>


                    </form>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!--Fin del modal-->


</main>


@endsection