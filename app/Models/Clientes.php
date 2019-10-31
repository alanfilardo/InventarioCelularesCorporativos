<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    protected $table = 'clientes';
    protected $fillable = ['nombrecliente', 'apellidocliente', 'lineaid', 'equipoid', 'sucursalid'];
    protected $guarded = ['id'];

    public function sucursal(){
        return $this->belongsTo(Sucursales::class, 'sucursalid');
    }

    public function linea(){
        return $this->hasOne(Lineas::class, 'id', 'lineaid');
    }

    public function equipo(){
        return $this->hasOne(Equipos::class, 'id', 'equipoid');
    }

    public function cuenta(){
        return $this->hasOne(Cuentas::class, 'clienteid', 'id');
    }
    
}
