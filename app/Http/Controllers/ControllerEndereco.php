<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EnderecoService;
use Response;

use Illuminate\Support\Facades\Log;

class ControllerEndereco extends Controller
{
    private $service;

    public function __construct() {
		$this->service = new EnderecoService();
    }
    
    public function index()
    {
        
    }

    public function getEndereco()
    {
        // return Endereco::all();
        $r =  $this->service->getEndereco();
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

    public function show($id)
    {
        //
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
