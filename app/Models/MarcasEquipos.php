<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarcasEquipos extends Model
{
    protected $table = 'marcasequipos';
    protected $fillable = ['NombreMarca'];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function modelos(){
        return $this->hasMany(ModelosEquipos::class, 'MarcaEquipo_id', 'id');
    }
}
