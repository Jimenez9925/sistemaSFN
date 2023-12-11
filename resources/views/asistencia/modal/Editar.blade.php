<!-- Ventana modal para Editar -->

<div class="modal fade" id="editar{{ $asistencia->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header bg-warning">
                <h6 class="modal-title text-center" style="color: #fff; text-align: center;">
                    Editar Asistencia
                </h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            {!! Form::model($asistencia, [
                'method' => 'PATCH',
                'route' => ['asistencia.update', $asistencia->id]
                ,]) !!}
            @csrf
            @method('PUT')
            <div class="modal-body" id="cont_modal">

                <div class="form-group">
                    <label for="">Fecha:</label>
                    <input type="date" name="fecha" class="form-control" value="{{ $asistencia->fecha }}" disabled>

                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="">Trabajador:</label>
                    {{ Form::select('trabajador_id', $trabajadorasistencia, $asistencia->trabajador_id, [
                        'class' => 'form-control' . ($errors->has('trabajador_id') ? ' is-invalid' : ''),
                        'id' => 'trabajadorcrearcrear',
                        'style' => 'width: 100%',
                        'placeholder' => 'Elegir Trabajador de Inventario',
                        'disabled' => 'disabled' // Agrega el atributo 'disabled' aquí
                    ]) }}
                </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <label for="">Estado:</label>
                    <select class="form-select" aria-label="Default select example" name="estado" >
                    <option value="" disabled>Seleccione un estado</option>
                        <option value="Asistencia">Asistencia</option>
                        <option value="Falta" >Falta</option>
                       
                    </select>
                </div>
                </div>
                <div class="col-md-12">
                <div class="form-group">
                    <label for="">Hora de Entrada:</label>
                    <input type="time" name="entrada" class="form-control" value="{{ $asistencia->entrada }}" >
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="">Hora de Salida:</label>
                    <input type="time" name="salida" class="form-control" value="{{ $asistencia->salida }}">
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
