<?php namespace App\Services;

use Illuminate\Support\Facades\Validator;

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

    public function update($dados, $id){
        $dadosChange = $this->repository->show($id);
        
        if(!$dadosChange){
            return [
                "data" => "Informações não encontrada.",
                "valid" => false,
                "status_code" => 404
            ];
        }
        
        $validator = Validator::make($dados->all(), $this->repository->getRules(), $this->repository->getMessage());

        if ($validator->fails()) {
            return [
               "data" => $validator->messages(),
               "valid" => true,
               "status_code" => 422
            ];
        }

        $this->repository->update($dadosChange, $dados);

        return [
            "data" => "Dados atualizado com sucesso.",
            "valid" => true,
            "status_code" => 200
         ];
    }

}