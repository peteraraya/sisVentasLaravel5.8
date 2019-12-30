@extends('principal')
@section('contenido')
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb bg-dark shadow">
        <li class="breadcrumb-item active">
            <a href="/" class="text-success text-uppercase">
                PRODUCTO - SISTEMA DE COMPRAS - VENTAS
            </a>
        </li>
    </ol>
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card animated bounceInLeft ">
            <div class="card-header shadow bg-grey-soft-zipek">

                <h4 class="card-title pb-2">Listado de Productos</h4>

                <button class="btn btn btn-dark bg-gradient-dark btn-md shadow" type="button" data-toggle="modal" data-target="#abrirmodal">
                    <i class="fas fa-plus"></i>Agregar Producto
                </button>

                <a href="{{url('listarProductoPdf')}}" target="_blank">
                            <button type="button" class="btn btn-success bg-gradient-success btn-md shadow">
                                <i class="fas fa-file-pdf"></i> Reporte PDF
                                
                                
                            </button>

                        </a>


            </div>
            <div class="card-body bg-light">
                <div class="form-group row">
                    <div class="col-md-6">
                        {!!Form::open(array('url'=>'producto','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
                        <div class="input-group">

                            <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="{{$buscarTexto}}">
                            <button type="submit" class="btn btn-primary bg-gradient-primary"><i class="fas fa-search"></i> Buscar</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
                <div class="table-responsive-md">
                <table class="table table-bordered bg-table-ventas-zipek table-sm shadow">
                    <thead>
                        <tr class="bg-gradient-dark text-uppercase text-center text-truncate align-middle">

                            <th>Categoria</th>
                            <th>Producto</th>
                            <th>Codigo</th>
                            <th>Precio Venta<sub>(CLP)</sub>
                            <th>Stock</th>
                            <th>Imagen</th>
                            <th>Estado</th>
                            <th>Editar</th>
                            <th>Cambiar Estado</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($productos as $prod)

                        <tr class="text-center">


                            <td class="align-middle">{{$prod->categoria}}</td>
                            <td class="align-middle">{{$prod->nombre}}</td>
                            <td class="align-middle">{{$prod->codigo}}</td>
                            <td class="align-middle">$ {{number_format($prod->precio_venta,0, ",", ".")}}</td>
                            <td class="align-middle">{{$prod->stock}}</td>

                            <td class="align-middle">
                                <a href="{{asset('storage/img/producto/'.$prod->imagen)}}" target="_blank">
                                    <img id="imgTbl_Productos" src="{{asset('storage/img/producto/'.$prod->imagen)}}" id="imagen1" alt="{{$prod->nombre}}" class="img-responsive border-dark shadow-lg">
                                </a>

                            </td>


                            <td class="align-middle">

                                @if($prod->condicion=="1")
                                <button type="button" class="btn btn-success bg-gradient-succes bg-gradient-success btn-sm shadow">

                                    <i class="fas fa-check"></i> Activo
                                </button>

                                @else

                                <button type="button" class="btn btn-danger bg-gradient-danger bg-gradient-danger btn-sm shadow">

                                    <i class="fas fa-check"></i> Desactivado
                                </button>

                                @endif

                            </td>

                            <td class="align-middle">
                                <button type="button" class="btn btn-info bg-gradient-info btn-sm shadow" data-id_producto="{{$prod->id}}" data-id_categoria="{{$prod->idcategoria}}" data-codigo="{{$prod->codigo}}" data-stock="{{$prod->stock}}" data-nombre="{{$prod->nombre}}" data-precio_venta="{{$prod->precio_venta}}" data-toggle="modal" data-target="#abrirmodalEditar">
                                    <i class="fas fa-edit"></i> Editar
                                </button> 
                            </td>


                            <td class="align-middle">

                                @if($prod->condicion)

                                <button type="button" class="btn btn-danger btn-sm bg-gradient-danger btn-sm shadow" data-id_producto="{{$prod->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                    <i class="fas fa-times"></i> Desactivar
                                </button>

                                @else

                                <button type="button" class="btn btn-success bg-gradient-success btn-sm shadow" data-id_producto="{{$prod->id}}" data-toggle="modal" data-target="#cambiarEstado">
                                    <i class="fas fa-lock"></i> Activar
                                </button>

                                @endif

                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
                {{$productos->render()}}

            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    <!--Inicio del modal agregar-->
    <div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">


                    <form action="{{route('producto.store')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

                        @csrf
                        <!-- {{ csrf_field() }} -->

                        @include('producto.form')

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
                    <h4 class="modal-title">Actualizar producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">


                    <form action="{{route('producto.update','test')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

                        {{method_field('patch')}}

                        @csrf
                        <!-- {{ csrf_field() }} -->

                        <input type="hidden" id="id_producto" name="id_producto" value="">

                        @include('producto.form')

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
                    <h4 class="modal-title">Cambiar Estado del Producto</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">


                    <form action="{{route('producto.destroy','test')}}" method="post" class="form-horizontal" enctype="multipart/form-data">

                        {{method_field('delete')}}
                        @csrf
                        <!-- {{ csrf_field() }} -->

                        <input type="hidden" id="id_producto" name="id_producto" value="">

                        <p>Estas seguro de cambiar el estado?</p>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger bg-gradient-danger" data-dismiss="modal"><i class="fa fa-times fa-2x"></i>Cerrar</button>
                            <button type="submit" class="btn btn-success bg-gradient-success"><i class="fa fa-lock fa-2x"></i>Aceptar</button>
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