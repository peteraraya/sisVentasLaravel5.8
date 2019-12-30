@extends('principal')
@section('contenido')
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb bg-gradient-dark shadow">
        <li class="breadcrumb-item active">
            <a href="/" class="text-success text-uppercase green-text ">Compras - SISTEMA DE COMPRAS - VENTAS</a></li>
    </ol>
    <div class="container-fluid p-2">
        <!-- Ejemplo de tabla Listado -->
        <div class="card animated bounceInLeft shadow">
            <div class="card-header bg-grey-soft-zipek">

                <h4 class="card-title pb-2">Listado de Compras</h4>

                <a href="compra/create">

                    <button class="btn btn-dark bg-gradient-dark btn-md shadow-lg" type="button" data-toggle="modal" data-target="#abrirmodal">
                        <i class="fas fa-plus"></i> Agregar Compra
                    </button>

                </a>
            </div>
            <div class="card-body bg-gradient-light">

                <div class="form-group row">
                    <div class="col-md-6">
                        {!! Form::open(array('url'=>'compra','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
                        <div class="input-group">

                            <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="{{$buscarTexto}}">
                            <button type="submit" class="btn btn-primary bg-primary-zipek"><i class="fa fa-search"></i> Buscar</button>
                        </div>
                        {{Form::close()}}
                    </div>
                </div>
                <div class="table-responsive-md">
                <table class="table table-bordered bg-table-ventas-zipek shadow">
                    <thead>
                        <tr class="bg-gradient-dark text-center  p-0 shadow">

                            <th>Detalle</th>
                            <th>Fecha Compra</th>
                            <th>N° Compra</th>
                            <th>Proveedor</th>
                            <th>Tipo de identificación</th>
                            <th>Comprador</th>
                            <th>Total<sub>(CLP)</sub></th>
                            <th>Impuesto</th>
                            <th>Estado</th>
                            <th>Cambiar Estado</th>
                            <th>Descargar Reporte</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($compras as $comp)

                         <tr class="text-center p-0 m-0">
                            <td class="align-middle">

                                <a href="{{URL::action('CompraController@show',$comp->id)}}">
                                    <button type="button" class="btn btn-info bg-gradient-info mt-1">
                                        <i class="fas fa-eye "></i> Ver
                                    </button>

                                </a>
                            </td>

                            <td class="align-middle">{{date('d-m-Y h:i:s', strtotime($comp->fecha_compra))}}</td>
                            <td class="align-middle">{{$comp->num_compra}}</td>
                            <td class="align-middle">{{$comp->proveedor}}</td>
                            <td class="align-middle">{{$comp->tipo_identificacion}}</td>
                            <td class="align-middle">{{$comp->nombre}}</td>
                            <td class="align-middle">${{number_format($comp->total,0, ",", ".")}}</td>
                            <td class="align-middle">{{$comp->impuesto}}</td>
                            <td class="align-middle">

                                @if($comp->estado=="Registrado")
                                <button type="button" class="btn btn-success">

                                    <i class="fas fa-check"></i> Registrado
                                </button>

                                @else

                                <button type="button" class="btn btn-danger bg-gradient-danger">

                                    <i class="fas fa-check"></i> Anulado
                                </button>

                                @endif

                            </td>


                            <td class="align-middle">

                                @if($comp->estado=="Registrado")

                                <button type="button" class="btn btn-danger" data-id_compra="{{$comp->id}}" data-toggle="modal" data-target="#cambiarEstadoCompra">
                                    <i class="fas fa-times"></i> Anular Compra
                                </button>

                                @else

                                <button type="button" class="btn btn-success bg-gradient-success">
                                    <i class="fas fa-lock"></i> Anulado
                                </button>

                                @endif

                            </td>

                            <td class="align-middle">

                                <a href="{{url('pdfCompra',$comp->id)}}" target="_blank">

                                    <button type="button" class="btn btn-secondary bg-gradient-secondary">

                                        <i class="fa fa-file-pdf-o"></i> Descargar PDF
                                    </button> &nbsp;

                                </a>

                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
                </div>
                {{$compras->render()}}

            </div>
        </div>
        <!-- Fin ejemplo de tabla Listado -->
    </div>


    <!-- Inicio del modal cambiar estado de compra -->
    <div class="modal fade" id="cambiarEstadoCompra" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-danger" role="document">
            <div class="modal-content shadow-sm">
                <div class="modal-header bg-gradient-danger">
                    <h4 class="modal-title">Cambiar Estado de Compra</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>

                <div class="modal-body">
                    <form action="{{route('compra.destroy','test')}}" method="POST">
                        {{method_field('delete')}}
                        {{csrf_field()}}

                        <input type="hidden" id="id_compra" name="id_compra" value="">

                        <p>Estas seguro de cambiar el estado?</p>


                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger bg-gradient-danger" data-dismiss="modal"><i class="fas fa-times"></i> Cerrar</button>
                            <button type="submit" class="btn btn-success bg-gradient-success"><i class="fas fa-lock"></i> Aceptar</button>
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