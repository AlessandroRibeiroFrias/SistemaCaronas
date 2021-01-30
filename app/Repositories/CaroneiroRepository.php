<?php namespace App\Repositories;

use App\Models\Caroneiro;
use Illuminate\Support\Facades\DB;

class CaroneiroRepository {

   private $caroneiro;

   public function __construct()
   {

      $this->caroneiro = new Caroneiro();

   }

   public function getRules()
   {

      return $this->caroneiro->getRules();

   }

   public function getMessage()
   {

      return $this->caroneiro->getMessage();

   }

   public function index()
   {

      return Caroneiro::all();

   }

   public function show($id_caroneiro)
   {

      return Caroneiro::find($id_caroneiro);

   }

   public function update($caroneiroChange, $dados)
   {

      $caroneiroChange->nm_caroneiro = $dados->nm_caroneiro;
      $caroneiroChange->save();

   }

   public function destroy($caroneiroDelete, $id)
   {
      
      $caroneiroDelete->delete($id);

   }

   public function store($dados)
   {

      $this->caroneiro->nm_caroneiro = $dados->nm_caroneiro;
      $this->caroneiro->save();

   }
}