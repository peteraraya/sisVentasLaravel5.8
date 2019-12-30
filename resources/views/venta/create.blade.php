@extends('principal')
@section('contenido')

<main class="main p-4 bg-gradient-secondary">

 <div class="card-body shadow-lg bg-gradient-light font-weight-bold">
<div class="form-group row p-3 rounded ">
 <h3>Agregar Venta</h3>
  <span><strong>(*) Campo obligatorio</strong></span><br/>
 </div>

 <hr>

 <div class="w-100">
 <h3 class="text-center text-uppercase">LLenar el formulario</h3>

</div>
    <form action="{{route('venta.store')}}" method="POST" class="p-1">
     @csrf
    <!-- {{ csrf_field() }} -->
            <div class="form-group row bg-gradient-dark shadow-lg rounded pb-3 pt-2">

            <div class="col-md-6">  

                <label class="form-control-label font-weight-bold" for="nombre">Nombre del Cliente</label>
                
                    <select class="form-control selectpicker" name="id_cliente" id="id_cliente" data-live-search="true" required>
                                                    
                    <option value="0" disabled>Seleccione</option>
                    
                    @foreach($clientes as $client)
                    
                    <option value="{{$client->id}}">{{$client->nombre}}</option>
                            
                    @endforeach

                    </select>
                
                </div>
         

                <div class="col-md-6">  

                        <label class="form-control-label font-weight-bold" for="documento">Documento</label>
                        
                        <select class="form-control selectpicker" name="tipo_identificacion" id="tipo_identificacion" required>
                                                        
                            <option value="0" disabled>Seleccione</option>
                            <option value="BOLETA">Boleta</option>
                            <option value="FACTURA">Factura</option>
                          
                            

                        </select>
                </div>
            </div>


           <div class="form-group row border p-2 bg-gradient-navy shadow-lg rounded">


                <div class="col-md-3  pb-3">
                        <label class="form-control-label font-weight-bold" for="num_venta">Número Venta</label>
                    
                        <input 
                                type="text" 
                                id="num_venta" 
                                name="num_venta" 
                                class="form-control" 
                                placeholder="Ingrese el número venta" 
                                pattern="[0-9]{0,15}"
                                value="0000"
                                >
                          
                </div>
           

            
                 <div class="col-md-6 mb-2">  

                        <label class="form-control-label font-weight-bold" for="nombre">Producto</label>

                            <select class="form-control selectpicker" name="id_producto" id="id_producto" data-live-search="true" required>
                                                            
                            <option value="0" selected>Seleccione</option>
                            
                            @foreach($productos as $prod)
                            
                            <option value="{{$prod->id}}_{{$prod->stock}}_{{$prod->precio_venta}}">{{$prod->producto}}</option>
                                    
                            @endforeach

                            </select>

                </div>

           

                <div class="col-md-3">
                        <label class="form-control-label font-weight-bold" for="cantidad">Cantidad</label>
                        
                        <input type="number" id="cantidad" name="cantidad" class="form-control" placeholder="Ingrese cantidad" pattern="[0-9]{0,15}">
                </div>

                <div class="col-md-3">
                        <label class="form-control-label font-weight-bold" for="stock">Stock</label>
                        
                        <input type="number" disabled id="stock" name="stock" class="form-control" placeholder="Stock" pattern="[0-9]{0,15}">
                </div>

                <div class="col-md-3">
                        <label class="form-control-label font-weight-bold" for="precio_venta">Precio Venta</label>
                        
                        <input type="number" disabled id="precio_venta" name="precio_venta" class="form-control" placeholder="Precio de venta" >
                </div>

                <div class="col-md-3">
                        <label class="form-control-label font-weight-bold" for="impuesto">Descuento</label>
                        
                        <input type="number" id="descuento" name="descuento" class="form-control" placeholder="Ingrese el descuento" value="0">
                </div>

                <div class="col-md-3 text-center mt-3">
                        
                    <button type="button" id="agregar" class="btn btn-danger btn-md pl-4 pr-4 pt-3 pb-3 shadow "><i class="fas fa-plus "></i><span class="text-uppercase p-2">Agregar detalle</span></button>
                </div>


            </div>

            <br/><br/>

           <div class="form-group row border p-2 ">

              <h3>Lista de Ventas a Clientes</h3>

              <div class="col-md-12 table-responsive-md">
                <table id="detalles" class="table table-bordered table-striped table-sm shadow bg-gradient-light">
                <thead>
                   <tr class=" bg-gradient-indigo text-uppercase text-center">
                        <th>Eliminar</th>
                        <th>Producto</th>
                        <th>Precio Venta<sub>(clp)</sub></th>
                        <th>Descuento</th>
                        <th>Cantidad</th>
                        <th>SubTotal<sub>(clp)</sub></th>
                    </tr>
                </thead>
                 
                <tfoot class="text-center">

                    <tr>
                        <th  colspan="5"><p class="text-right">TOTAL:</p></th>
                        <th><p class="text-right"><span id="total">$ 0</span> </p></th>
                    </tr>

                    <tr>
                        <th colspan="5"><p class="text-right">TOTAL IMPUESTO (19%):</p></th>
                        <th><p class="text-right"><span id="total_impuesto">$ 0</span></p></th>
                    </tr>

                    <tr>
                        <th  colspan="5"><p class="text-right">TOTAL PAGAR:</p></th>
                        <th><p class="text-right"><span class="text-right" id="total_pagar_html">$ 0</span> <input type="hidden" name="total_pagar" id="total_pagar"></p></th>
                    </tr>  

                </tfoot>

                <tbody>
                </tbody>
                
                
                </table>
                   <div class="modal-footer form-group row bg-grey-soft-zipek" id="guardar">
            
            <div class="col-md-12 text-right">
               <input type="hidden" name="_token" value="{{csrf_token()}}">
               
               <button type="submit" class="btn btn-success bg-gradient-success"><i class="fas fa-save fa-2x"></i> Registrar</button>
            
            </div>

            </div>
              </div>
            
            </div>

         

         </form>

    </div><!--fin del div card body-->
  </main>

