<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoriaInventario extends Model
{
    //
    protected $table = 'historia_inventario';
    protected $primaryKey = 'id';
    protected $fillable = ['id','codigo', 'precio','cantidad','empresa_cliente','tipo'];
    const UPDATED_AT = null;
    // public $timestamps = false;
    public function inventario(){
        return $this->belongsTo(Inventario::class,'codigo');
    }
}
