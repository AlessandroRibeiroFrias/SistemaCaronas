<?php namespace App\Repositories;

use App\Models\Motorista;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class MotoristaRepository {

   private $motorista;

   public function __construct(){
      $this->motorista = new Motorista();
   }

   public function getRules(){
      return $this->motorista->getRules();
   }

   public function getMessage(){
      return $this->motorista->getMessage();
   }


   public function index(){
      return Motorista::all();
   }

   public function show($id_motorista){
      return Motorista::find($id_motorista);
   }

   public function update($motoristaChange, $dados){
      // $motoristaChange = Motorista::find($id_motorista);
      // $validator = Validator::make($dados->all(), $this->motorista->getRules(), $this->motorista->getMessage());

      // if(!$motoristaChange){
      //    return [
      //       "data" => "Não foi encontrado esse motorista!",
      //       "valid" => false,
      //       "status_code" => 404
      //    ];
      // }

      // if ($validator->fails()) {
      //    return [
      //       "data" => $validator->messages(),
      //       "valid" => true,
      //       "status_code" => 422
      //    ];
      // }

      $motoristaChange->nm_motorista = $dados->nm_motorista;
      $motoristaChange->nm_carro = $dados->nm_carro;
      $motoristaChange->save();

      // return [
      //    "data" => "Motorista alterado com sucesso!",
      //    "valid" => true,
      //    "status_code" => 200
      // ];

  }
}