<?php namespace App\Services;

use App\Repositories\CaronaCaroneiroRepository;

class CaronaCaroneiroService extends Service{

    public function __construct(CaronaCaroneiroRepository $r) {
		parent::__construct($r);
	}
}