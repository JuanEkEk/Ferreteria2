<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
	protected $table = 'usuarios';
	protected $primaryKey = 'id_usuario';
	 protected $with=['rol'];
	public $timestamps = false;
	public $incrementing = false;

	protected $fillable = [
		'usuario',
		'password',
		'nombre',
		'apellidop',
		'apellidom',
		'edad'
	];

	public function rol(){
    	return $this->belongsTo(Rol::class,'id_rol','id_rol');
    }

}