@push('scripts')
 <script>
 

  $(document).ready(function(){
  
     $("#agregar").click(function(){

         agregar();
     });

  });

   var cont=0;
   total=0;
   subtotal=[];
   $("#guardar").hide();
   $("#id_producto").change(mostrarValores);

     function mostrarValores(){

         datosProducto = document.getElementById('id_producto').value.split('_');
         $("#precio_venta").val(datosProducto[2]);
         $("#stock").val(datosProducto[1]);
     
     }

     function agregar(){

         datosProducto = document.getElementById('id_producto').value.split('_');

         id_producto= datosProducto[0];
         producto= $("#id_producto option:selected").text();
         cantidad= $("#cantidad").val();
         descuento= $("#descuento").val();
         precio_venta= $("#precio_venta").val();
         stock= $("#stock").val();
         impuesto=19;
          
          if(id_producto !="" && cantidad!="" && cantidad>0  && descuento!="" && precio_venta!=""){

                if(parseInt(stock)>=parseInt(cantidad)){
                    
                    subtotal[cont]=(cantidad*precio_venta)-(cantidad*precio_venta*descuento/100);
                    total= total+subtotal[cont];

                    let fila= '<tr class="selected" id="fila'+cont+'">'+
                                  '<td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar('+cont+');"><i class="fas fa-times"></i></button></td>'+
                                  '<td><input type="hidden" name="id_producto[]" value="'+id_producto+'">'+producto+'</td>'+
                                  '<td><input type="number" name="precio_venta[]" value="'+parseFloat(precio_venta).toFixed(0)+'"></td>'+
                                  '<td><input type="number" name="descuento[]" value="'+parseFloat(descuento).toFixed(0)+'"> </td>'+
                                  '<td><input type="number" name="cantidad[]" value="'+cantidad+'"> </td>'+
                                  '<td>$'+parseFloat(subtotal[cont]).toFixed(0)+'</td>'+
                                  '</tr>';
                    
                    cont++;
                    limpiar();
                    totales();
                    
                    evaluar();
                    $('#detalles').append(fila);

                } else{

                    //alert("La cantidad a vender supera el stock");
                
                    Swal.fire({
                    type: 'error',
                    //title: 'Oops...',
                    text: 'La cantidad a vender supera el stock',
                
                    })
                }
               
            }else{

                //alert("Rellene todos los campos del detalle de la venta");
           
                Swal.fire({
                type: 'error',
                //title: 'Oops...',
                text: 'Rellene todos los campos del detalle de la venta',
              
                })
           
            }
         
     }


     function limpiar(){
        
        $("#cantidad").val("");
        $("#descuento").val("0");
        $("#precio_venta").val("");

     }

     function totales(){

        $("#total").html("$ " + total.toFixed(0));
        total_impuesto=total*impuesto/100;
        total_pagar=total+total_impuesto;
        $("#total_impuesto").html("$ " + total_impuesto.toFixed(0));
        $("#total_pagar_html").html("$ " + total_pagar.toFixed(0));
        $("#total_pagar").val(total_pagar.toFixed(0));
      }


     function evaluar(){

         if(total>0){

           $("#guardar").show();

         } else{
              
           $("#guardar").hide();
         }
     }

     function eliminar(index){

        total=total-subtotal[index];
        total_impuesto= total*19/100;
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