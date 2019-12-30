@extends('principal')
@section('contenido')


<main class="main p-4 bg-gradient-secondary">

    <div class="card-body shadow-lg bg-grey-soft-zipek ">
        <div class="form-group row p-3">
            <h3>Agregar Compra</h3>

            <span><strong>(*) Campo obligatorio</strong></span>
        </div>
        <hr>

        <div class="col-md-12">
            <h4 class="text-center">LLenar el formulario</h4>
        </div>
        <form action="{{route('compra.store')}}" method="POST" class="p-1">
            {{csrf_field()}}

            <div class="form-group row">

                <div class="col-md-6">

                    <label class="form-control-label font-weight-bold" for="nombre">Nombre del Proveedor</label>

                    <select class="form-control selectpicker" name="id_proveedor" id="id_proveedor" data-live-search="true">

                        <option value="0" disabled>Seleccione Proveedor</option>

                        @foreach($proveedores as $prove)

                        <option value="{{$prove->id}}">{{$prove->nombre}}</option>

                        @endforeach

                    </select>

                </div>


                <div class="col-md-6">

                    <label class="form-control-label font-weight-bold" for="documento">Tipo de Documento</label>

                    <select class="form-control selectpicker" name="tipo_identificacion" id="tipo_identificacion" required>

                        <option value="0" disabled>Seleccione</option>
                         <option value="BOLETA">Boleta</option>
                        <option value="FACTURA">Factura</option>
                       


                    </select>
                </div>
            </div>


            <div class="form-group row">

                <div class="col-md-6">
                    <label class="form-control-label font-weight-bold" for="num_compra">Número Compra</label>

                    <input type="text" id="num_compra" name="num_compra" class="form-control" placeholder="" maxlength="10" required pattern="[0-9]{0,10}"> 

                </div>
            </div>

            <hr>

            <div class="form-group row ">

                <div class="col-md-6">

                    <label class="form-control-label font-weight-bold" for="nombre">Producto</label>

                    <select class="form-control selectpicker" name="id_producto" id="id_producto" data-live-search="true">

                        <option value="0" selected>Seleccione un producto</option>

                        @foreach($productos as $prod)

                        <option value="{{$prod->id}}">{{$prod->producto}}</option>

                        @endforeach

                    </select>

                </div>

            </div>

            <div class="form-group row">

                <div class="col-md-3">
                    <label class="form-control-label font-weight-bold" for="cantidad">Cantidad</label>

                    <input type="number" id="cantidad" name="cantidad" class="form-control" placeholder="Ingrese cantidad" pattern="[0-9]{0,15}">
                </div>

                <div class="col-md-3">
                    <label class="form-control-label font-weight-bold" for="precio_compra">Precio Compra</label>

                    <input type="number" id="precio_compra" name="precio_compra" class="form-control" placeholder="Ingrese precio de compra" pattern="[0-9]{0,15}">
                </div>

                <div class="col-md-3">

                    <button type="button" id="agregar" class="btn btn-primary bg-primary-zipek"><i class="fa fa-plus"></i> Agregar detalle</button>
                </div>

            </div>



            <div class="form-group row border p-2">

                <h4>Lista de Compras a Proveedores</h4>

                <div class="col-md-12 table-responsive-md">
                    <table id="detalles" class="table table-bordered table-striped table-sm shadow">
                        <thead>
                            <tr class=" bg-gradient-indigo text-uppercase text-center">
                                <th>Eliminar</th>
                                <th>Producto</th>
                                <th>Precio <sub>(CLP)</sub></th>
                                <th>Cantidad</th>
                                <th>SubTotal<sub>(CLP)</sub></th>
                            </tr>
                        </thead>

                        <tfoot class="bg-gradient-light">

                            <tr>
                                <th colspan="4">
                                    <p class="text-right">TOTAL:</p>
                                </th>
                                <th>
                                    <p class="text-right"><span id="total">$ 0</span> </p>
                                </th>
                            </tr>

                            <tr>
                                <th colspan="4">
                                    <p class="text-right">TOTAL IMPUESTO (19%):</p>
                                </th>
                                <th>
                                    <p class="text-right"><span id="total_impuesto">$ 0</span></p>
                                </th>
                            </tr>

                            <tr>
                                <th colspan="4">
                                    <p class="text-right">TOTAL PAGAR:</p>
                                </th>
                                <th>
                                    <p class="text-right"><span class="text-right" id="total_pagar_html">$ 0</span> <input type="hidden" name="total_pagar" id="total_pagar"></p>
                                </th>
                            </tr>

                        </tfoot>

                        <tbody>
                        </tbody>


                    </table>
                </div>

            </div>

            <div class="modal-footer form-group row bg-grey-soft-zipek" id="guardar">

                <div class="col-md-12 text-right">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <button type="submit" class="btn btn-success bg-gradient-success"><i class="fa fa-save fa-2x"></i> Registrar</button>

                </div>

            </div>

        </form>

    </div>
    <!--fin del div card body-->
