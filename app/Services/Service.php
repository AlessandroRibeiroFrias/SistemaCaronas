<?php namespace App\Services;

use Illuminate\Support\Facades\Validator;

class Service{

    protected $repository;

    public function __construct($r) 
    {

        $this->repository = $r;
        
	}

    public function index()
    {
        $retorno =  $this->repository->index();

        if(!$retorno)
        {
            return [
                "data" => [],
                "message" => "Dados não encontrados.",
                "valid" => false,
                "status_code" => 404
            ];
        }

        return [
            "data" => $retorno,
            "message" => "Dados encontrados.",
            "valid" => true,
            "status_code" => 200
        ];
    }

    public function show($id)
    {
        $retorno =  $this->repository->show($id);
        if(!$retorno)
        {
            return [
                "data" => [],
                "message" => "Dado não encontrado.",
                "valid" => false,
                "status_code" => 404
            ];
        }

        return [
            "data" => $retorno,
            "message" => "Dado encontrado.",
            "valid" => true,
            "status_code" => 200
        ];
    }

    public function update($dados, $id)
    {
        $dadosChange = $this->repository->show($id);
        
        if(!$dadosChange)
        {
            return [
                "data" => [],
                "message" => "Dado não encontrado",
                "valid" => false,
                "status_code" => 404
            ];
        }
        
        $validator = Validator::make($dados->all(), $this->repository->getRules(), $this->repository->getMessage());

        if ($validator->fails()) 
        {
            return [
                "data" => [],
                "message" => $validator->messages(),
                "valid" => true,
                "status_code" => 422
            ];
        }

        $this->repository->update($dadosChange, $dados);

        return [
            "data" => [],
            "message" => "Dado atualizado com sucesso.",
            "valid" => true,
            "status_code" => 200
         ];

    }

    public function destroy($id)
    {
        $dadosDestroy = $this->repository->show($id);
        
        if(!$dadosDestroy)
        {
            return [
                "data" => [],
                "message" => "Dados não encontrado",
                "valid" => false,
                "status_code" => 404
            ];
        }

        $this->repository->destroy($dadosDestroy, $id);

        return [
            "data" => [],
            "message" => "Dado removido com sucesso.",
            "valid" => true,
            "status_code" => 200
         ];

    }

    public function store($dados)
    {
        $validator = Validator::make($dados->all(), $this->repository->getRules(), $this->repository->getMessage());

        if ($validator->fails()) 
        {
            return [
                "data" => [],
                "message" => $validator->messages(),
                "valid" => true,
                "status_code" => 422
            ];
        }

        $this->repository->store($dados);

        return [
            "data" => [],
            "message" => "Dados cadastrados com sucesso.",
            "valid" => true,
            "status_code" => 200
         ];

    }

}