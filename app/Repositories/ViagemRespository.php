<?php namespace App\Repositories;

use App\Models\Viagem;
use Illuminate\Support\Facades\DB;

class ViagemRepository 
{

   public function index()
   {
      return Viagem::all();
   }

   public function show($id_viagem)
   {

      return Viagem::find($id_viagem);
   
   }
}