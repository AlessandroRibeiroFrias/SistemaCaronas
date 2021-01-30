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

      $solicitacaoChange->nm_solicitacao = $dados->nm_solicitacao;
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
            ->where('sol.carona_caroneiro_id', $dados->carona_motorista_id)
            ->where('sol.status_id', 6)
            ->get();
        
        return $retorno;
   }
}