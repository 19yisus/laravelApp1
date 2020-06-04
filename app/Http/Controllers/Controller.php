<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function Limpiar($cadena){
        $cadena = stripslashes($cadena);
        $cadena = str_ireplace("SELECT * FROM","",$cadena);
        $cadena = str_ireplace("DELETE * FROM","",$cadena);
        $cadena = str_ireplace("INSERT INTO","",$cadena);
        $cadena = str_ireplace("[","",$cadena);
        $cadena = str_ireplace("]","",$cadena);
        $cadena = str_ireplace("(","",$cadena);
        $cadena = str_ireplace(")","",$cadena);
        $cadena = str_ireplace("{","",$cadena);
        $cadena = str_ireplace("}","",$cadena);
        $cadena = str_ireplace("==","",$cadena);
        $cadena = str_ireplace("=","",$cadena);
        $cadena = str_ireplace("-","",$cadena);
        $cadena = str_ireplace("<script>","",$cadena);
        $cadena = str_ireplace("<script src= >","",$cadena);
        $cadena = str_ireplace("src=","",$cadena);
        $cadena = str_ireplace("'","",$cadena);
      
        if(!is_numeric($cadena)){
            $cadena = strtoupper($cadena);
            $cadena = str_ireplace(".","",$cadena);
        }

        return $cadena;
    }
}
