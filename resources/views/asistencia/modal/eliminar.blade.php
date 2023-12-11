<!-- Ventana modal para Editar -->

<div class="modal fade" id="eliminar{{ $asistencia->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header bg-danger">
                <h6 class="modal-title text-center" style="color: #fff; text-align: center;">
                    Eliminar Trabajador
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {!! Form::model($modelo, [
                'method' => 'PATCH',
                'route' => ['modelo.update', $modelo->id],
            ]) !!}
            @csrf
            @method('PUT')
            <div class="modal-body" id="cont_modal">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label for="titulo">Descripción:</label>
                        <input type="text" name="descripcion" class="form-control"
                            value="{{ $modelo->descripcion }}">
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <div class="col-xs-12 col-sm-12 col-md-12">

                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"> Cancelar</button>
                </div>
            </div>

            {!! Form::close() !!}


        </div>
    </div>
</div>
<!---fin ventana Editar--->
