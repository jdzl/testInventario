<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    //
    protected $table = 'inventario';
    protected $primaryKey = 'codigo';
    protected $fillable = ['codigo','nombre', 'precio_unidad','cantidad'];
    public $timestamps = false;
   
}
