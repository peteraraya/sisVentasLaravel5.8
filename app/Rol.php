<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'roles'; // ref a tbl roles
    protected $fillable=['nombre','descripcion','condicion']; // def campos de la tabla
    protected $timestamps=false; // no utilizaremos create x defecto

    // Metodo user, porque un rol puede tener varios usuarios
    public function users()
    {
        return $this->hasMany('App\User');
    }
}
