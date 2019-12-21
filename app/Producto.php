<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    // Hace referencia a la tabla productos
    protected $table = 'productos';
    // se declaran las variables de producto
    protected $fillable = ['idcategoria', 'codigo', 'nombre', 'precio_venta', 'stock', 'condicion','imagen'];
}
