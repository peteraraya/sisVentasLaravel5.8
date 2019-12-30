@extends('principal')
@section('contenido')
<main class="main">
            <!-- Breadcrumb -->
             <ol class="breadcrumb bg-gradient-dark shadow">
                <li class="breadcrumb-item active">
                <a href="/" class="text-success text-uppercase green-text ">Ventas - SISTEMA DE COMPRAS - VENTAS</a></li>
            </ol>
            <div class="container-fluid p-2">
                <!-- Ejemplo de tabla Listado -->
                 <div class="card animated bounceInLeft shadow">
                     <div class="card-header bg-grey-soft-zipek">

                      <h4 class="card-title pb-2">Listado de Ventas</h4>
                       
                       <a href="venta/create">

                        <button class="btn btn-dark bg-gradient-dark btn-md shadow-lg"  type="button">
                            <i class="fas fa-plus"></i>&nbsp;&nbsp;Agregar Venta
                        </button>

                        </a>
                       
                    </div>
                     <div class="card-body bg-gradient-light">

                        <div class="form-group row">
                            <div class="col-md-6">
                            {!! Form::open(array('url'=>'venta','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!} 
                                <div class="input-group">
                                   
                                    <input type="text" name="buscarTexto" class="form-control" placeholder="Buscar texto" value="{{$buscarTexto}}">
                                    <button type="submit"  class="btn btn-primary"><i class="fa fa-search"></i> Buscar</button>
                                </div>
                            {{Form::close()}}
                            </div>
                        </div>
                        <div class="table-responsive">
                        <table class="table table-bordered bg-table-ventas-zipek table-sm shadow">
                            <thead>
                                <tr class="bg-gradient-dark text-center p-0 shadow">
                                    
                                    <th>Detalle</th>
                                    <th>Fecha Venta</th>
                                    <th>N° Venta</th>
                                    <th>Cliente</th>
                                    <th>Tipo de identificación</th>
                                    <th>Vendedor</th>
                                    <th>Total<sub>(CLP)</sub></th>
                                    <th>Impuesto</th>
                                    <th>Estado</th>
                                    <th>Cambiar Estado</th>
                                    <th>Descargar Reporte</th>
                                    
                                </tr>
                            </thead>
                            <tbody>

                              @foreach($ventas as $vent)
                               
                               <tr class="text-center p-0 m-0">
                                    <td class="align-middle">
                                     
                                     <a href="{{URL::action('VentaController@show',$vent->id)}}">
                                       <button type="button" class="btn btn-info bg-gradient-info mt-2">
                                         <i class="fas fa-eye"></i> Ver
                                       </button>

                                     </a>
                                   </td>

                                    <td class="align-middle">{{date('d-m-Y h:i:s', strtotime($vent->fecha_venta))}}</td>
                                    <td class="align-middle">{{$vent->num_venta}}</td>
                                    <td class="align-middle">{{$vent->cliente}}</td>
                                    <td class="align-middle">{{$vent->tipo_identificacion}}</td>
                                    <td class="align-middle">{{$vent->nombre}}</td>
                                    <td class="align-middle">${{number_format($vent->total,0, ",", ".")}}</td>
                                    <td class="align-middle">{{$vent->impuesto}}</td>
                                    <td class="align-middle">
                                      
                                      @if($vent->estado=="Registrado")
                                        <button type="button" class="btn btn-success bg-gradient-success">
                                    
                                          <i class="fas fa-check"></i> Registrado
                                        </button>

                                      @else

                                        <button type="button" class="btn btn-danger bg-gradient-danger">
                                    
                                          <i class="fas fa-check"></i> Anulado
                                        </button>

                                       @endif
                                       
                                    </td>

                                    
                                    <td class="align-middle">

                                       @if($vent->estado=="Registrado")

                                        <button type="button" class="btn btn-danger bg-gradient-danger" data-id_venta="{{$vent->id}}" data-toggle="modal" data-target="#cambiarEstadoVenta">
                                            <i class="fas fa-times"></i> Anular Venta
                                        </button>

                                        @else

                                         <button type="button" class="btn btn-success bg-gradient-success">
                                            <i class="fas fa-lock"></i> Anulado
                                        </button>

                                        @endif
                                       
                                    </td>

                                    <td class="align-middle">
                                       
                                        <a href="{{url('pdfVenta',$vent->id)}}" target="_blank">
                                           
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
                        {{$ventas->render()}}
                        
                    </div>
                </div>
                <!-- Fin ejemplo de tabla Listado -->
            </div>
                       
           
        <!-- Inicio del modal cambiar estado de venta -->
         <div class="modal fade" id="cambiarEstadoVenta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" style="display: none;" aria-hidden="true">
                <div class="modal-dialog modal-danger" role="document">
                     <div class="modal-content shadow-sm">
                         <div class="modal-header bg-gradient-danger">
                            <h4 class="modal-title">Cambiar Estado de Venta</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                        </div>

                    <div class="modal-body">
                        <form action="{{route('venta.destroy','test')}}" method="POST">
                          {{method_field('delete')}}
                         @csrf
                        <!-- {{ csrf_field() }} -->

                            <input type="hidden" id="id_venta" name="id_venta" value="">

                                <p>Estas seguro de cambiar el estado?</p>
        

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger bg-gradient-danger"  data-dismiss="modal"><i class="fas fa-times"></i>Cerrar</button>
                                <button type="submit" class="btn btn-success bg-gradient-success" ><i class="fas fa-lock "></i>Aceptar</button>
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