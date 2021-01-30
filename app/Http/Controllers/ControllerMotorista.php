<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MotoristaService;
use Response;

class ControllerMotorista extends Controller
{
	public function __construct(MotoristaService $s) 
	{

		parent::__construct($s);
		
	}
}
