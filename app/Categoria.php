<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //
    protected $table = 'categorias'; //nombre de la tabla

    protected $fillable = ['nombre', 'descripcion', 'condicion']; // no es necesario el id
}
