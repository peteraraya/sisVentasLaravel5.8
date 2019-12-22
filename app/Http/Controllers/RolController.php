<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

// Importamos el modelo
use App\Rol;
// Redireccionamiento a una vista
// use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class RolController extends Controller
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

        if ($request) {

            $sql = trim($request->get('buscarTexto'));
            $roles = DB::table('roles')->where('nombre', 'LIKE', '%' . $sql . '%')
                ->orderBy('id', 'desc')
                ->paginate(3);
            return view('rol.index',["roles"=>$roles,"buscarTexto"=>$sql]);
            //return $roles;
        }
    }
}
