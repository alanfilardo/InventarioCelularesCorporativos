<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lineas extends Model
{
    protected $table = 'lineas';
    protected $fillable = ['NumeroLinea', 'Asignado'];
    protected $guarded = ['id'];

    public function cliente(){
        return $this->belongsTo(Clientes::class, 'lineas_id');
    }
}

