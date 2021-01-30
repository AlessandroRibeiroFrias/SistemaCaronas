<?php namespace App\Repositories;

use App\Models\CaronaMotorista;
use Illuminate\Support\Facades\DB;

class CaronaMotoristaRepository {

   private $caronaMotorista;

   public function __construct()
   {

        $this->caronaMotorista = new CaronaMotorista();

   }

   public function getRules()
   {

        return $this->caronaMotorista->getRules();

   }

   public function getMessage()
   {

        return $this->caronaMotorista->getMessage();

   }

   public function index()
   {

        return CaronaMotorista::all();

   }

   public function show($id_carona_motorista)
   {

        return CaronaMotorista::find($id_carona_motorista);

   }

   public function update($caronaMotoristaChange, $dados)
   {

        $caronaMotoristaChange->motorista_id = $dados->motorista_id;
        $caronaMotoristaChange->endereco_origem_id = $dados->endereco_origem_id;
        $caronaMotoristaChange->endereco_destino_id = $dados->endereco_destino_id;
        $caronaMotoristaChange->status_id = $dados->status_id;
        $caronaMotoristaChange->qtd_max_passageiro = $dados->qtd_max_passageiro;
        $caronaMotoristaChange->raio = $dados->raio;
        $caronaMotoristaChange->save();

   }

   public function destroy($caronaMotoristaDelete, $id)
   {
      
        $caronaMotoristaDelete->delete($id);

   }

   public function store($dados)
   {

       $this->caronaMotorista->caroneiro_id = $dados->caroneiro_id;
       $this->caronaMotorista->endereco_origem_id = $dados->endereco_origem_id;
       $this->caronaMotorista->endereco_destino_id = $dados->endereco_destino_id;
       $this->caronaMotorista->status_id = $dados->status_id;
       $this->caronaMotorista->qtd_max_passageiro = $dados->qtd_max_passageiro;
       $this->caronaMotorista->raio = $dados->raio;
       $this->caronaMotorista->save();

   }
}