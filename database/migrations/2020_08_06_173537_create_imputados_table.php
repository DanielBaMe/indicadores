<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImputadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imputados', function (Blueprint $table) {
            $table->id();
            $table->string('sent_conden');
            $table->string('sent_absolut');
            $table->string('conden_oral');
            $table->string('absolut_oral');
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
        Schema::dropIfExists('imputados');
    }
}
