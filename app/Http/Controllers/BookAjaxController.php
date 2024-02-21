<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Datatables;
use Illuminate\Http\JsonResponse;

class BookAjaxController extends Controller
{
    //
    function index(){
        if(request()->ajax()){
			return datatables()->of(Book::select('*'))
			  ->addColumn('action','ajax.acciones')   //ejecuta la vista ajax/accciones.blade.php que contiene btns Editar y Borrar
			  ->rawColumns(['action'])
			  ->addIndexColumn()
			  ->make(true);  
			  
		}//fin_if
		
		return view('ajax.index'); //llama a la vista index dentro de la carpeta ajax
    }

    function store(Request $request){
        $validator = Validator::make($request->all(),[
            'titulo' =>  'required | string | max:60',
            'autor' => 'required | string | max:50',
            'fechapub' => 'required | date | before:tomorrow',
            'genero' => ' in:Ficcion,Novela',
            'numeroPaguinas' => 'max:100 | numeric | min:0',
        ]);

        if ($validator->fails()) {
            return response()->json(["error" => $validator->errors()]);
        }else{
            $book = Book::create($request->all());
            
            return response()->json($book);
        }
    }

    //Request $request para el id
    function edit(Request $request, String $id): JsonResponse{
        $book = Book::find($id);
        if (!$book) {
            $data = [
                "status" => "fail",
                "message" => "book no encontrado",
                "books" => ""
            ];
            return response()->json($data, 404);
        }else {
            $validator = Validator::make($request->all(),[
                'titulo' =>  'required | string | max:60',
                'autor' => 'required | string | max:50',
                'fechapub' => 'required | date | before:tomorrow',
                'genero' => ' in:Ficcion,Novela',
                'numeroPaguinas' => 'max:100 | numeric | min:0',
            ]);
    
            if ($validator->fails()) {
                return response()->json(["error" => $validator->errors()]);
            }else{
                $book->update($request->all());
                return response()->json($book);
            }
        }
    }

    function destroy(String $id){
        $book = Book::findOrfail($id);
        $book->delete();
        return response()->json($book);
        
    }   
}
