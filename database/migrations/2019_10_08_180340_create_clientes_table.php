<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombrecliente');
            $table->string('apellidocliente');
            $table->unsignedInteger('lineaid')->unique();
            $table->foreign('lineaid')->references('id')->on('lineas')->onDelete('cascade');
            $table->unsignedInteger('equipoid');
            $table->foreign('equipoid')->references('id')->on('equipos')->onDelete('cascade');
            $table->unsignedInteger('sucursalid');
            $table->foreign('sucursalid')->references('id')->on('sucursales')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
