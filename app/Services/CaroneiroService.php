<?php namespace App\Services;

use App\Repositories\CaroneiroRepository;

class CaroneiroService extends Service{

    public function __construct(CaroneiroRepository $r) {
		parent::__construct($r);
	}
}