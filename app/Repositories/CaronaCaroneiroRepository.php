<?php namespace App\Repositories;

use App\Models\CaronaCaroneiro;
use App\Models\Solicitacao;
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
       /* Cadastra a Carona do Caroneiro com Status Novo */
       $this->caronaCaroneiro->status_id = 6;
       $this->caronaCaroneiro->save();

   }

    public function getPosition($id_carona_caroneiro)
    {
        $retorno = DB::table('carona_caroneiro as cc')
            ->select(
                'cc.id_carona_caroneiro',
                'origem.nm_municipio as nm_municipio_origem',
                'origem.nm_uf as nm_uf_origem',
                'origem.cd_longitude as cd_longitude_origem',
                'origem.cd_latitude as cd_latitude_origem',
                'destino.nm_municipio as nm_municipio_destino',
                'destino.nm_uf as nm_uf_destino',
                'destino.cd_longitude as cd_longitude_destino',
                'destino.cd_latitude as cd_latitude_destino'
            )
            ->join('endereco as origem', 'cc.endereco_origem_id', '=', 'origem.id_endereco')
            ->join('endereco as destino', 'cc.endereco_destino_id', '=', 'destino.id_endereco')
            ->where('cc.status_id', 1)
            ->where('cc.id_carona_caroneiro', $id_carona_caroneiro)
            ->first();

        return $retorno;
    }

     public function updateStatusCaroneiro($id_carona_caroneiro, $status)
     {
        $caronaCaroneiro = CaronaCaroneiro::find($id_carona_caroneiro);
        $caronaCaroneiro->status_id = $status;
        $caronaCaroneiro->save();
     }

}