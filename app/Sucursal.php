<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected $table='sucursales';
    protected $primaryKey ='id_sucursal';
    public $timestamps=false;
    public $incrementing = true;
    protected $fillable=[
    'nombre',
    'localidad',
    'calle',
    'cruzamientoa',
    'cruzamientob'
    // 'foto'
    ];
}
