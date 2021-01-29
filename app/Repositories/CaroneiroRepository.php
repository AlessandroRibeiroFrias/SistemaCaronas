<?php namespace App\Repositories;

use App\Models\Caroneiro;
use Illuminate\Support\Facades\DB;

class CaroneiroRepository {

    public function index(){
       return Caroneiro::all();
    }

   public function show($id_caroneiro){
      return Caroneiro::find($id_caroneiro);
   }

   public function update($dados, $id_caroneiro){
      return Caroneiro::find($id_caroneiro);
   }
}