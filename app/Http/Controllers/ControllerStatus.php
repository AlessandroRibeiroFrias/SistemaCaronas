<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControllerStatus extends Controller
{
    public function __construct(StatusService $s) {
		parent::__construct($s);
	}
}
