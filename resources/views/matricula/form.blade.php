
<div class="row padding-1 p-1">
    <div class="col-md-12">

        {{-- Fecha de matrícula --}}
        <div class="form-group mb-2 mb20">
            <label for="fecha_matricula" class="form-label">Fecha de Matrícula</label>
            <input type="date" name="fecha_matricula"
                class="form-control @error('fecha_matricula') is-invalid @enderror"
                value="{{ old('fecha_matricula', $matricula?->fecha_matricula) }}"
                id="fecha_matricula">
            {!! $errors->first('fecha_matricula', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

        {{-- Precio total --}}
        <div class="form-group mb-2 mb20">
            <label for="precio_total" class="form-label">Precio Total</label>
            <input type="number" step="0.01" name="precio_total"
                class="form-control @error('precio_total') is-invalid @enderror"
                value="{{ old('precio_total', $matricula?->precio_total) }}"
                id="precio_total" placeholder="Precio Total">
            {!! $errors->first('precio_total', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

        {{-- Estado --}}
        <div class="form-group mb-2 mb20">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado"
                class="form-control @error('estado') is-invalid @enderror">
                <option value="">Seleccione un estado</option>
                <option value="Pendiente" {{ old('estado', $matricula?->estado) == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="Pagado" {{ old('estado', $matricula?->estado) == 'Pagado' ? 'selected' : '' }}>Pagado</option>
                <option value="Anulado" {{ old('estado', $matricula?->estado) == 'Anulado' ? 'selected' : '' }}>Anulado</option>
            </select>
            {!! $errors->first('estado', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

        {{-- Alumno --}}
        <div class="form-group mb-2 mb20">
            <label for="alumnos_id" class="form-label">Alumno</label>
            <select name="alumnos_id" id="alumnos_id"
                class="form-control @error('alumnos_id') is-invalid @enderror">
                <option value="">Seleccione un alumno</option>

                @foreach ($alumno as $item)
                    <option value="{{ $item->id }}"
                        {{ old('alumnos_id', $matricula?->alumnos_id) == $item->id ? 'selected' : '' }}>
                        {{ $item->nombres }} {{ $item->apellidos }}
                    </option>
                @endforeach

            </select>
            {!! $errors->first('alumnos_id', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

        {{-- Grupo --}}
        <div class="form-group mb-2 mb20">
            <label for="grupos_id" class="form-label">Grupo</label>
            <select name="grupos_id" id="grupos_id"
                class="form-control @error('grupos_id') is-invalid @enderror">
                <option value="">Seleccione un grupo</option>

                @foreach ($grupo as $item)
                    <option value="{{ $item->id }}"
                        {{ old('grupos_id', $matricula?->grupos_id) == $item->id ? 'selected' : '' }}>
                        {{ $item->nombre }}
                    </option>
                @endforeach

            </select>
            {!! $errors->first('grupos_id', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

    </div>

    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
