<?php namespace App\Services;

use App\Repositories\CaronaCaroneiroRepository;
use App\Repositories\CaronaMotoristaRepository;
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
		
		if($motoristaLivre && $caroneiro){
			foreach ($motoristaLivre as $key => $motorista) {
				return $motorista->cd_latitude_origem; 
				$teste[] = $this->calculaDistancia($motorista, $caroneiro);
			}
		}
		
		return $teste;
	}

	public function calculaDistancia($motorista, $caroneiro)
	{
		$latitudeMotorista = $motorista->cd_latitude_origem;
		$longitudeMotorista = $motorista->cd_longitude_origem;

		$latitudeCaroneiro = $caroneiro->cd_latitude_origem;
		$longitudeCaroneiro = $caroneiro->cd_longitude_origem;

		$latitudeMotorista  = deg2rad((float) $latitudeMotorista);
		$latitudeCaroneiro  = deg2rad((float) $latitudeCaroneiro);
		$longitudeMotorista = deg2rad((float) $longitudeMotorista);
		$longitudeCaroneiro = deg2rad((float) $longitudeCaroneiro);

		$dist = (6371 * acos(cos($latitudeMotorista) * cos($latitudeCaroneiro) * cos($longitudeCaroneiro - $longitudeMotorista) + sin($latitudeMotorista) * sin($latitudeCaroneiro)));
		$dist = number_format($dist, 2, '.', '');
		return $dist;
	}
}