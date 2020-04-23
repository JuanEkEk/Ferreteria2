<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $table='entradas';
    protected $primaryKey ='id_entrada';
    protected $with=['proveedor'];
    public $timestamps=false;
    public $incrementing = true;
    protected $fillable=[
    'id_entrada'
    ];

    public function proveedor(){
    	return $this->belongsTo(Proveedor::class,'id_proveedor','id_proveedor');
    }
}
