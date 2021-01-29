<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $service;

	public function __construct($s) {
		$this->service = $s;
	}

	public function index()
    {
        $r = $this->service->index();
        return Response::json($r);
	}
	
	public function show($id)
    {
        $r = $this->service->show($id);
        return Response::json($r);
    }
}
