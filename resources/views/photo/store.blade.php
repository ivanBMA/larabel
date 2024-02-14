<div>
    <!-- Because you are alive, everything is possible. - Thich Nhat Hanh -->
    <form action="{{ route('/photos/store')}}" method="post">
        <label for="">Nombre</label>
        <input type="text" name="nombre" id=""></input>

        <input type="submit" value="enviar" name="enviar">
    </form>
</div>
