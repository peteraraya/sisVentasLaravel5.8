@extends('principal')
@section('contenido')
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb bg-dark shadow">
        <li class="breadcrumb-item active">
            <a href="/" class="text-success text-uppercase">
                CLIENTES - SISTEMA DE COMPRAS - VENTAS
            </a>
        </li>
    </ol>
    <div class="container-fluid">
        <!-- Ejemplo de tabla Listado -->
        <div class="card animated bounceInLeft shadow">
            <div class="card-header bg-grey-soft-zipek shadow">

                <h4 class="card-title pb-2">Listado de Clientes</h4>

                    <button class="btn btn-dark bg-gradient-dark btn-md shadow-lg" type="button" data-toggle="modal" data-target="#abrirmodal">
                        <i class="fa fa-plus"></i>Agregar Cliente
                    </button>
            </div>
            <div class="card-body bg-light table-responsive">
                <div class="form-group row">
                    <div class="col-md-6">
                        {!!Form::open(array('url'=>'cliente','method'=>'GET','autocomplete'=>'off','role'=>'search'))!!}
                        <div class="input-group">

                            <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="{{$buscarTexto}}">
                            <button type="submit" class="btn btn-primary bg-gradient-primary"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
                <table class="table table-bordered bg-table-ventas-zipek table-dark table-sm shadow">
                    <thead>
                        <tr class="bg-gradient-dark text-center text-uppercase text-truncate">

                            <th>Cliente</th>
                            <th>Tipo de Documento</th>
                            <th>N° Documento</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Dirección</th>
                            <th>Editar</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($clientes as $client)

                        <tr class=" text-justify text-center">

                            <td class="align-middle">{{$client->nombre}}</td>
                            <td class="align-middle">{{$client->tipo_documento}}</td>
                            <td class="align-middle">{{$client->num_documento}}</td>
                            <td class="align-middle">{{$client->telefono}}</td>
                            <td class="align-middle">{{$client->email}}</td>
                            <td class="align-middle">{{$client->direccion}}</td>

                            <td class="align-middle">
                                <button type="button" class="btn btn-info bg-gradient-info btn-md" data-id_cliente="{{$client->id}}" data-nombre="{{$client->nombre}}" data-tipo_documento="{{$client->tipo_documento}}" data-num_documento="{{$client->num_documento}}" data-direccion="{{$client->direccion}}" data-telefono="{{$client->telefono}}" data-email="{{$client->email}}" data-toggle="modal" data-target="#abrirmodalEditar">
                                    <i class="fas fa-edit "></i> Editar
                                </button> 
                            </td>



                        </tr>

                        @endforeach

                    </tbody>
                </table>

                {{$clientes->render()}}

            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>
    <!--Inicio del modal agregar-->
    <div class="modal fade" id="abrirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-primary modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header ">
                    <h4 class="modal-title">Agregar cliente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">


                    <form action="{{route('cliente.store')}}" method="post" class="form-horizontal">

                        <!-- @csrf -->
                        {{ csrf_field() }}

                        @include('cliente.form')

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
                    <h4 class="modal-title">Actualizar cliente</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">


                    <form action="{{route('cliente.update','test')}}" method="post" class="form-horizontal">

                        {{method_field('patch')}}
                        <!-- @csrf -->
                        {{ csrf_field()}}

                        <input type="hidden" id="id_cliente" name="id_cliente" value="">
                        @include('cliente.form')

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