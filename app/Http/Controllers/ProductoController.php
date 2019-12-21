<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class ProductoController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        if($request){

            $sql=trim($request->get('buscarTexto'));
            $productos=DB::table('productos as p')
            ->join('categorias as c','p.idcategoria','=','c.id')
            ->select('p.id','p.idcategoria','p.nombre','p.precio_venta','p.codigo','p.stock', 'p.imagen','p.condicion','c.nombre as categoria')
            ->where('p.nombre','LIKE','%'.$sql.'%')
            ->orwhere('p.codigo','LIKE','%'.$sql.'%')
            ->orderBy('p.id','desc')
            ->paginate(3);
           
            /*listar las categorias en ventana modal*/
            $categorias=DB::table('categorias')
            ->select('id','nombre','descripcion')
            ->where('condicion','=','1')->get(); 
 
            return view('producto.index',["productos"=>$productos,"categorias"=>$categorias,"buscarTexto"=>$sql]);
     
            //return $productos;
        }
       
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Registro de productos
        $producto = new Producto();
        $producto->idcategoria = $request->id;
        $producto->codigo = $request->codigo;
        $producto->nombre = $request->nombre;
        $producto->precio_venta = $request->precio_venta;
        $producto->stock = '0';
        $producto->condicion = '1';

        // Si hay imagen

        //Handle File Upload | valida si existe un archivo | 'imagen' es el name del formulario
        if ($request->hasFile('imagen')) {

            //Get filename with the extension
            $filenamewithExt = $request->file('imagen')->getClientOriginalName();

            //Get just filename
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);

            //Get just ext
            $extension = $request->file('imagen')->guessClientExtension();

            //FileName to store
            $fileNameToStore = time() . '.' . $extension;

            //Upload Image
            $path = $request->file('imagen')->storeAs('public/img/producto', $fileNameToStore);
        } else {

            $fileNameToStore = "noimagen.jpg";
        }

        $producto->imagen = $fileNameToStore;


  


        $producto->save();
        return Redirect::to("producto");
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $producto = Producto::findOrFail($request->id_producto);
        $producto->idcategoria = $request->id;
        $producto->codigo = $request->codigo;
        $producto->nombre = $request->nombre;
        $producto->precio_venta = $request->precio_venta;
        $producto->stock = '0';
        $producto->condicion = '1';

        //Handle File Upload

        if ($request->hasFile('imagen')) {

            /*si la imagen que subes es distinta a la que está por defecto 
            entonces eliminaría la imagen anterior, eso es para evitar 
            acumular imagenes en el servidor*/
            if ($producto->imagen != 'noimagen.jpg') {
                Storage::delete('public/img/producto/' . $producto->imagen);
            }


            //Get filename with the extension
            $filenamewithExt = $request->file('imagen')->getClientOriginalName();

            //Get just filename
            $filename = pathinfo($filenamewithExt, PATHINFO_FILENAME);

            //Get just ext
            $extension = $request->file('imagen')->guessClientExtension();

            //FileName to store
            $fileNameToStore = time() . '.' . $extension;

            //Upload Image
            $path = $request->file('imagen')->storeAs('public/img/producto', $fileNameToStore);
        } else {

            $fileNameToStore = $producto->imagen;
        }

        $producto->imagen = $fileNameToStore;

        $producto->save();
        return Redirect::to("producto");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        // 
            $producto= Producto::findOrFail($request->id_producto);

            if($producto->condicion=="1"){
                
                $producto->condicion= '0';
                $producto->save();
                return Redirect::to("producto");
        
            } else{

                $producto->condicion= '1';
                $producto->save();
                return Redirect::to("producto");

            }
    }
}
