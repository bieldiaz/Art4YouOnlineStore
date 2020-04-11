<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ArtistaFormularioTabla extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('artistaFormulario', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nomcomplert');
            $table->string('correo');
            $table->integer('telefono');
            $table->longText('textoFormulario');
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
        Schema::dropIfExists('artistaFormulario');
    }
}
