<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViagemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viagem', function (Blueprint $table) {
            $table->bigIncrements('id_viagem');

            $table->unsignedBigInteger('caroneiro_id')->unsigned();
            $table->foreign('caroneiro_id')->references('id_caroneiro')->on('caroneiro');

            $table->unsignedBigInteger('carona_motorista_id')->unsigned();
            $table->foreign('carona_motorista_id')->references('id_carona_motorista')->on('carona_motorista');

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
        Schema::dropIfExists('viagem');
    }
}
