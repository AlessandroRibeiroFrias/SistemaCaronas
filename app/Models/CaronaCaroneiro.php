<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaronaCaroneiro extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_carona_caroneiro';
    protected $table = 'carona_caroneiro';

    public function getRules()
    {

        return $this->rules;

    }

    public function getMessage()
    {

        return $this->messages;
        
    }
}
