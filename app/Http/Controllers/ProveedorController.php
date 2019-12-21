<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Importamos el modelo
use App\Proveedor;
// Redireccionamiento a una vista
use Illuminate\Support\Facades\Redirect;
//  Permite interactuar con la base de datos
use Illuminate\Support\Facades\DB;


class ProveedorController extends Controller
{
    //

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Listar todas los registros de los proveedores
        if ($request) {
            $sql = trim($request->get('buscarTexto'));
            $proveedores = DB::table('proveedores')
                ->where('nombre', 'LIKE', '%' . $sql . '%')
                ->orwhere('num_documento', 'LIKE', '%' . $sql . '%')
                ->orderBy('id', 'desc')
                ->paginate(3);
            return view('proveedor.index', ["proveedores" => $proveedores, "buscarTexto" => $sql]);
            //return $proveedores;
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
        // Insertar un registro de lo que recibimos del formulario (post)
        $proveedor = new Proveedor(); // Instanciamos proveedor
        // Insertamos los registros
        $proveedor->nombre = $request->nombre;
        $proveedor->tipo_documento = $request->tipo_documento;
        $proveedor->num_documento = $request->num_documento;
        $proveedor->telefono = $request->telefono;
        $proveedor->email = $request->email;
        $proveedor->direccion = $request->direccion;
        $proveedor->save();
        return Redirect::to("proveedor");
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
        //Actualizar registro de proveedor
        $proveedor = Proveedor::findOrFail($request->id_proveedor); // buscamos un registro que ya existe
        // Insertamos los registros
        $proveedor->nombre = $request->nombre;
        $proveedor->tipo_documento = $request->tipo_documento;
        $proveedor->num_documento = $request->num_documento;
        $proveedor->telefono = $request->telefono;
        $proveedor->email = $request->email;
        $proveedor->direccion = $request->direccion;
        $proveedor->save();
        return Redirect::to("proveedor");
    }

}
