<?php namespace App\Core;
use Response;
use App\Core\HttpCode;

class ResponseDefault 
{

    public static function json($retorno)
    {

        $retorno['status_message'] = HttpCode::get_message_status_code($retorno['status_code']);
    
        return Response::json($retorno, $retorno['status_code']);
        
    }

}