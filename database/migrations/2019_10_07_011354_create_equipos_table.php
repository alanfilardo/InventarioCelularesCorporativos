<?php

use App\Models\Equipos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEquiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('imei')->unique();
            $table->unsignedInteger('ModeloEquipo_id');
            $table->foreign('ModeloEquipo_id')->references('id')->on('modelosequipos')->onDelete('cascade');
            $table->boolean('Asignado')->default(false);
            $table->timestamps();
        });

        $Equipo = new Equipos([
            'imei' => 111111111111111,
            'ModeloEquipo_id' => 1,
        ]);
        $Equipo->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos');
    }
}
