@extends('principal')
@section('contenido')
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb shadow">
        <li class="breadcrumb-item active"><a href="/">PROVEEDORES - SISTEMA DE COMPRAS - VENTAS</a></li>
    </ol>
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card animated bounceInLeft shadow">
            <div class="card-header bg-grey-soft-zipek shadow">

                <h4 class="card-title pb-2">Listado de Proveedores</h4>
                    <button class="btn btn-dark bg-gradient-dark btn-md shadow" type="button" data-toggle="modal" data-target="#abrirmodal">
                        <i class="fa fa-plus"></i>Agregar Proveedor
                    </button>
            </div>
            <div class="card-body bg-light table-responsive">
                <div class="form-group row">
                    <div class="col-md-6">
                        {!!Form::open(array('url'=>'proveedor','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
                        <div class="input-group">

                            <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="{{$buscarTexto}}">
                            <button type="submit" class="btn btn-primary bg-gradient-primary"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
                <table class="table table-bordered bg-table-ventas-zipek table-sm  shadow">
                    <thead>
                        <tr class="bg-gradient-dark text-truncate  text-center">

                            <th>Proveedor</th>
                            <th>Tipo de Documento</th>
                            <th>Número Documento</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Dirección</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($proveedores as $prove)

                        <tr class="text-center">

                            <td class="align-middle">{{$prove->nombre}}</td>
                            <td class="align-middle">{{$prove->tipo_documento}}</td>
                            <td class="align-middle">{{$prove->num_documento}}</td>
                            <td class="align-middle">{{$prove->telefono}}</td>
                            <td class="align-middle">{{$prove->email}}</td>
                            <td class="align-middle">{{$prove->direccion}}</td>

                            <td class="align-middle">
                                <button type="button" class="btn btn-info bg-gradient-info btn-md" data-id_proveedor="{{$prove->id}}" data-nombre="{{$prove->nombre}}" data-tipo_documento="{{$prove->tipo_documento}}" data-num_documento="{{$prove->num_documento}}" data-direccion="{{$prove->direccion}}" data-telefono="{{$prove->telefono}}" data-email="{{$prove->email}}" data-toggle="modal" data-target="#abrirmodalEditar">
                                    <i class="fas fa-edit "></i> Editar
                                </button> &nbsp;
                            </td>

                        </tr>

                        @endforeach

                    </tbody>
                </table>

                {{$proveedores->render()}}

            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    <!--Inicio del modal agregar-->
    <div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Agregar proveedor</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">

                    <form action="{{route('proveedor.store')}}" method="post" class="form-horizontal">

                        @csrf
                        <!-- {{ csrf_field() }} -->

                        @include('proveedor.form')

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
        <div class="modal-dialog modal-primary  modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Actualizar proveedor</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">

                    <form action="{{route('proveedor.update','test')}}" method="post" class="form-horizontal">

                        {{method_field('patch')}}
                        @csrf
                        <!-- {{ csrf_field() }} -->

                        <input type="hidden" id="id_proveedor" name="id_proveedor" value="">

                        @include('proveedor.form')

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