<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Entrada extends Model
{
    protected $table='detalles_entradas';
    protected $primaryKey ='id_detalle_en';
    protected $with=['entrada'];
    public $timestamps=false;
    public $incrementing = true;
    protected $fillable=[
    'monto',
    'fecha_entrada'
    ];

    public function entrada(){
    	return $this->belongsTo(Entrada::class,'id_entrada','id_entrada');
    }
}
