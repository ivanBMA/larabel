@extends('books.common.layout')

soy el libro {{$id}}<br>
tengo el genero {{$genero}}<br>
fecha del libro {{date('d-m-y')}}    <br>
    <hr>


    Los autores son <br>
    @foreach($autores as $autor)
        =>{{$autor}} <br>
    @endforeach
    <hr>

    El autor es <br>
    @forelse($autores as $autor)
            @php $mensaje = "Autor Secundario";@endphp

            @if($loop->first)
                @php $mensaje = "Autor Principal:";@endphp
            @endif

            =:{{$mensaje . " " . $autor}} <br>
            @if($loop->last)
                Iteracion {{$loop->iteration}} de un total de {{$loop->count}}
            @endif
        @empty
            no hay ningun autor
    @endforelse
    <hr>


    @switch($genero)
        @case("paca")
            el paca <br>
            @break
        @case("paco")
            lo paca <br>
            @break
        @default
            El default <br>
            @break
    @endswitch


    {{--comentario--}}
    @if($id > 5)
        soy un libro de ciencias <br>
    @elseif ($id < 5)
        soy un libro de matematicas <br>
    @else
        soy un libro de IA <br>
    @endif


