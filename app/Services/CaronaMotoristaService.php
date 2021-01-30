<?php namespace App\Services;

use App\Repositories\CaronaMotoristaRepository;
use Illuminate\Support\Facades\Validator;

class CaronaMotoristaService extends Service{

    public function __construct(CaronaMotoristaRepository $r) {
		parent::__construct($r);
    }

}