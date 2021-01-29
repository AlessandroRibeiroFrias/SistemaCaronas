<?php namespace App\Services;

class Service{

    protected $repository;

	public function __construct($r) {
		$this->repository = $r;
	}

    public function index(){
        return $this->repository->index();
    }

    public function show($id){
        return $this->repository->show($id);
    }
}