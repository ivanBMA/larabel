<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Controllers\BookController;


class BookApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        /*
        $this->middleware('auth:api', ['except' =>
            ['show']
        ]);//Deniega todo exceptio
        */
    }

    public function index()
    {
        $books = Book::all();
        $data = [
            "status" => "Ok",
            "message" => "Estoy en el index del controlador de books",
            "data" => $books
        ];
        return response()->json($data, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            "status" => "Ok",
            "message" => "Creaste el libro"
        ];
        return response()->json($data, 200);
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
        $book = Book::find($id);
        $data = [
            "status" => "Ok",
            "message" => "Este es el libro",
            "data" => $book
        ];
        return response()->json($data, 200);
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
