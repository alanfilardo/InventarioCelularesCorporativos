<?php

use App\Models\MarcasEquipos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarcasequiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marcasequipos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('NombreMarca', 50);
            $table->timestamps();
        });

        $Marca = new MarcasEquipos([
            'NombreMarca' => 'Equipo Propio'
        ]);
        $Marca->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marcasequipos');
    }
}
