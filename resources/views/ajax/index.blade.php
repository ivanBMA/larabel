<!DOCTYPE html>
<html>

<head>
    <title>EJEMPLO CRUD AJAX</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Scripts importacion bootstrap, jquery , datatables.... -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">

    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

</head>

<body>

    <div class="container mt-4">

        <div class="col-md-12 mt-1 mb-2"><button type="button" id="addNewBook" class="btn btn-success">Crear Libro</button></div>

        <div class="card">

            <div class="card-header text-center font-weight-bold">
                <h2>CRUD con AJAX</h2>
            </div>

            <div class="card-body">

                <table class="table table-bordered" id="tabla-datos-crud">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Fecha Publicacion</th>
                            <th>Genero</th>
                            <th>Numero paginas</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                </table>

            </div>

        </div>
        <!-- boostrap add and edit book model -->
        <div class="modal fade" id="ajax-book-model" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal title" id="ajaxBookModel"></h4>
                    </div>
                    <div class="modal-body">
                        {{-- Comienzo Formulario   --}}
                        <form action="javascript:void(0)" id="addEditBookForm" name="addEditBookForm" class="form-horizontal" method="POST">

                            {{-- Campo ID   --}}
                            <input type="hidden" name="id" id="id">

                            {{-- Campo TITUTLO   --}}
                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">Titulo</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Introduce Titulo" maxlength="90" required="">
                                </div>
                            </div>


                            {{-- Campo Autor  --}}

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">autor</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="autor" name="autor" placeholder="Introduce autor" maxlength="90" required="">
                                </div>
                            </div>

                            {{-- Campo FechaP  --}}

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">fechapub</label>
                                <div class="col-sm-12">
                                    <input type="date" class="form-control" id="fechapub" name="fechapub" placeholder="Introduce fechapub" maxlength="90" required="">
                                </div>
                            </div>

                            {{-- Campo GENERO   --}}

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">genero</label>
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="genero" name="genero" placeholder="Introduce genero" maxlength="90" required="">
                                </div>
                            </div>

                            {{-- Campo NUMERO PAGINAS   --}}

                            <div class="form-group">
                                <label for="name" class="col-sm-2 control-label">numeroPaguinas</label>
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" id="numeroPaguinas" name="numeroPaguinas" placeholder="Introduce numeroPaguinas" maxlength="90" required="">
                                </div>
                            </div>

                            {{-- Campo BOTON DE ENVIO   --}}
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-primary" id="btn-save" value="addNewBook">Guardar
                                </button>
                            </div>

                            {{-- FIN Formulario   --}}
                        </form>
                    </div>

                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>
        <!-- end bootstrap model -->

        <script type="text/javascript">
            $(document).ready(function() {

                // Añadir el csrf al formulario mediante jquery. Lee etiqueta csrf-token html
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                // Procesa la tabla en esta vista index con las columnas apropiadas
                $('#tabla-datos-crud').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ url('ajbooks') }}",
                    columns: [{
                            data: 'id',
                            name: 'id',
                            'visible': false
                        },
                        {
                            data: 'titulo',
                            name: 'titulo'
                        },
                        {
                            data: 'autor',
                            name: 'autor'
                        },
                        {
                            data: 'fechapub',
                            name: 'fechapub'
                        },
                        {
                            data: 'genero',
                            name: 'genero'
                        },
                        {
                            data: 'numeroPaguinas',
                            name: 'numpag'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false
                        },
                    ],
                    order: [
                        [0, 'desc']
                    ]
                });

                // ajax CREAR LIBRO
                $('#addNewBook').click(function() {
                    $('#addEditBookForm').trigger("reset");
                    $('#ajaxBookModel').html("Crear Libro");
                    $('#ajax-book-model').modal('show');
                });


                // ajax GUARDAR LIBRO
                $('body').on('click', '#btn-save', function(event) {

                    var id = $("#id").val();
                    var titulo = $("#titulo").val();
                    var genero = $("#genero").val();
                    var autor = $("#autor").val();
                    var numpag = $("#numpag").val();

                    $("#btn-save").html('Espere un momento...');
                    $("#btn-save").attr("disabled", true);

                    // ajax GUARDAR LIBRO
                    $.ajax({
                        type: "POST",
                        url: "{{ url('ajaddbook') }}",
                        data: {
                            id: id,
                            titulo: titulo,
                            genero: genero,
                            autor: autor,
                            numpag: numpag,
                        },
                        dataType: 'json',
                        success: function(res) {
                            $("#ajax-book-model").modal('hide');
                            var oTable = $('#tabla-datos-crud').dataTable();
                            oTable.fnDraw(false);
                            $("#btn-save").html('Enviar');
                            $("#btn-save").attr("disabled", false);
                        }
                    });

                });

                //ajax  EDITAR/MOSTRAR LIBRO 

                $('body').on('click', '.edit', function(event) {
                    var id = $(this).data('id');
                   
                    $.ajax({
                        type: "POST",
                        url: "{{ url('ajeditbook') }}",
                        data: {
                            id: id
                        },
                        dataType: 'json',
                        success: function(res) {
                            $("#ajax-book-model").modal('show');
                            $('#ajaxBookModel').html("Editar"); //Texto del boton del modal
                            $('#id').val(res.id);
                            $('#titulo').val(res.titulo);
                            $('#autor').val(res.autor);
                            $('#fechapub').val(res.fechapub);
                            $('#genero').val(res.genero);
                            $('#numpag').val(res.numpag);

                        },
                        error: function(req,status,error){
                            console.log(req + " " + status + " " + error);
                        }
                    });

                });

                //ajax BORRAR LIBRO
                $('body').on('click', '#btn-delete', function(event) {
                    var id = $("#id").val();

                    $("#btn-delete").attr("disabled", true);
                    
                    $.ajax({
                        type: "POST",
                        url: "{{ url('ajdeletebook') }}",
                        data: {
                            id: id,
                        },
                        dataType: 'json',
                        success: function(res) {
                            $("#ajax-book-model").modal('hide');
                            var oTable = $('#tabla-datos-crud').dataTable();
                            oTable.fnDraw(false);
                            $("#btn-delete").html('Enviar');
                            $("#btn-delete").attr("disabled", false);
                        }
                    });

                });
            });
        </script>
    </div>
</body>

</html>