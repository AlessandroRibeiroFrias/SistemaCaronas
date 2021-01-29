<?php namespace App\Services;

use App\Repositories\MotoristaRepository;
use Illuminate\Support\Facades\Validator;

class MotoristaService extends Service{

    public function __construct(MotoristaRepository $r) {
		parent::__construct($r);
    }

}