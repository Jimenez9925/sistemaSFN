@extends('adminlte::page')

@section('title', 'Trabajadores')
@section('plugins.Sweetalert2', true)

@section('content_header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><i
                                    class="nav-icon fas fa-th mr-2"></i>Escritorio</a></li>
                        <li class="breadcrumb-item active"><i class="nav-icon fa fa-table mr-2"></i>Asistencias</li>
                        <li class="breadcrumb-item active"><i class="fas fa-fw fa-share mr-2"></i>Control</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@stop

@section('content')

{!! Form::open(['route' => 'asistencia.store', 'method' => 'POST']) !!}
<div class="modal-body" id="cont_modal">

<div class="card card-info">

        <div class="card-header">
            <h4 class="card-title">Registrar Asistencia</h4>

            <div class="card-tools">
                <!-- This will cause the card to maximize when clicked -->
                <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                        class="fas fa-expand"></i></button>
                <!-- This will cause the card to collapse when clicked -->
                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                        class="fas fa-minus"></i></button>
                <!-- This will cause the card to be removed when clicked -->
            </div>
            <!-- /.card-tools -->

        </div>

        <div class="card-body">
            <div class="col-md-12">

                <div class="form-group">
                    <label for="">Fecha:</label>
                    <input type="date" name="fecha" class="form-control">

                </div>
            </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Trabajador:</label>
                    {{ Form::select('trabajador_id', $trabajadorasistencia, $asistencia->trabajador_id, ['class' => 'form-control' . ($errors->has('trabajador_id') ? ' is-invalid' : ''), 'id' => 'trabajadorcrearcrear', 'style' => 'width: 100%', 'placeholder' => 'Elegir Trabajador de Inventario']) }}
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Estado:</label>
                    <select class="form-select" aria-label="Default select example" name="estado" >
                    <option value="" selected disabled>Seleccione un estado</option>
                        <option value="Asistencia">Asistencia</option>
                        <option value="Falta" >Falta</option>
                        
                    </select>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="entra">Hora de Entrada:</label>
                    <input type="time" id="entrada" name="entrada" class="form-control" value="07:00">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Hora de Salida:</label>
                    <input type="time" name="salida" class="form-control">
                </div>
            </div>
        </div>



        <div class="modal-footer">
            <div class="col-md-12">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
        </div>
        </div>
        </div>
        {!! Form::close() !!}
        <hr/>
    @include('mensaje.confirmacion')
    <div class="section-body">

        <div class="row justify-content-center">

            <!-- crud para modulo de estados de obras -->
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                <div class="card card-info">

                    <div class="card-header">
                        <h4 class="card-title">Control de Asistencias</h4>

                        <div class="card-tools">
                            <!-- This will cause the card to maximize when clicked -->
                            <button type="button" class="btn btn-tool" data-card-widget="maximize"><i
                                    class="fas fa-expand"></i></button>
                            <!-- This will cause the card to collapse when clicked -->
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                    class="fas fa-minus"></i></button>
                            <!-- This will cause the card to be removed when clicked -->
                        </div>


                    </div>

                    <div class="card-body">
                    <button type="button" class="btn btn-primary mb-1" data-toggle="modal"
                                data-target="#reporte"><strong>VER CONTROL DE ASISTENCIA</strong>
                                <i class="fas fa-chart-pie	"></i>
                            </button>

                            <!--Ventana Modal para Crear--->
                            @include('asistencia.modal.crear')
                        <hr>

                        <table id="tbmantenimiento"
                            class="table table-sm table-striped table-hover table-bordered shadow-lg  dt-responsive nowrap"
                            style="width:100%">
                            <thead class="text-white" style="background-color:#6777ef">
                                <tr class="active">
                                    <th  style="width:10%">Fecha</th>
                                    <th>Trabajador</th>
                                    <th>DNI</th>
                                    <th>Horas de Trabajo</th>
                                    <th>Asistencia</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($asistencias as $asistencia)
                                    <tr>
                                        <td>{{ $asistencia->fecha }}</td>
                                        <td>{{ $asistencia->trabajador->nombres }} {{ $asistencia->trabajador->apellidos }} ( {{ $asistencia->trabajador->categoria->descripcion }} )</td>
                                        <td>{{ $asistencia->trabajador->documento }}</td>
                                        <td>De: {{ $asistencia->entrada }} Hasta: {{ $asistencia->salida }}</td>

                                        <td>{{ $asistencia->estado }}</td>


                                        <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                                data-target="#mostrar{{ $asistencia->id }}">
                                                <i class="fas fa-eye"></i>
                                            </button>
                                            <button type="button" class="btn btn-warning btn-sm" data-toggle="modal"
                                                data-target="#editar{{ $asistencia->id }}">
                                                <i class="fas fa-edit"></i>
                                            </button>

                                        </td>
                                        <!--Ventana Modal para la Alerta de mostrar--->
                                        @include('asistencia.modal.Mostrar')
                                        <!--Ventana Modal para Editar--->
                                        @include('asistencia.modal.Editar')

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

@stop

@section('footer')
    @include('footer.foot')
@stop

@section('css')

    <!-- estilos para tablas profesionales datatable-->
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap5.min.css">

    <!-- estilos para botones de exportación-->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.dataTables.min.css">
    <!-- Estilos para Select2-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/css/select2.min.css"
        integrity="sha512-nMNlpuaDPrqlEls3IX/Q56H36qvBASwb3ipuo3MxeWbsQB1881ox0cRv7UPTgBlriqoynt35KjEwgGUeUXIPnw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

@stop

@section('js')

    <!-- scripts para tablas profesionales-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap5.min.js"></script>

    <!-- scripts para exportación de archivos-->
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <!-- scripts para Select2-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.9/js/select2.min.js"
        integrity="sha512-9p/L4acAjbjIaaGXmZf0Q2bV42HetlCLbv8EP0z3rLbQED2TAFUlDvAezy7kumYqg5T8jHtDdlm1fgIsr5QzKg=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
    
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- scripts para funcionalidad de tabla profesional-->

    <!-- Script para inicializar el gráfico -->    

    <script>
        $(document).ready(function() {
            $('#tbmantenimiento').DataTable({
                //traduccion datatable
                "language": {
                    "lengthMenu": "Mostrar " +
                        '<select class="custom-select custom-select-sm form-control form-control-sm"> <option value="5">5</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="-1">All</option></select>' +
                        " registros por página",
                    "zeroRecords": "Nada encontrado - disculpa",
                    "info": "",
                    "infoEmpty": "No hay registros disponibles",
                    "infoFiltered": "(filtrado de MAX registros totales)",
                    "search": "Buscar :",
                    "paginate": {
                        "next": "siguiente",
                        "previous": "Anterior"
                    }
                },

                //paginacion
                "lengthMenu": [
                    [5, 10, 50, -1],
                    [5, 10, 50, "All"]
                ],
                "order": [[0, 'asc']],

            });
            $('#tbmantenimiento2').DataTable(
        {

        //traduccion datatable
        "language": {
            "lengthMenu": "Mostrar " +
                '<select class="custom-select custom-select-sm form-control form-control-sm"> <option value="5">5</option><option value="10">10</option><option value="15">15</option><option value="20">20</option><option value="25">25</option><option value="-1">All</option></select>' +
                " registros por página",
            "zeroRecords": "Nada encontrado - disculpa",
            "info": "",
            "infoEmpty": "No hay registros disponibles",
            "infoFiltered": "(filtrado de MAX registros totales)",
            "search": "Buscar :",
            "paginate": {
                "next": "siguiente",
                "previous": "Anterior"
            }
        },

        //paginacion
        "lengthMenu": [
            [5, 10, 50, -1],
            [5, 10, 50, "All"]
        ],

        });
    });

        //funcion para la alerta de eliminar
        $('.formulario-eliminar').submit(function(e) {
            e.preventDefault();
            Swal.fire({
                title: '¿Estas Seguro?',
                text: "Estas a punto de eliminar",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si,Eliminar'
            }).then((result) => {
                if (result.isConfirmed) {

                    this.submit();
                }
            })
        })
</script>

<!-- Al final antes de </body> -->
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card-body">
        <!-- Tu tabla actual -->

        <!-- Agrega un contenedor para el gráfico -->
        <div>
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>

<!-- Al final antes de </body> -->
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var data = @json($data);

        var labels = data.map(function (item) {
            return item.trabajador;
        });

        var faltasData = data.map(function (item) {
            return item.meses.Falta || 0;
        });

        var asistenciasData = data.map(function (item) {
            return item.meses.Asistencia || 0;
        });

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [
                    {
                        label: 'Faltas',
                        data: faltasData,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Asistencias',
                        data: asistenciasData,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>

<script>
    function filtrar() {
        // Obtener valores de las fechas
        var startDate = document.getElementById('start_date').value;
        var endDate = document.getElementById('end_date').value;
        console.log('Fecha de inicio:', startDate);
        console.log('Fecha de fin:', endDate);

        // Realizar la solicitud Ajax
        $.ajax({
            type: 'GET',
        url: '{{ url("asistencia") }}',
        data: { start_date: startDate, end_date: endDate },
            success: function (data) {
                // Actualizar la tabla y el gráfico con los datos recibidos
                $('#tbmantenimiento2 tbody').html(data.tabla);
                // Actualiza el gráfico si estás utilizando Chart.js
                // ...

                // Puedes añadir más lógica según tus necesidades
            },
            error: function (error) {
                console.log(error);
            }
        });
    }
</script>







    <!--Condicionales para las alertas , con las variables del (with) de los controladores-->

    @if (session('delete') == 'Registro eliminado correctamente')
        <script>
            Swal.fire(
                'Eliminado!',
                'Se eliminó correctamente.',
                'error'
            )
        </script>
    @endif
    @if (session('create') == 'Registro agregado correctamente')
        <script>
            Swal.fire(
                'Registrado!',
                'Se Registró correctamente.',
                'success'
            )
        </script>
    @endif
    @if (session('update') == 'Registro actualizado correctamente')
        <script>
            Swal.fire(
                'Actualizado!',
                'Se Actualizó correctamente.',
                'success'
            )
        </script>
    @endif
    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: '{{ session('error') }}',
        });
    </script>
@endif
@stop
