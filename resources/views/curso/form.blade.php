
<div class="row padding-1 p-1">
    <div class="col-md-12">

        {{-- Nombre --}}
        <div class="form-group mb-2 mb20">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" name="nombre"
                class="form-control @error('nombre') is-invalid @enderror"
                value="{{ old('nombre', $curso?->nombre) }}"
                id="nombre" placeholder="Nombre">
            {!! $errors->first('nombre', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

        {{-- Nivel --}}
        <div class="form-group mb-2 mb20">
            <label for="nivel" class="form-label">Nivel</label>
            <select name="nivel" id="nivel"
                class="form-control @error('nivel') is-invalid @enderror">
                <option value="">Seleccione un nivel</option>
                <option value="Básico" {{ old('nivel', $curso?->nivel) == 'Básico' ? 'selected' : '' }}>Básico</option>
                <option value="Intermedio" {{ old('nivel', $curso?->nivel) == 'Intermedio' ? 'selected' : '' }}>Intermedio</option>
                <option value="Avanzado" {{ old('nivel', $curso?->nivel) == 'Avanzado' ? 'selected' : '' }}>Avanzado</option>
            </select>
            {!! $errors->first('nivel', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

        {{-- Duración en horas --}}
        <div class="form-group mb-2 mb20">
            <label for="duracion_horas" class="form-label">Duración en Horas</label>
            <input type="number" name="duracion_horas"
                class="form-control @error('duracion_horas') is-invalid @enderror"
                value="{{ old('duracion_horas', $curso?->duracion_horas) }}"
                id="duracion_horas" placeholder="Duración en horas" min="1">
            {!! $errors->first('duracion_horas', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

        {{-- Precio --}}
        <div class="form-group mb-2 mb20">
            <label for="precio" class="form-label">Precio</label>
            <input type="number" step="0.01" name="precio"
                class="form-control @error('precio') is-invalid @enderror"
                value="{{ old('precio', $curso?->precio) }}"
                id="precio" placeholder="Precio" min="0">
            {!! $errors->first('precio', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

        {{-- Idioma --}}
        <div class="form-group mb-2 mb20">
            <label for="idiomas_id" class="form-label">Idioma</label>
            <select name="idiomas_id" id="idiomas_id"
                class="form-control @error('idiomas_id') is-invalid @enderror">
                <option value="">Seleccione un idioma</option>
                @foreach ($idioma as $id => $nombre)
                    <option value="{{ $id }}"
                        {{ old('idiomas_id', $curso?->idiomas_id) == $id ? 'selected' : '' }}>
                        {{ $nombre }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('idiomas_id', '<div class="invalid-feedback"><strong>:message</strong></div>') !!}
        </div>

    </div>

    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</div>
