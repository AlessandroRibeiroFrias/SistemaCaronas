<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CaronaMotoristaService;
use Response;

class ControllerMotoristaCaroneiro extends Controller
{
    
    public function __construct(CaronaMotoristaService $s) {
		parent::__construct($s);
	}
}
