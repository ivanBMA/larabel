<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //Login, logout, register, refresh , me
    //Prohibir crear un libro en la api a usuario.
    function __construct()
    {
        
            $this->middleware('auth:api', ['except' =>
                ['login', 'register', 'logout', 'refresh', 'usuarioLogeado', 'mostrarEmails']
            ]);//Deniega todo excepto
        
    }

    function register(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "name" => "required | string | max:255",
                "email" => "required | email | unique:users",
                "password" => "required | string | min:6"
            ]
        );

        if ($validator->passes()) {
            $data = $request->all();
            $data["password"] = bcrypt($request->password);
            $user = User::create($data);

            $token = Auth::guard('api')->login($user); //devuelve un token
            return response()->json([
                "status" => "Ok",
                "message" => "User created successFully",
                "data" => $user,
                "authorisation" =>
                [
                    "token" => $token,
                    "tipo" => "bearer"
                ]
            ], 201);
        }

        return response()->json([
            "status" => "fail",
            "message" => $validator->errors()
        ], 400);
    }

    function login(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                "email" => "required | email ",
                "password" => "required | string | min:6"
            ]
        );

        $credentials = $request->only(['email', 'password']);
        $token = Auth::guard('api')->attempt($credentials);
        $user =  Auth::guard('api')->user();

        if ($validator->passes() && $token) {
            return response()->json([
                "status" => "Ok",
                "message" => "Usuario logeado",
                "user" => $user,
                "authorisation" =>
                [
                    "token" => $token,
                    "tipo" => "bearer"
                ]
            ], 201);
        }
    
        return response()->json([
            "status" => "fail",
            "message" => $validator->errors()
        ], 404);
    }

    function logout(){
        Auth::guard('api')->logout();

        return response()->json([
            "status" => "Ok",
            "message" => "Usuario deslogeado"
        ], 200);
        /*
        eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbGFyYXZlbC5sb2NhbC9hcGkvbG9naW4iLCJpYXQiOjE3MDc3NjIwOTcsImV4cCI6MTcwNzc2NTY5NywibmJmIjoxNzA3NzYyMDk3LCJqdGkiOiIxS3YwRDVHY3U5Qk5KQU8zIiwic3ViIjoiNSIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjciLCJlbWFpbCI6Im5hdmlAZ21haWwubG9jYSIsIm5vbWJyZSI6Im5hdmkifQ.XYGzQ3c4Xu21mnznIhcrBbZDju2yJ7JcgxSvvMyW9cc
        */ 
    }

    function refresh(){
        return response()->json([
            "status" => "Ok",
            "use" => Auth::guard('api')->user(),
            "message" => "sesion extendida completada",
            "authorisation" =>
            [
                "token" => Auth::guard('api')->refresh(),
                "tipo" => "bearer"
            ]
        ], 200);
    }

    //Metodo que devuelva el nombre del usuario logeado.
    //Metodo que devuelva si el usuario esta logeado.
    function usuarioLogeado(){
        $user = Auth::guard('api')->user();

        if(!$user){
            return response()->json([
                "status" => "empty",
                "message" => " no hay usuario logeado"
            ], 404);
        }

        return response()->json([
            "status" => "Ok",
            "message" => "hay un usuario logeado",
            "data" => $user
        ], 200);
    }

    public function me(){
        $user = Auth::guard('api')->user();

        return response()->json([
            "status" => "Ok",
            "message" => "hay un usuario logeado",
            "data" => $user
        ], 200);
    }


    public function amILogged(){
        $logged = Auth::guard('api')->check();
        $userRol = Auth::guard('api')->user();

        if ($logged && $userRol->rol == "user") {
            return response()->json([
                "status" => "Ok",
                "message" => "Estas logeado"
            ], 200);
        }

        return response()->json([
            "status" => "fail",
            "message" => "No estas logeado"
        ], 403);
    }

    function mostrarEmails(){
        $user = Auth::guard('api')->user();


        if(!$user){
            $emails = User::pluck('email');
            return response()->json([
                "status" => "ok",
                "message" => " no hay usuario logeado",
                "data" => $emails
            ], 200);
        }

        return response()->json([
            "status" => "fail",
            "message" => "hay un usuario logeado",
            "data" => $user
        ], 404);
    }


    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
