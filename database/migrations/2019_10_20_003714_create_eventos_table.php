<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->increments('id');
            //$table->integer('tipo_id')->unsigned();
            //$table->foreign('tipo_id')->references('id')->on('tipos')->onDelete('cascade');
            $table->date('fecha')->nullable(True);
            $table->time('hora_inicio')->nullable(True);
            $table->time('hora_fin')->nullable(True);
            $table->string('nombre');
            $table->string('descripcion');
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
        Schema::dropIfExists('eventos');
    }
}
