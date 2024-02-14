@include('books.common.header')


    @yield('titulosec')

    @section('principal')
        secion principar sr ltjseñ lrtgjñso rjeg
    @show

    @section('secundaria')
        <h4>Estoy aqui abajo</h4>
    @show

    @yield('resumen', 'En resumidas cuentas ...')

@include('books.common.footer')