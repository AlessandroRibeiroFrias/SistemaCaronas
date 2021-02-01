<?php namespace App\Repositories;

use App\Models\Solicitacao;
use Illuminate\Support\Facades\DB;

class SolicitacaoRepository {

    private $solicitacao;

    public function __construct()
    {

        $this->solicitacao = new Solicitacao();

    }

    public function getRules()
    {

        return $this->solicitacao->getRules();

    }

    public function getMessage()
    {

        return $this->solicitacao->getMessage();

    }

    public function getRulesSolicitacaoRequest()
    {

        return $this->solicitacao->getRulesSolicitacaoRequest();

    }

    public function getMessageSolicitacaoRequest()
    {

        return $this->solicitacao->getMessageSolicitacaoRequest();

    }

    public function index()
    {

        return Solicitacao::all();

    }

    public function show($id_solicitacao)
    {

        return Solicitacao::find($id_solicitacao);

    }

    public function update($solicitacaoChange, $dados)
    {

        $solicitacaoChange->carona_caroneiro_id = $dados->carona_caroneiro_id;
        $solicitacaoChange->carona_motorista_id = $dados->carona_motorista_id;
        $solicitacaoChange->status_id = $dados->status_id;
        $solicitacaoChange->save();

    }

    public function destroy($solicitacaoDelete, $id)
    {

        $solicitacaoDelete->delete($id);

    }

   public function store($dados)
   {

        $this->solicitacao->carona_caroneiro_id = $dados->carona_caroneiro_id;
        $this->solicitacao->carona_motorista_id = $dados->carona_motorista_id;
        $this->solicitacao->status_id = 6;
        $this->solicitacao->save();

   }

    public function findByCaroneiroMotorista($dados)
    {
        $retorno = DB::table('solicitacao as sol')
            ->select('sol.id_solicitacao')
            ->where('sol.carona_motorista_id', $dados->carona_motorista_id)
            ->where('sol.carona_caroneiro_id', $dados->carona_caroneiro_id)
            ->where('sol.status_id', 6)
            ->get();
        
        return $retorno;
    }

    public function getCaroneiro($id_motorista)
    {
        $retorno = DB::table('solicitacao as sol')
            ->select(
                'sol.id_solicitacao',
                'c.id_caroneiro',
                'c.nm_caroneiro',
                'origem.nm_uf as nm_uf_origem',
                'origem.nm_municipio as nm_municipio_origem',
                'destino.nm_uf as nm_uf_destino',
                'destino.nm_municipio as nm_municipio_destino'
            )
            ->join('carona_caroneiro as cc', 'sol.carona_caroneiro_id', '=', 'cc.id_carona_caroneiro')
            ->join('carona_motorista as cm', 'sol.carona_motorista_id', '=', 'cm.id_carona_motorista')
            ->join('caroneiro as c', 'cc.caroneiro_id', '=', 'c.id_caroneiro')
            ->join('endereco as origem', 'cc.endereco_origem_id', '=', 'origem.id_endereco')
            ->join('endereco as destino', 'cc.endereco_destino_id', '=', 'destino.id_endereco')
            ->where('sol.status_id', 6)
            ->where('cm.motorista_id', $id_motorista)
            ->get();

        return $retorno;
    }

    public function updateStatus($solicitacaoChange, $status_id)
    {

        $solicitacaoChange->status_id = $status_id;
        $solicitacaoChange->save();
 
    }

    public function getSolicitacao($id_solicitacao)
    {
        $retorno = DB::table('solicitacao as sol')
            ->select(
                'sol.id_solicitacao',
                'sol.carona_motorista_id',
                'sol.carona_caroneiro_id',
                'cc.caroneiro_id',
                'cm.motorista_id',
                'cm.qtd_max_passageiro'
            )
            ->join('carona_caroneiro as cc', 'sol.carona_caroneiro_id', '=', 'cc.id_carona_caroneiro')
            ->join('carona_motorista as cm', 'sol.carona_motorista_id', '=', 'cm.id_carona_motorista')
            ->where('sol.id_solicitacao', $id_solicitacao)
            ->first();

        return $retorno;
    }

    public function getStatusCarona($id_solicitacao)
    {
        $retorno = DB::table('solicitacao as sol')
            ->select(
                'sol.id_solicitacao',
                'm.nm_motorista',
                's.nm_status'
            )
            ->join('status as s', 's.id_status', '=', 'sol.status_id')
            ->join('carona_motorista as cm', 'sol.carona_motorista_id', '=', 'cm.id_carona_motorista')
            ->join('motorista as m', 'm.id_motorista', '=', 'cm.motorista_id')
            ->where('sol.id_solicitacao', $id_solicitacao)
            ->get();

        return $retorno;
    }
}