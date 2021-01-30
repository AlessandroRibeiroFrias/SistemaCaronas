<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaronaMotorista extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_carona_motorista';
    protected $table = 'carona_motorista';

    public function getRules()
    {

        return $this->rules;

    }

    public function getMessage()
    {

        return $this->messages;
        
    }
}
