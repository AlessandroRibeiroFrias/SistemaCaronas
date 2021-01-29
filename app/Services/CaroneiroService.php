<?php namespace App\Services;

use App\Repositories\CaroneiroRepository;

class CaroneiroService {

    private $repository;

    public function __construct() {
		$this->repository = new CaroneiroRepository();
    }

    public function index(){
       return $this->repository->index();
    }

    public function show($id_caroneiro){
        return $this->repository->show($id_caroneiro);
     }
}