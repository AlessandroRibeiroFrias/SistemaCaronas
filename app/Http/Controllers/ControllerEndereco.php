<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\EnderecoService;
use Response;

use Illuminate\Support\Facades\Log;

class ControllerEndereco extends Controller
{
    public function __construct(EnderecoService $s) 
    {

        parent::__construct($s);
        
    }
    
}
