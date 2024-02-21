<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserInfoApiController extends Controller
{
    /*
        1- 	Hacer que el metodo amILogged solopueda ser ejecutado
        por el usuario con rol de "user".
    */

    function __construct(){
        $this->middleware(['userinfo', 'auth:api']);
    }

    public function getUsersNames()
    {
        $users = User::pluck('name');
        //$users = User::all();

        $data = [
            "status" => "ok",
            "message" => "Estoy en el getUsersNames de user api", 
            "data" => $users];
        
        return response()->json($data, 200);
    }
}
