<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcedimientosVinculacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedimientos_vinculaciones', function (Blueprint $table) {
            $table->id();
            $table->string('tramite_juez');
            $table->string('criterio_oportunidad');
            $table->string('tramite_suspencion');
            $table->string('cumplimiento_suspencion');
            $table->string('resueltos_otros');
            $table->string('tramite_proces_abreviado');
            $table->string('resuelto_proces_abreviado');
            $table->string('tramite_tributal');
            $table->string('resueltos_juicio_oral');
            $table->string('oemasc_sn_acuerdo');
            $table->string('oemasc_cn_acuerdo');
            $table->string('resueltos_oemasc_mediacion');
            $table->string('resueltos_oemasc_conciliacion');
            $table->string('resueltos_oemasc_acuerdo');
            $table->string('total');
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
        Schema::dropIfExists('procedimientos_vinculaciones');
    }
}
