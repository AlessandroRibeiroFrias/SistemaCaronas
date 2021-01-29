<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use App\Core\ResponseDefault;
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
        return ResponseDefault::json($r);
	}
	
	public function show($id)
    {
        $r = $this->service->show($id);
        return ResponseDefault::json($r);
	}
	
	public function update(Request $request, $id)
    {
        $r = $this->service->update($request, $id);
        return ResponseDefault::json($r);
	}
	
	public function destroy($id)
    {
        $r = $this->service->destroy($id);
        return ResponseDefault::json($r);
	}
	
	public function store(Request $request)
    {
        $r = $this->service->store($request);
        return ResponseDefault::json($r);
	}
}
