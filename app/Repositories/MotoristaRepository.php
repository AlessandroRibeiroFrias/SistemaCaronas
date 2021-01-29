<?php namespace App\Repositories;

use App\Models\Motorista;
use Illuminate\Support\Facades\DB;

class MotoristaRepository {

    public function index(){
       return Motorista::all();
    }

    public function show($id_motorista){
        return Motorista::find($id_motorista);
     }
}