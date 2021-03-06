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

            $table->unsignedBigInteger('status_id')->unsigned();
            $table->foreign('status_id')->references('id_status')->on('status');

            $table->timestamps();
        });

        $dados = array(
            ['caroneiro_id' => 1, 'carona_motorista_id' => 1, 'status_id' => 4],
            ['caroneiro_id' => 2, 'carona_motorista_id' => 1, 'status_id' => 4]
        );

        DB::table('viagem')->insert($dados);

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
