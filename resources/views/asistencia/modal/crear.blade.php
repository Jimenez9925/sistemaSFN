<div class="modal fade" id="reporte" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

<div class="modal-header" style="background-color: #0085e0 !important;">
    <h6 class="modal-title text-center" style="color: #fff; text-align: center;">
        Control de Asistencia de Trabajadores
    </h6>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<!-- Agrega el formulario para el filtro de asistencia por mes -->

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card-body">
        <form method="GET" action="{{ route('asistencia.index') }}">
            <div class="form-group">
                <label for="mes">Seleccionar Mes:</label>
                <select name="mes" id="mes" class="form-control" onchange="this.form.submit()">
                    @for ($i = 1; $i <= 12; $i++)
                        @php
                            $nombreMes = ucfirst(\Carbon\Carbon::create(null, $i, 1, 0, 0, 0)->locale('es_ES')->isoFormat('MMMM'));
                        @endphp
                        <option value="{{ $i }}" {{ $i == $mesSeleccionado ? 'selected' : '' }}>
                            {{ $nombreMes }}
                        </option>
                    @endfor
                </select>
            </div>
        </form>

        <table id="tbmantenimiento2" class="table table-sm table-striped table-hover table-bordered shadow-lg dt-responsive nowrap" style="width:80%">
            <thead class="text-white" style="background-color:#6777ef">
                <tr>
                    <th>Trabajador</th>
                    <th class="text-center">Faltas</th>
                    <th class="text-center">Asistencias</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $trabajadorData)
                    <tr>
                        <td>{{ $trabajadorData['trabajador'] }}</td>
                        <td class="text-center">{{ $trabajadorData['meses']['Falta'] ?? 0 }}</td>
                        <td class="text-center">{{ $trabajadorData['meses']['Asistencia'] ?? 0 }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Fin de formulario -->

<div class="col-lg-10 col-md-10 col-sm-10 col-xs-10">
    <div class="card-body">
        <!-- Tu tabla actual -->

        <!-- Agrega un contenedor para el gráfico -->
        <div>
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>



</div>
    </div>
</div>
<!---fin ventana Crear--->