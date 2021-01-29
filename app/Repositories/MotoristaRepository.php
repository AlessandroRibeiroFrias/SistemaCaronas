<?php namespace App\Repositories;

use App\Models\Motorista;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class MotoristaRepository {

   private $motorista;

   public function __construct()
   {

      $this->motorista = new Motorista();

   }

   public function getRules()
   {

      return $this->motorista->getRules();

   }

   public function getMessage()
   {

      return $this->motorista->getMessage();

   }

   public function index(){

      return Motorista::all();

   }

   public function show($id_motorista){

      return Motorista::find($id_motorista);

   }

   public function update($motoristaChange, $dados){

      $motoristaChange->nm_motorista = $dados->nm_motorista;
      $motoristaChange->nm_carro = $dados->nm_carro;
      $motoristaChange->save();

   }

   public function destroy($motoristaDelete, $id)
   {
      
      $motoristaDelete->delete($id);

   }

   public function store($dados){

      $this->motorista->nm_motorista = $dados->nm_motorista;
      $this->motorista->nm_carro = $dados->nm_carro;
      $this->motorista->save();

   }
}