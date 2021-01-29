<?php namespace App\Core;

class HttpCode {

    public static function get_message_status_code($code)
    {
        $dic = [
	        "200" => "(OK) A chamada foi bem-sucedida.",
	        "400" => "(Bad Request) A requisição é inválida, em geral conteúdo malformado.",
	        "401" => "(Unauthorized) O usuário e senha ou token de acesso são inválidos.",
	        "403" => "(Forbidden) O acesso à API está bloqueado ou o usuário está bloqueado.",
	        "404" => "(Not Found) O endereço acessado não existe.",
	        "422" => "(Unprocessable Entity) A Requisição é válida, mas os dados passados não são válidos.",
	        "429" => "(Too Many Requests) O usuário atingiu o limite de requisições",
	        "500" => "(Internal Server Error) Houve um erro interno do servidor ao processar a requisição. Este erro pode ter sido causado por entrada mal formatada. Favor rever a sua entrada."
	    ];

	  	return $dic[$code];
    }

}