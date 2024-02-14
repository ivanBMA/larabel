@extends('books.master')

@section('titulopagina')
    Listado General de Libros
@endsection


@section('contenido')
     <h1>edit</h1>
    <form class="bg-dark text-danger text-center" action="{{ route('books.update', $book->id) }}" method="post">
    @csrf
    @method('PUT')
        <br>
        <br>

        @if($errors->any())
            @foreach($errors->all() as $error)
                <div class="alert alert-primary">
                    {{ $error }}
                </div>
            @endforeach
        @endif

        <div class="form-row ">
            <!--Esto es para poder ver los datos de un formulario-->
            @csrf
            <div class="form-group col-md-12">
                <label for="inputEmail4">Titulo</label>
                <input type="text" class="form-control"  name="titulo" value=" {{ $book->titulo ?? old('titulo')}} " >
                <br>
                @error('titulo')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-12">
                <label for="inputPassword4">autor</label>
                <input type="text" class="form-control"  name="autor" value=" {{ $book->autor }} ">
                <br>
                @error('autor')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-12">
                <label for="inputPassword4">fecha</label>
                <input type="date" class="form-control"   name="fechapub" value=" {{ $book->fechapub }} ">
                <br>
                @error('fechapub')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <!--
                <div class="form-group col-md-12">
                    <label for="inputPassword4">genero</label>
                    <input type="text" class="form-control"   name="genero" value=" {{ old('genero') }} ">
                </div>
                <div class="form-group col-md-12">
                    <label for="inputPassword4">numeroPaguinas</label>
                    <input type="numeric" class="form-control"   name="numeroPaguinas" value=" {{ old('numeroPaguinas') }} ">
                </div>
            -->
        </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
    <br>
    <br>
    </form>
    
@endsection