<!-- Ventana modal para mostrar -->

<div class="modal fade" id="mostrar{{ $asistencia->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header bg-info">
                <h6 class="modal-title text-center" style="color: #fff; text-align: center;">
                    Detalle del Trabajador
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body mt-4 text-left">
                <p><strong>Fecha: </strong>{{ $asistencia->fecha }}</p>
                <p><strong>Trabajador: </strong>{{ $asistencia->trabajador->nombres }} {{ $asistencia->trabajador->apellidos }}</p>
                <p><strong>Estado: </strong>{{ $asistencia->estado }}</p>

            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cerrar</button>
            </div>

        </div>
    </div>
</div>
<!---fin ventana mostrar--->
