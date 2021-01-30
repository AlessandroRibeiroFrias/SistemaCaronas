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

    public function getMotoristaLivre($id_carona_caroneiro)
    {
        $retorno = DB::table('carona_motorista as cm')
            ->select(
               'cm.id_carona_motorista',
                'cm.motorista_id',
                'm.nm_motorista',
                'm.nm_carro',
                'origem.nm_uf as nm_uf_origem',
                'origem.nm_municipio as nm_municipio_origem',
                'origem.cd_longitude as cd_longitude_origem',
                'origem.cd_latitude as cd_latitude_origem',
                'destino.nm_uf as nm_uf_destino',
                'destino.nm_municipio as nm_municipio_destino',
                'destino.cd_longitude as cd_longitude_destino',
                'destino.cd_latitude as cd_latitude_destino',
                'cm.raio'
            )
            ->join('endereco as origem', 'cm.endereco_origem_id', '=', 'origem.id_endereco')
            ->join('endereco as destino', 'cm.endereco_destino_id', '=', 'destino.id_endereco')
            ->join('motorista as m', 'cm.motorista_id', '=', 'm.id_motorista')
            ->where('cm.status_id', 4)
            ->whereNotExists(function ($query) {
                $query->select(
                            DB::raw(1)
                        )
                        ->from('viagem as v')
                        ->whereColumn('v.carona_motorista_id', 'cm.id_carona_motorista')
                        ->groupby('v.carona_motorista_id')
                        ->havingRaw('COUNT(v.caroneiro_id) >= cm.qtd_max_passageiro');
            })
            ->get();

        return $retorno;
    }
}