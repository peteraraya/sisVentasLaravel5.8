@extends('principal')
@section('contenido')


<main class="main">

 <div class="card-body p-5 shadow bg-grey-soft-zipek">

  <h3 class="text-center text-uppercase ">
      <i class="fas fa-money-check    "></i>
      Detalle de Venta
    </h3>

    <hr>
           <div class="form-group row shadow bg-gradient-dark text-light shadow">

                    <div class="col-md-4">  

                        <label class="form-control-label font-weight-bold" for="nombre">Cliente</label>
                        
                        <p>{{$venta->nombre}}</p>
                            
                    </div>

                    <div class="col-md-4">  

                    <label class="form-control-label font-weight-bold" for="documento">Documento</label>

                    <p>{{$venta->tipo_identificacion}}</p>
                    
                    </div>

                    <div class="col-md-4">
                            <label class="form-control-label font-weight-bold" for="num_venta">Número Venta</label>
                            
                            <p>{{$venta->num_venta}}</p>
                    </div>

            </div>

            
           

           <div class="form-group row border p-2">

              <h3>Detalle de Ventas</h3>

              <div class="table-responsive col-md-12">
                <table id="detalles" class="table table-bordered table-striped table-sm shadow">
                <thead>
                    <tr class="bg-gradient-orange text-light text-center">

                        <th>Producto</th>
                        <th>Precio Venta <sub>(clp)</sub></th>
                        <th>Descuento <sub>(clp)</sub> </th>
                        <th>Cantidad</th>
                        <th>SubTotal <sub>(clp)</sub></th>
                    </tr>
                </thead>
                 
                <tfoot>
                   
                   <!--<th><h2>TOTAL</h2></th>
                   <th></th>
                   <th></th>
                   <th></th>
                   <th><h4 id="total">{{$venta->total}}</h4></th>-->
                   <tr>
                        <th  colspan="4"><p align="right">TOTAL:</p></th>
                        <th><p align="right">${{number_format($venta->total,0, ",", ".")}}</p></th>
                    </tr>

                    <tr>
                        <th colspan="4"><p align="right">TOTAL IMPUESTO (20%):</p></th>
                        <th><p align="right">${{number_format($venta->total*20/100,0, ",", ".")}}</p></th>
                    </tr>

                    <tr>
                        <th  colspan="4"><p align="right">TOTAL PAGAR:</p></th>
                        <th><p align="right">${{number_format($venta->total+($venta->total*20/100),0, ",", ".")}}</p></th>
                    </tr>  
                </tfoot>

                <tbody>
                   
                   @foreach($detalles as $det)

                    <tr class="text-center align-middle">
                     
                      <td>{{$det->producto}}</td>
                      <td>${{ number_format($det->precio,0, ",", ".")}}</td>
                      <td>{{ number_format($det->descuento,0, ",", ".")}}</td>
                      <td>{{$det->cantidad}}</td>
                      <td>${{number_format($det->cantidad*$det->precio - $det->cantidad*$det->precio*$det->descuento/100,0, ",", ".")}}</td>
                    
                    
                    </tr> 


                   @endforeach
                   
                </tbody>
                
                
                </table>
              </div>
            
            </div>


    </div><!--fin del div card body-->
  </main>

@endsection