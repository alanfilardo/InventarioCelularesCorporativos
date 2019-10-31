<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuentas', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('clienteid')->unique();
            $table->foreign('clienteid')->references('id')->on('clientes')->onDelete('cascade');
            $table->string('cuentagmail')->unique()->nullable();
            $table->string('passwordgmail')->nullable();
            $table->string('cuentasamsung')->unique()->nullable();
            $table->string('passwordsamsung')->nullable();
            $table->string('cuentaapple')->unique()->nullable();
            $table->string('passwordapple')->nullable();
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
        Schema::dropIfExists('cuentas');
    }
}
