<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CaroneiroService;
use Response;

class ControllerCaroneiro extends Controller
{
    
    public function __construct(CaroneiroService $s) {
		parent::__construct($s);
	}
}
