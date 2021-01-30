<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaronaCaroneiro extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_carona_caroneiro';
    protected $table = 'carona_caroneiro';

    protected $rules = [
		'caroneiro_id' => 'required',
		'endereco_origem_id' => 'required',
		'endereco_destino_id' => 'required'
	];

	protected $messages = [
	    'caroneiro_id.required' => 'Código do caroneiro é obrigatório.',
	    'endereco_origem_id.required' => 'Endereço de origem do caroneiro é obrigatório.',
	    'endereco_destino_id.required' => 'Endereço de destino do caroneiro é obrigatório.'
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
