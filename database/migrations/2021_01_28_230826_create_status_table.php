<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {
            $table->bigIncrements('id_status');
            $table->string('nm_status');
            $table->timestamps();
        });

        $dados = array(
            ['nm_status' => 'Em espera'],
            ['nm_status' => 'Concluido'],
            ['nm_status' => 'Cancelado'],
            ['nm_status' => 'Disponivel'],
            ['nm_status' => 'Lotado'],
            ['nm_status' => 'Novo'],
            ['nm_status' => 'Recusado']
        );

        DB::table('status')->insert($dados);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('status');
    }
}
