<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cuentas extends Model
{
    protected $table = 'cuentas';
    protected $fillable = ['clienteid','cuentagmail', 'passwordgmail', 'cuentasamsung', 'passwordsamsung', 'cuentaapple', 'passwordapple'];
    protected $guarded = ['id'];

    public function cliente(){
        return $this->belongsTo(Clientes::class, 'clienteid');
    }
}
