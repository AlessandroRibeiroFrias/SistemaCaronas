<?php namespace App\Services;

use App\Repositories\ViagemRepository;

class ViagemService extends Service{

    public function __construct(ViagemRepository $r) {
		parent::__construct($r);
	}
}