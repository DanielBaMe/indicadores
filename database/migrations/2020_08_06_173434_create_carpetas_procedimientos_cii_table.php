<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarpetasProcedimientosCiiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpetas_procedimientos_cii', function (Blueprint $table) {
            $table->id();
            $table->string('arch_temporal');
            $table->string('abstencion');
            $table->string('no_ejercicio');
            $table->string('criterio');
            $table->string('incompetencia');
            $table->string('acumulacion');
            $table->string('sobreisimiento');
            $table->string('otra_causa');
            $table->string('otra_decision');
            $table->string('tramite_investigacion');
            $table->string('vinculados');
            $table->string('oemasc_sn_acuerdo');
            $table->string('oesmasc_cn_acuerdo');
            $table->string('resueltos_oemasc_mediacion');
            $table->string('resueltos_oemasc_conciliacion');
            $table->string('resueltos_oemasc_acuerdo');
            $table->string('total');
            $table->integer('indicadores_id');
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
        Schema::dropIfExists('carpetas_procedimientos_cii');
    }
}
