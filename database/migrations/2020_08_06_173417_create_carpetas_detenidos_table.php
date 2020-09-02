<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarpetasDetenidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpetas_detenidos', function (Blueprint $table) {
            $table->id();
            $table->string('detenido_flagancia');
            $table->string('sin_detenidos');
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
        Schema::dropIfExists('carpetas_detenidos');
    }
}
