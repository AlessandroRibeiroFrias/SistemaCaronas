<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaronaMotoristaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carona_motorista', function (Blueprint $table) {
            $table->bigIncrements('id_carona_motorista');

            $table->unsignedBigInteger('motorista_id')->unsigned();
            $table->foreign('motorista_id')->references('id_motorista')->on('motorista');
            
            $table->unsignedBigInteger('endereco_destino_id')->unsigned();
            $table->foreign('endereco_destino_id')->references('id_endereco')->on('endereco');

            $table->unsignedBigInteger('endereco_origem_id')->unsigned();
            $table->foreign('endereco_origem_id')->references('id_endereco')->on('endereco');

            $table->unsignedBigInteger('status_id')->unsigned();
            $table->foreign('status_id')->references('id_status')->on('status');

            $table->integer('qtd_max_passageiro');
            $table->float('raio');

            $table->timestamps();
        });

        $dados = array(
            ['motorista_id' => 1, 'endereco_origem_id' => 2950, 'endereco_destino_id' => 2887, 'status_id' => 4, 'raio' => '30.00', 'qtd_max_passageiro' => 5],
            ['motorista_id' => 2, 'endereco_origem_id' => 334, 'endereco_destino_id' => 2792, 'status_id' => 4, 'raio' => '30.00', 'qtd_max_passageiro' => 5],
        );

        DB::table('carona_motorista')->insert($dados);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carona_motorista');
    }
}
