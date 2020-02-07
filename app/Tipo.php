<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo extends Model
{
    protected $table = 'tipos';
    protected $primaryKey = 'id_tipo';
    protected $with=['categoria'];
    public $timestamps = false;
    public $incrementing = true;
    protected $fillable = [
    	'nombre'
    ];

        public function categoria(){
    	return $this->belongsTo(Categoria::class,'id_categoria','id_categoria');
    }
}
