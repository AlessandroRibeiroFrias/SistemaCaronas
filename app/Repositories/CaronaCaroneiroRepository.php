<?php namespace App\Repositories;

use App\Models\CaronaCaroneiro;
use Illuminate\Support\Facades\DB;

class CaronaCaroneiroRepository {

   private $caronaCaroneiro;

   public function __construct()
   {

        $this->caronaCaroneiro = new CaronaCaroneiro();

   }

   public function getRules()
   {

        return $this->caronaCaroneiro->getRules();

   }

   public function getMessage()
   {

        return $this->caronaCaroneiro->getMessage();

   }

   public function index()
   {

        return CaronaCaroneiro::all();

   }

   public function show($id_carona_caroneiro)
   {

        return CaronaCaroneiro::find($id_carona_caroneiro);

   }

   public function update($caronaCaroneiroChange, $dados)
   {

        $caronaCaroneiroChange->caroneiro_id = $dados->caroneiro_id;
        $caronaCaroneiroChange->endereco_origem_id = $dados->endereco_origem_id;
        $caronaCaroneiroChange->endereco_destino_id = $dados->endereco_destino_id;
        $caronaCaroneiroChange->status_id = $dados->status_id;
        $caronaCaroneiroChange->save();

   }

   public function destroy($caronaCaroneiroDelete, $id)
   {
      
        $caronaCaroneiroDelete->delete($id);

   }

   public function store($dados)
   {

       $this->caronaCaroneiro->caroneiro_id = $dados->caroneiro_id;
       $this->caronaCaroneiro->endereco_origem_id = $dados->endereco_origem_id;
       $this->caronaCaroneiro->endereco_destino_id = $dados->endereco_destino_id;
       $this->caronaCaroneiro->status_id = $dados->status_id;
       $this->caronaCaroneiro->save();

   }
}