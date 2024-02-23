<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Instituto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstitutoApiController extends Controller
{
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
        $validator = Validator::make($request->all(),[
            'cod_instituto' =>  'required | string | max:10',
            'nombre ' => ' string ',
            'localidad' => 'required | string | max:50',
            'numeroAlumnos' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(["error" => $validator->errors()]);
        }else{
            $instituto = Instituto::create($request->all());
            $data = [
                "status" => "ok",
                "message" => "Instituto created",
                "data" => $instituto
            ];
            return response()->json($data, 201);
        }
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
        $instituto = Instituto::findOrfail($id);
        if (!$instituto) {
            $data = [
                "status" => "fail",
                "message" => "instituto no encontrado",
                "institutos" => ""
            ];
            return response()->json($data, 404);
        }else {
            $instituto->delete();
            $data = [
                "status" => "ok",
                "message" => "instituto fue eliminado",
                "institutos" => ""
            ];
            return response()->json($data, 204);
        }
    }
}
