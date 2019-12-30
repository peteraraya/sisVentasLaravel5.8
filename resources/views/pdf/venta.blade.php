<!DOCTYPE>
<html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de venta</title>
    <style>
        body {
    
        font-family: Arial, sans-serif; 
        font-size: 14px;
        }
 
 
        #datos{
        float: left;
        margin-top: 0%;
        margin-left: 2%;
        margin-right: 2%;
        }
 
        #encabezado{
        text-align: center;
        margin-left: 35%;
        margin-right: 35%;
        font-size: 15px;
        }
 
        #fact{
        float: right;
        margin-top: 2%;
        margin-left: 2%;
        margin-right: 2%;
        font-size: 20px;
        padding: 10px;
        color: antiquewhite;
        background:#D2691E;
        }
 
        section{
        clear: left;
        }
 
        #cliente{
        text-align: left;
        }
 
        #facliente{
        width: 40%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }
 
        #fac, #fv, #fa{
        color: #FFFFFF;
        font-size: 15px;
        }
 
        #facliente thead{
        padding: 20px;
        background:#D2691E;
        text-align: left;
        border-bottom: 1px solid #FFFFFF;  
        }
 
        #facvendedor{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }
 
        #facvendedor thead{
        padding: 20px;
        background: #D2691E;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;  
        }
 
        #facproducto{
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
        }
 
        #facproducto thead{
        padding: 20px;
        background: #D2691E;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;  
        }
 
       
    </style>
    <body>
        @foreach ($venta as $v)
        <header>
            <!--<div id="logo">
                <img src="img/logo.png" alt="" id="imagen">
            </div>-->

            <div>
                
                <table id="datos">
                    <thead>                        
                        <tr>
                            <th id="">DATOS DEL VENDEDOR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th><p id="proveedor">Nombre: {{$v->nombre}}<br>
                            {{$v->tipo_identificacion}}-VENTA: {{$v->num_venta}}<br>
                            Dirección: {{$v->direccion}}<br>
                            Teléfono: {{$v->telefono}}<br>
                            Email: {{$v->email}}</</p></th>
                        </tr>
                    </tbody>
                </table>
            </div>
            
            <div id="fact">
                <p>{{$v->tipo_identificacion}}-VENTA<br>
                  {{$v->num_venta}}</p>
            </div>
        </header>
        <br>
       
        @endforeach
        <br>
       
        <section>
            <div>
                <table id="facproducto">
                    <thead>
                        <tr id="fa">
                            <th>CANTIDAD</th>
                            <th>PRODUCTO</th>
                            <th>PRECIO VENTA (clp)</th>
                            <th>DESCUENTO (%)</th>
                            <th>SUBTOTAL (clp)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($detalles as $det)
                        <tr  align="center">
                            <td>{{$det->cantidad}}</td>
                            <td>{{$det->producto}}</td>
                            <td>${{ number_format($det->precio,0, ",", ".") }}</td>
                            <td>{{ number_format($det->descuento,0, ",", ".") }}</td>
                            <td>${{ number_format($det->cantidad*$det->precio - $det->cantidad*$det->precio*$det->descuento/100,0, ",", ".")}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        @foreach ($venta as $v)
                        <tr>
                           <th colspan="4"><p align="right">TOTAL:</p></th>
                           <td><p align="right">${{ number_format($v->total,0, ",", ".")}}</p></td>
                        </tr>

                        <tr>
                            <th colspan="4"><p align="right">TOTAL IMPUESTO (20%):</p></th>
                            <td><p align="right">${{ number_format($v->total*20/100,0, ",", ".")}}</p></td>
                        </tr>

                        <tr>
                            <th  colspan="4"><p align="right">TOTAL PAGAR:</p></th>
                            <td><p align="right">${{ number_format($v->total+($v->total*20/100),0, ",", ".")}}</p></td>
                        </tr>

                        @endforeach
                    </tfoot>
                </table>
            </div>
        </section>
        <br>
        <br>
        <footer>
            <!--puedes poner un mensaje aqui-->
            <div id="datos">
                <p id="encabezado">
                     <b>peteraraya.tk</b><br>Pedro Araya <br>Telefono:(+569)57642162<br>Email:piteraraya@gmail.com
                </p>
            </div>
        </footer>
    </body>
</html>