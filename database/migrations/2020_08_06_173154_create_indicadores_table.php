<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndicadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicadores', function (Blueprint $table) {
            $table->id();
            $table->string('anio');
            $table->string('mes');
            $table->string('id_usuario');
            $table->string('id_dependencia');
            $table->string('id_denuncias');
            $table->string('id_victimas');
            $table->string('id_carpetas_detenidos');
            $table->string('id_ordenes');
            $table->string('id_detenidos_cii');
            $table->string('id_procedimientos_cii');
            $table->string('id_procedimientos_vinculaciones');
            $table->string('id_vinculados_proceso');
            $table->string('id_imputados');
            $table->int('indicadores_id');
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
        Schema::dropIfExists('indicadores');
    }
}
