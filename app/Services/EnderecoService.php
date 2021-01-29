<?php namespace App\Services;

use App\Repositories\EnderecoRepository;

class EnderecoService {

    private $repository;

    public function __construct() {
		$this->repository = new EnderecoRepository();
    }

    public function getEndereco(){
       return $this->repository->getEndereco();
    }
}