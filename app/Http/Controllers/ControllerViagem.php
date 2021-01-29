<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerViagem extends Controller
{
    public function __construct(ViagemService $s) {
		parent::__construct($s);
	}
}
