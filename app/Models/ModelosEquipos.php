<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ModelosEquipos extends Model
{
    protected $table = 'modelosequipos';
    protected $fillable = ['ModeloEquipo', 'MarcaEquipo_id'];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function marcas(){
        return $this->belongsTo(MarcasEquipos::class, 'MarcaEquipo_id');
    }

    public function equipos(){
        return $this->hasMany(Equipos::class, 'ModeloEquipo_id', 'id');
    }
}
