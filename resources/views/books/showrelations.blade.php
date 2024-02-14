{{-- dd("hola"); --}}

    @php
        use App\Models\Book;
        use App\Models\Copy;
        {{-- use Illuminate\Support\Facades\DB; --}}
    @endphp

    <h1>VIsta relaciones</h1>
    <p>Ver portada libro1</p>
    @php    
        $cover = Book::find(1)->cover;
    @endphp
    <p>Ruta imagen portada libro 1 {{ $cover->ruta_img }}</p>
    
    <h3>Ediciones dle libro 2</h3>
    @php    
        $copies = Book::find(2)->copies;
    @endphp
    @foreach($copies as $copy)
        <p>Numero de edicion : {{ $copy->numero_edicion }}</p>
        <p>Editorial :  {{ $copy->editorial }}</p>
    @endforeach
    @php    
        $book = Copy::where('numero_edicion', 5)->get();
    @endphp
        {{ $book }}

    <h3>¿ Que socios han tomado el book 3 ?</h3>
    {{--

    @php    
        $partners = DB::find('book_id', 3)->get();
    @endphp

    @foreach($partners as $partner)
        <p>partner : {{ $partners->id }}</p>
        <p>libro :  {{ $partners->book_id }}</p>
    @endforeach
    --}}