</main>
@push('scripts')
<script>
    $(document).ready(function() {

        $("#agregar").click(function() {

            agregar();
        });

    });

    var cont = 0;
    total = 0;
    subtotal = [];
    $("#guardar").hide();

    function agregar() {

        id_producto = $("#id_producto").val();
        producto = $("#id_producto option:selected").text();
        cantidad = $("#cantidad").val();
        precio_compra = $("#precio_compra").val();
        impuesto = 19;


        if (id_producto != "" && cantidad != "" && cantidad > 0 && precio_compra != "") {

            subtotal[cont] = cantidad * precio_compra;
            total = total + subtotal[cont];

            var fila = '<tr class="selected text-center" id="fila' + cont + '"><td><button type="button" class="btn btn-danger bg-gradient-danger" onclick="eliminar(' + cont + ');"><i class="fa fa-times "></i></button></td>' +
                '<td><input type="hidden" name="id_producto[]" value="' + id_producto + '" >' + producto + '</td>' +
                '<td><input type="number" id="precio_compra[]" class="text-center" name="precio_compra[]"  value="' + precio_compra + '" > </td>' +
                '<td><input type="number" class="text-center" name="cantidad[]" value="' + cantidad + '" > </td> <td>$' + subtotal[cont] + ' </td></tr>';
            cont++;
            limpiar();
            totales();

            evaluar();
            $('#detalles').append(fila);

        } else {

            // alert("Rellene todos los campos del detalle de la compra, revise los datos del producto");

            Swal.fire({
                type: 'error',
                //title: 'Oops...',
                text: 'Rellene todos los campos del detalle de la compras',

            })

        }

    }


    function limpiar() {

        $("#cantidad").val("");
        $("#precio_compra").val("");


    }

    function totales() {

        $("#total").html("$ " + total.toFixed(0));

        total_impuesto = total * impuesto / 100;
        total_pagar = total + total_impuesto;
        $("#total_impuesto").html("$ " + total_impuesto.toFixed(0));
        $("#total_pagar_html").html("$ " + total_pagar.toFixed(0));
        $("#total_pagar").val(total_pagar.toFixed(0));

    }



    function evaluar() {

        if (total > 0) {

            $("#guardar").show();

        } else {

            $("#guardar").hide();
        }
    }

    function eliminar(index) {

        total = total - subtotal[index];
        total_impuesto = total * 19 / 100;
        total_pagar_html = total + total_impuesto;

        $("#total").html("$" + total);
        $("#total_impuesto").html("$" + total_impuesto);
        $("#total_pagar_html").html("$" + total_pagar_html);
        $("#total_pagar").val(total_pagar_html.toFixed(0));

        $("#fila" + index).remove();
        evaluar();
    }
</script>
@endpush

@endsection