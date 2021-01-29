<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorista extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_motorista';
    protected $table = 'motorista';

    protected $rules = [
		'nm_motorista' => 'required',
		'nm_carro' => 'required'
	];

	protected $messages = [
	    'nm_motorista.required' => 'Nome do motorista é obrigatório.',
	    'nm_carro.required' => ' Nome do carro é obrigatório.'
    ];
    
    public function getRules(){
        return $this->rules;
    }

    public function getMessage(){
        return $this->messages;
    }

    
}
