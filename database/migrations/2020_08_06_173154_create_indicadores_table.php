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
            $table->string('id_usuario')->nullable();
            $table->string('id_dependencia')->nullable();
            $table->string('id_denuncias')->nullable();
            $table->string('id_victimas')->nullable();
            $table->string('id_carpetas_detenidos')->nullable();
            $table->string('id_ordenes')->nullable();
            $table->string('id_detenidos_cii')->nullable();
            $table->string('id_procedimientos_cii')->nullable();
            $table->string('id_procedimientos_vinculaciones')->nullable();
            $table->string('id_vinculados_proceso')->nullable();
            $table->string('id_imputados')->nullable();
            $table->integer('indicadores_id')->nullable();
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
