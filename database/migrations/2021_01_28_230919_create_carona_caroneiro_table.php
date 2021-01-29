<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaronaCaroneiroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carona_caroneiro', function (Blueprint $table) {
            $table->bigIncrements('id_carona_caroneiro');
            
            $table->unsignedBigInteger('endereco_destino_id')->unsigned();
            $table->foreign('endereco_destino_id')->references('id_endereco')->on('endereco');
           
            $table->unsignedBigInteger('caroneiro_id')->unsigned();
            $table->foreign('caroneiro_id')->references('id_caroneiro')->on('caroneiro');
            
            $table->unsignedBigInteger('endereco_origem_id')->unsigned();
            $table->foreign('endereco_origem_id')->references('id_endereco')->on('endereco');

            $table->unsignedBigInteger('status_id')->unsigned();
            $table->foreign('status_id')->references('id_status')->on('status');

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
        Schema::dropIfExists('carona_caroneiro');
    }
}
