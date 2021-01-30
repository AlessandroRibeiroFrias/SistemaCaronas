<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CaronaCaroneiroService;
use Response;
use App\Core\ResponseDefault;

class ControllerCaronaCaroneiro extends Controller
{
    
    public function __construct(CaronaCaroneiroService $s) {
		parent::__construct($s);
	}

	public function getCarona($id_carona_caroneiro)
	{
		$r = $this->service->getCarona($id_carona_caroneiro);

        return ResponseDefault::json($r);
	}

	public function requestCarona(Request $request)
	{
		$r = $this->service->requestCarona($request);
        return ResponseDefault::json($r);
	}

}
