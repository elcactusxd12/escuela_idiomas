
<div class="row padding-1 p-1">
    <div class="col-md-12">

        {{-- Fecha --}}
        <div class="form-group mb-2 mb20">
            <label for="fecha" class="form-label">Fecha</label>
            <input type="date" name="fecha"
                class="form-control @error('fecha') is-invalid @enderror"
                value="{{ old('fecha', $asistencia?->fecha) }}"
                id="fecha">
            {!! $errors->first('fecha', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

        {{-- Estado --}}
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado"
                class="form-control @error('estado') is-invalid @enderror">

                <option value="">Seleccione un estado</option>

                <option value="Presente" {{ old('estado', $asistencia?->estado) == 'Presente' ? 'selected' : '' }}>
                    Presente
                </option>

                <option value="Ausente" {{ old('estado', $asistencia?->estado) == 'Ausente' ? 'selected' : '' }}>
                    Ausente
                </option>

                <option value="Tardanza" {{ old('estado', $asistencia?->estado) == 'Tardanza' ? 'selected' : '' }}>
                    Tardanza
                </option>

                <option value="Justificado" {{ old('estado', $asistencia?->estado) == 'Justificado' ? 'selected' : '' }}>
                    Justificado
                </option>

            </select>
            {!! $errors->first('estado', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

        {{-- Observación --}}
        <div class="form-group mb-2 mb20">
            <label for="observacion" class="form-label">Observación</label>
            <input type="text" name="observacion"
                class="form-control @error('observacion') is-invalid @enderror"
                value="{{ old('observacion', $asistencia?->observacion) }}"
                id="observacion"
                placeholder="Observación">

            {!! $errors->first('observacion', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

        {{-- Matrícula --}}
        <div class="form-group mb-2 mb20">
            <label for="matriculas_id" class="form-label">Alumno y Grupo</label>

            <select name="matriculas_id" id="matriculas_id"
                class="form-control @error('matriculas_id') is-invalid @enderror">

                <option value="">Seleccione un alumno</option>

                @foreach ($matricula as $item)
                    <option value="{{ $item->id }}"
                        {{ old('matriculas_id', $asistencia?->matriculas_id) == $item->id ? 'selected' : '' }}>

                        {{ $item->alumno?->nombres ?? 'Sin alumno' }}
                        {{ $item->alumno?->apellidos ?? '' }}
                        -
                        {{ $item->grupo?->nombre ?? 'Sin grupo' }}

                    </option>
                @endforeach

            </select>

            {!! $errors->first('matriculas_id', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

    </div>

    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
