<?php

namespace App\Http\Controllers;
use App\Services\CaroneiroService;
use Illuminate\Http\Request;
use Response;

class ControllerCaroneiro extends Controller
{
    
    public function __construct(CaroneiroService $s) {
		parent::__construct($s);
	}
}
