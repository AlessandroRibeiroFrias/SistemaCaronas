<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaronaMotorista extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_carona_motorista';
    protected $table = 'carona_motorista';

    protected $rules = [
		'motorista_id' => 'required',
		'endereco_origem_id' => 'required',
		'endereco_destino_id' => 'required',
		'status' => 'required',
		'qtd_max_passageiro' => 'required',
		'raio' => 'required',
	];

	protected $messages = [
	    'motorista_id.required' => 'Código do motorista é obrigatório.',
	    'endereco_origem_id.required' => 'Endereço de origem do motorista é obrigatório.',
	    'endereco_destino_id.required' => 'Endereço de destino do motorista é obrigatório.',
	    'status.required' => 'Status do motorista é obrigatório.',
	    'qtd_max_passageiro.required' => 'Quantidade máxima do motorista é obrigatório.',
	    'raio.required' => 'Raio do motorista é obrigatório.',
    ];

    public function getRules()
    {

        return $this->rules;

    }

    public function getMessage()
    {

        return $this->messages;
        
    }
}
