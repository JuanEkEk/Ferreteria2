<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acreedor extends Model
{
    protected $table='acreedores';
    protected $primaryKey ='id_acreedor';
    public $timestamps=false;
    public $incrementing = true;
    protected $fillable=[
    'nombre',
    'apellidop',
    'apellidom',
    'edad'
    ];
}
