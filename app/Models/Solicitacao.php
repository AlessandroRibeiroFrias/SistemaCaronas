<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_solicitacao';
    protected $table = 'solicitacao';

    protected $rules = [
		'carona_caroneiro_id' => 'required',
		'carona_motorista_id' => 'required'
	];

	protected $messages = [
	    'carona_caroneiro_id.required' => 'Código da carona do caroneiro é obrigatório.',
	    'carona_motorista_id.required' => 'Código da carona do motorista é obrigatório.'
    ];

    protected $messagesAprovacaoRequest = [
        'id_solicitacao.required' => 'Código da carona do caroneiro é obrigatório.',
        'aprovacao.required' => 'Aprovação é obrigatório.'
    ];

    protected $rulesAprovacaoRequest = [
        'id_solicitacao' => 'required',
        'aprovacao' => 'required'
    ];

    public function getRules()
    {

        return $this->rules;

    }

    public function getMessage()
    {

        return $this->messages;
        
    }

    public function getRulesSolicitacaoRequest()
    {

        return $this->rulesAprovacaoRequest;
        
    }

    public function getMessageSolicitacaoRequest()
    {

        return $this->messagesAprovacaoRequest;
        
    }
}
