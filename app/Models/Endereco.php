<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Endereco extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_endereco';
    protected $table = 'endereco';

    public function getRules()
    {

        return $this->rules;

    }

    public function getMessage()
    {

        return $this->messages;
        
    }
}
