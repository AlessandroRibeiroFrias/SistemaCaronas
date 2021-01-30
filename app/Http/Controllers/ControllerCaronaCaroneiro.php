<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CaronaCaroneiroService;
use Response;

class ControllerCaronaCaroneiro extends Controller
{
    
    public function __construct(CaronaCaroneiroService $s) {
		parent::__construct($s);
	}
}
