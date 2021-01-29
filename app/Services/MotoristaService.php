<?php namespace App\Services;

use App\Repositories\MotoristaRepository;
use Illuminate\Support\Facades\Validator;

class MotoristaService extends Service{

    public function __construct(MotoristaRepository $r) {
		parent::__construct($r);
    }

    // public function update($dados, $id){
    //     $motoristaChange = $this->repository->show($id);
    //     $validator = Validator::make($dados->all(), $this->repository->getRules(), $this->repository->getMessage());

    //     if(!$motoristaChange){
    //         return [
    //            "data" => "Informações não encontrada.",
    //            "valid" => false,
    //            "status_code" => 404
    //         ];
    //     }

    //     if ($validator->fails()) {
    //         return [
    //            "data" => $validator->messages(),
    //            "valid" => true,
    //            "status_code" => 422
    //         ];
    //     }

    //     $this->repository->update($motoristaChange, $dados);

    //     return [
    //         "data" => "Dados atualizado com sucesso.",
    //         "valid" => true,
    //         "status_code" => 200
    //      ];
    // }
    

}