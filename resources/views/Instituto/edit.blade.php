    <h1>edit</h1>
    <form class="bg-dark text-danger text-center" action="{{ route('instituto.update', $instituto->id) }}" method="post">
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
            <!--Esto es para poder ver los datos de un formulario
            $table->string('cod_instituto',10);
            $table->string('nombre',120);
            $table->string('localidad',50);
            $table->integer('numeroAlumnos');
        -->
            @csrf

            <div class="form-group col-md-12">
                <label for="inputEmail4">cod_instituto</label>
                <input type="text" class="form-control"  name="cod_instituto" value=" {{ $instituto->cod_instituto ?? old('cod_instituto')}} " >
                <br>
                @error('cod_instituto')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-12">
                <label for="inputPassword4">nombre</label>
                <input type="text" class="form-control"  name="nombre" value=" {{ $instituto->nombre }} ">
                <br>
                @error('nombre')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group col-md-12">
                <label for="inputPassword4">localidad</label>
                <input type="text" class="form-control"   name="localidad" value=" {{ $instituto->localidad }} ">
                <br>
                @error('localidad')
                <div class="alert alert-danger">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group col-md-12">
                <label for="inputPassword4">numeroAlumnos</label>
                <input type="number" class="form-control"   name="numeroAlumnos" value=" {{ $instituto->numeroAlumnos }} ">
                <br>
                @error('numeroAlumnos')
                    <div class="alert alert-danger">
                        {{ $message }}
                    </div>
                @enderror
            </div>
        </div>

    <button type="submit" class="btn btn-primary">Enviar</button>
    <br>
    <br>
    </form>
