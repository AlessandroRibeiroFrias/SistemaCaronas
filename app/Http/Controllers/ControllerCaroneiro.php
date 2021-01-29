<?php

namespace App\Http\Controllers;
use App\Services\CaroneiroService;
use Illuminate\Http\Request;
use Response;

class ControllerCaroneiro extends Controller
{
    // private $service;

    // public function __construct() {
	// 	$this->service = new CaroneiroService();
    // }

    public function __construct(CaroneiroService $s) {
		parent::__construct($s);
	}

    public function index()
    {
        $r = $this->service->index();
        return Response::json($r);
    }

    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

   
    public function show($id_caroneiro)
    {
        $r = $this->service->show($id_caroneiro);
        return Response::json($r);
    }

   
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
