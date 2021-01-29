<?php namespace App\Repositories;

use App\Models\Endereco;
use Illuminate\Support\Facades\DB;

class EnderecoRepository {

    public function getEndereco(){
       return DB::table('endereco')->where('id_endereco', 4932)->get();
    }
}