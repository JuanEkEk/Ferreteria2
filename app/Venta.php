<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    //
    protected $table='detalles_salidas';
    protected $primaryKey='id_detalle_sa';
    protected $with=['producto'];

    public $incrementing=true;
    public $timestamps = false;

    public $fillable=[
        
        'id_tipo',
        'nombre',
        'cantidad',
        'precio',
        'total',
        'folio',
        'fecha_salida'
    ];

    public function producto(){
    	return $this->belongsTo(Producto::class,'id_producto','id_producto');
    }

}
