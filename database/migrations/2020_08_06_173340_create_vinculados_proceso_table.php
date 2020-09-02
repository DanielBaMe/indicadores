<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVinculadosProcesoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vinculados_proceso', function (Blueprint $table) {
            $table->id();
            $table->string('pris_prev_oficiosa');
            $table->string('pris_prev_no_oficiosa');
            $table->string('otra_medida');
            $table->string('sin_medida');
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
        Schema::dropIfExists('vinculados_proceso');
    }
}
