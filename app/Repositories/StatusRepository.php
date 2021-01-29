<?php namespace App\Repositories;

use App\Models\Status;
use Illuminate\Support\Facades\DB;

class StatusRepository {

    public function index(){
       return Status::all();
    }

    public function show($id_status){
        return Status::find($id_status);
     }
}