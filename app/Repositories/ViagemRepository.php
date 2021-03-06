<?php namespace App\Repositories;

use App\Models\Viagem;
use Illuminate\Support\Facades\DB;

class ViagemRepository 
{

	public function __construct()
    {

        $this->viagem = new Viagem();

    }

	public function index()
	{

	  	return Viagem::all();

	}

	public function show($id_viagem)
	{

	  	return Viagem::find($id_viagem);

	}

   	public function getRules()
    {

        return $this->viagem->getRules();

    }

    public function getMessage()
    {

        return $this->viagem->getMessage();

    }

    public function update($viagemChange, $dados)
    {

        $viagemChange->carona_caroneiro_id = $dados->carona_caroneiro_id;
        $viagemChange->carona_motorista_id = $dados->carona_motorista_id;
        $viagemChange->status_id = $dados->status_id;
        $viagemChange->save();

    }

    public function destroy($viagem, $id)
    {

        $viagem->delete($id);

    }

   public function store($dados)
   {

        $this->viagem->caroneiro_id = $dados->caroneiro_id;
        $this->viagem->carona_motorista_id = $dados->carona_motorista_id;
        $this->viagem->status_id = $dados->id_status;
        $this->viagem->save();

   }

   public function getQuantidade($dados)
   {
        $retorno = DB::table('viagem as v')
            ->select(
                DB::raw('COUNT(1) as qtdCaroneiro'),
                'v.carona_motorista_id'
            )
            ->where('v.carona_motorista_id', $dados->carona_motorista_id)
            ->groupBy('v.carona_motorista_id')
            ->first();

        return $retorno;
   }

    public function updateStatusViagem($carona_motorista_id, $status_id)
    {
        Viagem::where('carona_motorista_id', $carona_motorista_id)
            ->update(['status_id' => $status_id]);

    }
}