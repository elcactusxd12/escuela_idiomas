
<div class="row padding-1 p-1">
    <div class="col-md-12">

        {{-- Nombre --}}
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre"
                class="form-control @error('nombre') is-invalid @enderror"
                value="{{ old('nombre', $grupo?->nombre) }}"
                id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

        {{-- Fecha de inicio --}}
        <div class="form-group mb-2 mb20">
            <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
            <input type="date" name="fecha_inicio"
                class="form-control @error('fecha_inicio') is-invalid @enderror"
                value="{{ old('fecha_inicio', $grupo?->fecha_inicio) }}"
                id="fecha_inicio">
            {!! $errors->first('fecha_inicio', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

        {{-- Fecha de fin --}}
        <div class="form-group mb-2 mb20">
            <label for="fecha_fin" class="form-label">Fecha de Fin</label>
            <input type="date" name="fecha_fin"
                class="form-control @error('fecha_fin') is-invalid @enderror"
                value="{{ old('fecha_fin', $grupo?->fecha_fin) }}"
                id="fecha_fin">
            {!! $errors->first('fecha_fin', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

        {{-- Horario --}}
        <div class="form-group mb-2 mb20">
            <label for="horario" class="form-label">Horario</label>
            <input type="text" name="horario"
                class="form-control @error('horario') is-invalid @enderror"
                value="{{ old('horario', $grupo?->horario) }}"
                id="horario" placeholder="Ejemplo: Lunes a Viernes 08:00 - 10:00">
            {!! $errors->first('horario', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

        {{-- Cupo máximo --}}
        <div class="form-group mb-2 mb20">
            <label for="cupo_maximo" class="form-label">Cupo Máximo</label>
            <input type="number" name="cupo_maximo"
                class="form-control @error('cupo_maximo') is-invalid @enderror"
                value="{{ old('cupo_maximo', $grupo?->cupo_maximo) }}"
                id="cupo_maximo" placeholder="Cupo Máximo" min="1">
            {!! $errors->first('cupo_maximo', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

        {{-- Curso --}}
        <div class="form-group mb-2 mb20">
            <label for="cursos_id" class="form-label">Curso</label>
            <select name="cursos_id" id="cursos_id"
                class="form-control @error('cursos_id') is-invalid @enderror">

                <option value="">Seleccione un curso</option>

                @foreach ($curso as $id => $nombre)
                    <option value="{{ $id }}"
                        {{ old('cursos_id', $grupo?->cursos_id) == $id ? 'selected' : '' }}>
                        {{ $nombre }}
                    </option>
                @endforeach

            </select>
            {!! $errors->first('cursos_id', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

        {{-- Profesor --}}
        <div class="form-group mb-2 mb20">
            <label for="profesores_id" class="form-label">Profesor</label>
            <select name="profesores_id" id="profesores_id"
                class="form-control @error('profesores_id') is-invalid @enderror">

                <option value="">Seleccione un profesor</option>

                @foreach ($profesor as $item)
                    <option value="{{ $item->id }}"
                        {{ old('profesores_id', $grupo?->profesores_id) == $item->id ? 'selected' : '' }}>
                        {{ $item->nombres }} {{ $item->apellidos }}
                    </option>
                @endforeach

            </select>
            {!! $errors->first('profesores_id', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

    </div>

    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
