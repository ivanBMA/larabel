<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Validator;


    function responseArray($state, $message, $payload){
        return[
            "state" => $state,
            "message" => $message,
            "data" => $payload
        ];
    }

    function check404($user){
        if (!$user) {
            response()->json([
                "status" => 404,
                "message" => "No se ha encontrado"
            ], 404)->send();
            die();
        }
    }

class UserApiController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        $data = responseArray("ok","Estoy en el index del controlador de user api", $users);
        
        return response()->json($data, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' =>  'required | string | max:60',
            'email ' => '',
            'rol' => 'required | string | max:50',
            'password' => 'required | string | max:50'
        ]);

        if ($validator->fails()) {
            return response()->json(["error" => $validator->errors()]);
        }else{
            $user = User::create($request->all());
            $data = [
                "status" => "ok",
                "message" => "User created",
                "data" => $user
            ];
            return response()->json($data, 201);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        $data = responseArray("ok", "Estoy en el show del controlador de user Api", $user);

        if(!$user){
            $data = [
                "status" => "fail",
                "message" => "User no encontrado",
                "users" => ""
            ];
            return response()->json($data, 404);
        }

        return response()->json($data, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        //$this->check404($user); esto es por si no quieres escribir 404 todo el rato, no hace falta
        if (!$user) {
            $data = [
                "status" => "fail",
                "message" => "User no encontrado",
                "users" => ""
            ];
            return response()->json($data, 404);
        }else {
            $validator = Validator::make($request->all(),[
                'name' =>  '',
                'email ' => '',
                'rol' => '',
                'password' => ''
            ]);
    
            if ($validator->fails()) {
                return response()->json(["error" => $validator->errors()]);
            }else{
                $user->update($request->all());
                $data = [
                    "status" => "ok",
                    "message" => "User updated",
                    "data" => $user
                ];
                return response()->json($data, 201);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrfail($id);
        if (!$user) {
            $data = [
                "status" => "fail",
                "message" => "User no encontrado",
                "users" => ""
            ];
            return response()->json($data, 404);
        }else {
            $user->delete();
            $data = [
                "status" => "ok",
                "message" => "User fue eliminado",
                "users" => ""
            ];
            return response()->json($data, 204);
        }
    }

     

}
