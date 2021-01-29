<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaroneiroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caroneiro', function (Blueprint $table) {
            $table->bigIncrements('id_caroneiro');
            $table->string('nm_caroneiro');
            $table->timestamps();
        });

        $dados = array(
            ['nm_caroneiro' => 'José Francisco'],
            ['nm_caroneiro' => 'Mario Ricardo'],
            ['nm_caroneiro' => 'Maria Elena']
        );

        DB::table('caroneiro')->insert($dados);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('caroneiro');
    }
}
