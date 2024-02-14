    @extends('books.master')

    @section('titulopagina')
        Listado General de Libros
    @endsection

    
    @section('contenido')
        <table class="table table-dark">
                <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Fecha</th>
                    <th>show</th>
                    <th>editar</th>
                    <th>Borrar</th>

                </tr>
                </thead>
        @forelse($books as $book)
        
            <tbody>
            <tr>
                <td> {{$book->titulo}}</td>
                <td> {{$book->autor}}</td>
                <td> {{$book->fechapub}}</td>
                <td><a class="btn btn-danger" href="http://laravel.local/books/{{$book->id}}">mas</a></td>
                <td><a class="btn btn-danger" href="http://laravel.local/books/edit/{{$book->id}}">editar</a></td>
                <td><a class="btn btn-danger" href="http://laravel.local/books/borrar/{{$book->id}}">Borrar</a></td>
                @endcan
                <!--
                <td><a class="btn btn-danger" href="http://laravel.local/books/destroy/{{$book->id}}"
                    onclick="return confirm('Are you sure that you want to delete this item?')"
                    class="btn btn-danger">
                    <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                    Borrar</a>  
                </td>
                <td><a class="btn btn-danger" href="{{ route('books.destroy', $book->id) }}"
                    onclick="return confirm('Are you sure that you want to delete this item?')"
                    class="btn btn-danger">
                    <span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span>
                    Borrar</a>  
            </td>
                -->

            </tr>
            </tbody>
        

        @empty
             <div class="alert alert-danger">
                  no se han encontrado libros
             </div>
        @endforelse
        <br>
       <p align="center">
        @cannot('isUser')
            <a class="btn btn-danger" href="http://laravel.local/books/create">crear</a>
        @endcan
        </p>
        </table>
    @endsection