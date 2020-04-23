<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Venta extends Model
{
    //
    protected $table='detalles_salidas';
    protected $primaryKey='id_detalle_sa';
    protected $with=['producto'];
    public $timestamps = true;
    public $incrementing = true;

    public $fillable=[
    	'id_detalle_sa',
        'id_tipo',
        'cantidad',
    	'precio',
        'total',
        'folio'
    ];

    public function producto(){
        return $this->belongsTo(Producto::class,'id_producto','id_producto');
    }
}
