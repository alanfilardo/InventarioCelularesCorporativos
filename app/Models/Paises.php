<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paises extends Model
{
    protected $table = 'paises';
    protected $fillable = ['NombrePais'];
    protected $guarded = 'id';

    public function provincias(){
        return $this->hasMany(Provincias::class, 'Pais_id', 'id');
    }
}
