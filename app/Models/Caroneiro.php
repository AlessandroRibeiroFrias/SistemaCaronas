<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caroneiro extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_caroneiro';
    protected $table = 'caroneiro';

    protected $rules = [
		'nm_caroneiro' => 'required'
	];

	protected $messages = [
	    'nm_caroneiro.required' => 'Nome do caroneiro é obrigatório.'
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
