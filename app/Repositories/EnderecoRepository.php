<?php namespace App\Repositories;

use App\Models\Endereco;
use Illuminate\Support\Facades\DB;

class EnderecoRepository {

    public function index(){
        return Endereco::all();
     }
 
    public function show($id_endereco){
       return Endereco::find($id_endereco);
    }
}