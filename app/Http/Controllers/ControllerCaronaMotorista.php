<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CaronaMotoristaService;
use Response;
use App\Core\ResponseDefault;

class ControllerCaronaMotorista extends Controller
{
    
	public function __construct(CaronaMotoristaService $s) 
	{

		parent::__construct($s);

	}

	public function getSolicitacao($id_motorista)
	{
		$r = $this->service->getSolicitacao($id_motorista);
        return ResponseDefault::json($r);
	}

	public function requestValidacao(Request $request)
	{
		$r = $this->service->requestValidacao($request);
		return ResponseDefault::json($r);
	}
}
