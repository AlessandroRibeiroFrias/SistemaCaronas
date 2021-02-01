<?php namespace App\Services;

use App\Repositories\CaronaMotoristaRepository;
use Illuminate\Support\Facades\Validator;
use App\Repositories\SolicitacaoRepository;
use App\Repositories\ViagemRepository;
use App\Core\ResponseDefault;

class CaronaMotoristaService extends Service{

    public function __construct(CaronaMotoristaRepository $r) {
		parent::__construct($r);
    }

    public function getSolicitacao()
    {
        $solicitacao = new SolicitacaoRepository();
        $retorno = $solicitacao->getCaroneiro();

        if(count($retorno) <= 0 ){
			$retorno = ['Não existe solicitações de carona pendente.'];
			return ResponseDefault::retorno($retorno, 422);
		}
		return ResponseDefault::retorno($retorno, 200);
    }

    public function requestValidacao($dados)
    {
        $solicitacao = new SolicitacaoRepository();

		$validator = Validator::make($dados->all(), $solicitacao->getRulesSolicitacaoRequest(), $solicitacao->getMessageSolicitacaoRequest());
        

        if ($validator->fails()) 
        {
            return ResponseDefault::retorno($validator->messages(), 422);
        }
        
        $r = $solicitacao->show($dados->id_solicitacao);
        
        if(!$r){
            $retorno = ['Solicitação não encontrada'];
		    return ResponseDefault::retorno($retorno, 404);    
        }

        
        switch ($dados->aprovacao) {
            case 1:
                $status_id = 4;
               
                $dadosSolicitacao = $solicitacao->getSolicitacao($dados->id_solicitacao);
                $dadosSolicitacao->id_status = $status_id;

                $retornoValidSaveViagem = $this->validSaveViagem($dadosSolicitacao);

                if($retornoValidSaveViagem['valid'] == false){
                    return ResponseDefault::retorno($retornoValidSaveViagem['message'], 422);
                }

                break;
            case 0:
                $status_id = 7;    
                break;
            
            default:
                $retorno = ['Valor inválido para aprovação.'];
                return ResponseDefault::retorno($retorno, 422); 
                break;
        }

		$solicitacao->updateStatus($r, $status_id);

		$retorno = ['Solicitação atualizada com sucesso'];
		return ResponseDefault::retorno($retorno, 200);
    }

    public function validSaveViagem($dadosSolicitacao)
    {
        $viagemRepository = new ViagemRepository();
        $viagem = $viagemRepository->getQuantidade($dadosSolicitacao);

        $retorno = [
            "valid" => true
        ];

        if($viagem->qtdCaroneiro >= $dadosSolicitacao->qtd_max_passageiro){
            $retorno = [
                "valid" => false,
                "message" => "Limite máximo de passageiros atingido!"
            ];

            $viagemRepository->updateStatusViagem($viagem->carona_motorista_id, 5);
            $this->repository->updateStatusCaronaMotorista($viagem->carona_motorista_id, 5);

            return $retorno;
        }

        $viagemRepository->store($dadosSolicitacao);
        return $retorno;
    }

}