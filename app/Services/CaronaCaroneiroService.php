<?php namespace App\Services;

use App\Repositories\CaronaCaroneiroRepository;
use App\Repositories\CaronaMotoristaRepository;
use App\Repositories\SolicitacaoRepository;
use Illuminate\Support\Facades\Validator;
use App\Core\ResponseDefault;

class CaronaCaroneiroService extends Service{

    public function __construct(CaronaCaroneiroRepository $r) {
		parent::__construct($r);
	}

	public function getCarona($id_carona_caroneiro)
	{
		$caronaMotoristaRepository = new CaronaMotoristaRepository();
		$motoristaLivre = $caronaMotoristaRepository->getMotoristaLivre($id_carona_caroneiro);
		$caroneiro = $this->repository->getPosition($id_carona_caroneiro);
		$motoristaDisponiveis = [];

		if($motoristaLivre && $caroneiro){
			foreach ($motoristaLivre as $key => $motorista) { 
				$distancia = $this->calculaDistancia($motorista, $caroneiro);
				if($distancia <= $motorista->raio){
					$motorista->distancia = $distancia;
					$motoristaDisponiveis[] = $motorista;
					
				}
			}
		}

		if(!$motoristaDisponiveis){
			$this->repository->updateStatusCaroneiro($id_carona_caroneiro, 1);
			$retorno = ['Ainda não existe motorista disponíveis próximos, aguarde!'];
			return ResponseDefault::retorno($retorno, 422);
		}
		
		return ResponseDefault::retorno($motoristaDisponiveis, 200);
	}

	public function calculaDistancia($motorista, $caroneiro)
	{
		$latitudeMotorista = str_replace(",",".",$motorista->cd_latitude_origem);
		$longitudeMotorista = str_replace(",",".",$motorista->cd_longitude_origem);

		$latitudeCaroneiro = str_replace(",",".",$caroneiro->cd_latitude_origem);
		$longitudeCaroneiro = str_replace(",",".",$caroneiro->cd_longitude_origem);

		$latitudeMotorista  = deg2rad((float) $latitudeMotorista);
		$latitudeCaroneiro  = deg2rad((float) $latitudeCaroneiro);
		$longitudeMotorista = deg2rad((float) $longitudeMotorista);
		$longitudeCaroneiro = deg2rad((float) $longitudeCaroneiro);

		$dist = (6371 * acos(cos($latitudeMotorista) * cos($latitudeCaroneiro) * cos($longitudeCaroneiro - $longitudeMotorista) + sin($latitudeMotorista) * sin($latitudeCaroneiro)));
		$dist = number_format($dist, 2, '.', '');
		return $dist;
	}

	public function requestCarona($dados)
    {
		$solicitacao = new SolicitacaoRepository();

		$validator = Validator::make($dados->all(), $solicitacao->getRules(), $solicitacao->getMessage());

        if ($validator->fails()) 
        {
            return ResponseDefault::retorno($validator->messages(), 422);
		}
		
		$solAndamento = $solicitacao->findByCaroneiroMotorista($dados);

		if(count($solAndamento) > 0 ){
			$retorno = ['Já existe uma solicitação de carona para esse endereço.'];
			return ResponseDefault::retorno($retorno, 422);
		}

		$solicitacao->store($dados);

		$retorno = ['Solicitação realizada com sucesso'];
		return ResponseDefault::retorno($retorno, 200);
    }
}