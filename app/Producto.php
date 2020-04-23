<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';
	protected $primaryKey = 'id_producto';
	protected $with=['sucursal','detalle_entrada','categoria','tipo'];
	public $timestamps = false;
	public $incrementing = true;

	protected $fillable = [
		'nombres',
		'cantidad',
		'precio',
		'total'
	];

	public function sucursal(){
    	return $this->belongsTo(Sucursal::class,'id_sucursal','id_sucursal');
    }

    public function detalle_entrada(){
    	return $this->belongsTo(Detalle_Entrada::class,'id_detalle_en','id_detalle_en');
    }

    public function categoria(){
    	return $this->belongsTo(Categoria::class,'id_categoria','id_categoria');
    }

    public function tipo(){
    	return $this->belongsTo(Tipo::class,'id_tipo','id_tipo');
    }

    
}
