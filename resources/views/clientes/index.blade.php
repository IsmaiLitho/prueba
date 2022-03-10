<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.11.5/af-2.3.7/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/cr-1.5.5/date-1.1.2/fc-4.0.2/fh-3.2.2/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.2/sp-2.0.0/sl-1.3.4/sr-1.1.0/datatables.min.css"/>
 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/jszip-2.5.0/dt-1.11.5/af-2.3.7/b-2.2.2/b-colvis-2.2.2/b-html5-2.2.2/b-print-2.2.2/cr-1.5.5/date-1.1.2/fc-4.0.2/fh-3.2.2/kt-2.6.4/r-2.2.9/rg-1.1.4/rr-1.2.8/sc-2.0.5/sb-1.3.2/sp-2.0.0/sl-1.3.4/sr-1.1.0/datatables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<title>Document</title>
</head>
<body>
    <div class="container">
        <h1 align="center">Reporte</h1>
        @if(Session::has('m'))
            <div class="alert alert-success" role="alert">
                {{Session::get('m')}}
            </div>
        @endif
        <div class="table-responsive">
        	<table class="table" id="reporte">
                <thead>
                    <tr>
                        <th>No. del cliente</th>
                        <th>Nombre</th>
                        <th>Fecha de nacimiento</th>
                        <th>Genero</th>
                        <th>Operaciones</th>
                    </tr>
                </thead>
            </table>
         </div>
    </div>
    <script>
        $(document).ready(function () {
        var table = $('#reporte').DataTable({
            processing: true,
            serverSide: true,
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando pagina _PAGE_ de _PAGES_",
                "infoEmpty": "No hay registros disponibles",
                "infoFiltered": "(Resultados obtenidos _MAX_ de registros totales)",
                "search": "Buscar:",
                "loadingRecords": "Cargando...",
                "paginate": {
                    "first":      "First",
                    "last":       "Last",
                    "next":       "Siguiente",
                    "previous":   "Anterior"
                },
            },

            "ajax":"{{ url('getClientes') }}",
            "columns": [
                {data: 'idcli'},
                {data: 'nombre'},
                {data: 'fecha_nac'},
                {
                    data: 'genero',
                    render: function(data, type) {
                        if (type === 'display') {
                            if (data[0] == 'M') {
                                return `<span>Masculino</span>`;
                            }
                            if (data[0] == 'F') {
                                return `<span>Femenino</span>`;
                            }
                        }
                         
                        return data;
                    }
                },
                {defaultContent: `<a href="{{url('/Clientes/edit',)}}" type='button' class='btn btn-primary mt-1 btn-sm' title='Editar'><i class='bi bi-pencil-square'></i></a>
                    <a href="{{url('/Clientes/delete',)}}" type='button' class='btn btn-danger mt-1 btn-sm' title='Eliminar'><i class='bi bi-trash'></i></a>`},
            ],
            dom: 'Bfrtip',
            buttons: ['excel'],

        });

    });
    </script>
</body>
</html>
