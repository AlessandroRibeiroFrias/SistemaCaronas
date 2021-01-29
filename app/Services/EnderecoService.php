<?php namespace App\Services;

use App\Repositories\EnderecoRepository;

class EnderecoService extends Service {

  public function __construct(EnderecoRepository $r) {
		parent::__construct($r);
	}
}