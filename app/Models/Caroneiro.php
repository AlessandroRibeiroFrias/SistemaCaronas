<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caroneiro extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_caroneiro';
    protected $table = 'caroneiro';
}
