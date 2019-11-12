<?php

use App\Models\ModelosEquipos;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelosequiposTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('modelosequipos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ModeloEquipo', 100);
            $table->unsignedInteger('MarcaEquipo_id');
            $table->foreign('MarcaEquipo_id')->references('id')->on('marcasequipos')->onDelete('cascade');
            $table->timestamps();
        });

        $Modelo = new ModelosEquipos([
            'ModeloEquipo' => 'Equipo Propio',
            'MarcaEquipo_id' => 1
        ]);
        $Modelo->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('modelosequipos');
    }
}
