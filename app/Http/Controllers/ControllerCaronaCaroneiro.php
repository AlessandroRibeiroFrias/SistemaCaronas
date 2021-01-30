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
		return $r;
        return ResponseDefault::json($r);
	}
}
