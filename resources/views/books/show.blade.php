@extends('books.master')

@section('titulopagina')
    Listado General de Libros
@endsection


@section('contenido')
    <br>
        @if(session('exito'))
            {{ session('exito') }}
        @endif
    <br>

    <h1>contador {{ Session::get('contador'); }}</h1>


    <table class="table table-dark">
            <thead>
            <tr>
                <th>Titulo</th>
                <th>Autor</th>
                <th>Fecha</th>
            </tr>
            </thead>
    
    
        <tbody>
        <tr>
            <td> {{$book->titulo}}</td>
            <td> {{$book->autor}}</td>
            <td> {{$book->fechapub}}</td>
        </tr>
        </tbody>
    

    
    </table>
@endsection