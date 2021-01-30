<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolicitacaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solicitacao', function (Blueprint $table) {
            $table->bigIncrements('id_solicitacao');

            $table->unsignedBigInteger('carona_caroneiro_id')->unsigned();
            $table->foreign('carona_caroneiro_id')->references('id_carona_caroneiro')->on('carona_caroneiro');

            $table->unsignedBigInteger('carona_motorista_id')->unsigned();
            $table->foreign('carona_motorista_id')->references('id_carona_motorista')->on('carona_motorista');

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
        Schema::dropIfExists('solicitacao');
    }
}
