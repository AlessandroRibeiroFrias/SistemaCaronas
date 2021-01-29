<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotoristaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motorista', function (Blueprint $table) {
            $table->bigIncrements('id_motorista');
            $table->string('nm_motorista');
            $table->string('nm_carro');
            $table->timestamps();
        });

        $dados = array(
            ['nm_motorista' => 'Tiago Junior', 'nm_carro' => 'Gol'],
            ['nm_motorista' => 'Roberto Pacheco' , 'nm_carro' => 'Corsa'],
            ['nm_motorista' => 'Matheus Augusto' , 'nm_carro' => 'Voyage']
        );

        DB::table('motorista')->insert($dados);
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motorista');
    }
}
