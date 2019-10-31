<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sucursales extends Model
{
    protected $table = 'sucursales';
    protected $fillable = ['NombreSucursal', 'Provincia_id'];
    protected $guarded = 'id';

    public function provincias(){
        return $this->belongsTo(Provincias::class, 'Provincia_id');
    }
}
