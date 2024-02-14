<x-app-layout>
    @vite(['resources/js/scripts.js', 'resources/js/app.js', 'resources/css/app.scss']) 
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mi Libreria') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>DNI</th>
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
                            {{-- @cannot('isUser') --}}
                            <td><a class="btn btn-danger" href="http://laravel.local/books/edit/{{$book->id}}">editar</a></td>
                            {{-- @cannot('isManager') --}}
                            <td><a class="btn btn-danger" href="http://laravel.local/books/destroy/{{$book->id}}">Borrar</a></td>
                            {{-- @endcan --}}
                                {{-- @endcan --}}
                        </tr>
                    </tbody>


                    @empty
                    <div class="alert alert-danger">
                        no se han encontrado libros
                    </div>
                    @endforelse
                    <br>
                    <p align="center">
                   {{-- @cannot('isUser') --}}
                        <a class="btn btn-danger" href="http://laravel.local/books/create">crear</a>
                  {{--  @endcan --}}
                    </p>
                </table>

            </div>
        </div>
    </div>

</x-app-layout>