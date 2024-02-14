<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EjemploController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function mostrarPeticion(Request $request, ?String $admin = null){
        $uri = $request->path();
        echo "Esto es uri $uri<br>";
        echo "admin es $admin<br>";
        if ($request->is('ejemplos/admin')) {
            echo "<br>Eres administrador.";
        }else {
            echo "<br>Eres un usuario";
        }
        $method = $request->method();
        echo "<br>Tipo de metodo -_ $method";

        if ($request->isMethod('get')) {
            echo "<br> es tipo get";
        }elseif('post'){
            echo "<br> es tipo post";
        }else {
            echo "<br> no es tipo get ni post";
        }
        echo "<br><hr>";
        $host = $request->header('Host');
        echo "<br> $host";

        $cookie = $request->cookie();
        //dd($cookie);
        //dd($request);
        $input = $request->all();
        $input2 = $request->only('name', 'genero');
        $input3 = $request->filled('nombre');
        //dd($input);
        
        //Añadir datos a la peticion
        $request->merge(['apellido' => 'perez']);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
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
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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
