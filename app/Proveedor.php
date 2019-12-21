<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    // Llamar tabla
    protected $table = 'proveedores';

    // fillable para llamar a cada uno de los campos de la tabla
    protected $fillable=['nombre','tipo_documento','num_documento','direccion','telefono','email'];

}
