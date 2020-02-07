<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table='proveedores';
    protected $primaryKey ='id_proveedor';
    public $timestamps=false;
    public $incrementing = true;
    protected $fillable=[
    'nombre',
    'apellidop',
    'apellidom',
    'edad'
    ];
}
