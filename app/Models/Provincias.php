<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
class Provincias extends Model
{
    protected $table = "provincias";
    protected $fillable = ["NombreProvincia","Pais_id"];
    protected $guarded = ["id"];
    
    public function paises(){
        return $this->belongsTo(Paises::class, 'Pais_id');
    }

    public function sucursales(){
        return $this->hasMany(Sucursales::class, 'Provincia_id', 'id');
    }

}