@extends('principal')
@section('contenido')


<main class="main">

    <div class="card-body p-5 shadow bg-grey-soft-zipek">

        <h3 class="text-center">Detalle de Compra</h3>

        <hr>
        <div class="form-group row shadow bg-gradient-dark">

            <div class="col-md-4">

                <label class="form-control-label font-weight-bold" for="nombre">Proveedor</label>

                <p>{{$compra->nombre}}</p>

            </div>

            <div class="col-md-4">

                <label class="form-control-label font-weight-bold" for="documento">Documento</label>

                <p>{{$compra->tipo_identificacion}}</p>

            </div>

            <div class="col-md-4">
                <label class="form-control-label font-weight-bold" for="num_compra">Número Compra</label>

                <p>{{$compra->num_compra}}</p>
            </div>

        </div>



        <div class="form-group row border p-2">

            <h4>Detalle de Compras</h4>
            
            <div class="table-responsive col-md-12">
                <table id="detalles" class="table table-bordered table-striped table-sm shadow">
                    <thead>
                        <tr class="bg-gradient-indigo text-center">

                            <th>Producto</th>
                            <th>Precio <sub>(clp)</sub></th>
                            <th>Cantidad</th>
                            <th>SubTotal <sub>(clp)</sub></th>
                        </tr>
                    </thead>

                    <tfoot class="border-info bg-gradient-secondary">

                        <!--<th><h2>TOTAL</h2></th>
                   <th></th>
                   <th></th>
                   <th><h4 id="total">${{$compra->total}}</h4></th>-->

                        <tr class="">
                            <th colspan="3">
                                <p align="right">TOTAL:</p>
                            </th>
                            <th>
                                <p align="center">${{number_format($compra->total,0, ",", ".")}}</p>
                            </th>
                        </tr>

                        <tr class="">
                            <th colspan="3">
                                <p align="right">TOTAL IMPUESTO (19%):</p>
                            </th>
                            <th>
                                <p align="center">${{number_format($compra->total*20/100,0, ",", ".")}}</p>
                            </th>
                        </tr>

                        <tr>
                            <th colspan="3" class=" bg-gradient-info">
                                <p align="right">TOTAL PAGAR:</p>
                            </th>
                            <th class=" bg-gradient-info">
                                <p align="center">${{number_format($compra->total+($compra->total*20/100),0, ",", ".")}}</p>
                            </th>
                        </tr>

                    </tfoot>

                    <tbody>

                        @foreach($detalles as $det)

                       <tr class="text-center align-middle">
                            <td>{{$det->producto}}</td>
                            <td>${{number_format($det->precio,0, ",", ".")}}</td>
                            <td>{{$det->cantidad}}</td>
                            <td>${{number_format($det->cantidad*$det->precio,0, ",", ".")}}</td>


                        </tr>


                        @endforeach

                    </tbody>


                </table>
            </div>

        </div>


    </div>
    <!--fin del div card body-->
</main>

@endsection