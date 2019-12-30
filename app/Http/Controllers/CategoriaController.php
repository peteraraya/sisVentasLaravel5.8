<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//Importaciones
use App\Categoria;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Listar todas los registros de las categorías
        if ($request) {
            $sql = trim($request->get('buscarTexto'));
            $categorias = DB::table('categorias')->where('nombre', 'LIKE', '%' . $sql . '%')
                ->orderBy('id', 'desc')
                ->paginate(10);
            return view('categoria.index', ["categorias" => $categorias, "buscarTexto" => $sql]);
            //return $categorias;
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
        $categoria = new Categoria(); // Instanciamos Categoria
        // Insertamos los registros
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->condicion = '1'; // valor por defecto (activado)
        //Registro
        $categoria->save();
        return Redirect::to("categoria");
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
        //Actualizar registro de categoria
        $categoria = Categoria::findOrFail($request->id_categoria); // buscamos un registro que ya existe
        // Insertamos los registros
        $categoria->nombre = $request->nombre;
        $categoria->descripcion = $request->descripcion;
        $categoria->condicion = '1';

        $categoria->save();
        return Redirect::to("categoria");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {  
        // Activar y desactivar un registro de  categoria
            $categoria= Categoria::findOrFail($request->id_categoria);

            // Modificamos el campo condicion para activar y desactivar categorias
            if ($categoria->condicion=="1") {
                $categoria->condicion= '0';
                $categoria->save();
                return Redirect::to("categoria");
            } else {
                $categoria->condicion= '1';
                $categoria->save();
                return Redirect::to("categoria");
            }
    }

}
