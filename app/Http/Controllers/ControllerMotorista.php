<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerMotorista extends Controller
{
    public function __construct(MotoristaService $s) {
		parent::__construct($s);
	}
}
