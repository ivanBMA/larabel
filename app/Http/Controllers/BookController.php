<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\Gate;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Book::class);//Esto se usa para las politicas

        if(!session('contador')){
            session(['contador' => 0]);
        }

        /*
        Trabajar con las sesiones
            1- Inyeccion request:
                $request->session()->put('key', 'valor'); añadir a la sesion
                $request->session()->get('key', 'valor'); Obtiene el valor
                $request->session()->flush('key', 'valor'); Borra toda la sesion
                $request->session()->flash('key', 'valor'); Crea variable flash_("De un solo uso")

            2- Helper session: session()
                session['key' => 'valor'] añadir a la sesion
                sesion('clave', 'valorxdefecto'); Obtiene el valor
                sesion()->flush(); Borrar la sesion

            3- Facade
                Session::put() añadir a la sesion
                Session::get('key'); Obtengo el valor
                Sesion::flush() Borrar la sesion
                Sesion::flash('clave', 'valor') 
        */
        $books = Book::all();
        return view('books.index',compact('books'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //if(Gate::denies('isUser')){
            return view('books.create');
        //}else{
        //    abort(403);
        //}
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //bail para en el primer error 'bail' |
        $request->validate([
            'titulo' =>  'required | string | max:60',
            'autor' => 'required | string | max:50',
            'fechapub' => 'required | date | before:tomorrow',
            'genero' => ' in:Ficcion,Novela',
            'numeroPaguinas' => 'max:100 | numeric | min:0',
        ],[
            'titulo.required' => 'Error en el campo titulo',
            'titulo.max' => 'Titulo demasiado largo',
            'fechapub.after:tomorrow' => 'La fecha tiene que ser antes de mañana',
            'numeroPaguinas.max:100' => 'menos de 100',
            'numeroPaguinas.numeric' => 'Solo numeros porfabor',
            'numeroPaguinas.min:0' => 'mas de -1'
        ]);

        //Crea un nuevo objeto de tipo book y lo guarda en la base de datos
        $book = Book::create($request->all());
        //Recoje el id directamente de la tabla
        //redireccion con mensaje de exito
        return redirect('/books/' . $book->id)->with('exito', 'Libro creado correctamente');
    }

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
        if($id == 6){
            $valorsesion = session('contador');
            session(['contador' => ++$valorsesion]);
        }
        

        $book = Book::findOrfail($id);
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function mostrarEdit(String $id){
        $book = Book::findOrfail($id);
        return view('books.edit', compact('book'));
    }

    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        
        //$book = Book::updateOrCreate($request->id,$request->titulo,$request->autor,$request->fechapub);
        $book = Book::findOrfail($id);
        $book->update($request->all());
        return redirect()->route('books.show',$book->id)->with('exito','libro actualizado');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Book::findOrfail($id);
        $book->delete();

        $books = Book::all();
        return redirect()->route('books.index')->with('exito', 'Libro borrado correctamente');
    }

    public function mostrarBorrar(string $id)
    {
        $book = Book::findOrfail($id);
        return view('books.borrar', compact('book'));
    }
}
