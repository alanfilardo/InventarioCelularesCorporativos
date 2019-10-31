<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipos extends Model
{
    protected $table = 'equipos';
    protected $fillable = ['imei', 'ModeloEquipo_id', 'Asignado'];

    public function modelos(){
        return $this->belongsTo(ModelosEquipos::class, 'ModeloEquipo_id');
    }

}
