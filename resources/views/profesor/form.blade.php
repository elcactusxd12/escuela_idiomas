
<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="dni" class="form-label">{{ __('Dni') }}</label>
            <input type="text" name="dni" class="form-control @error('dni') is-invalid @enderror" value="{{ old('dni', $profesor?->dni) }}" id="dni" placeholder="Dni">
            {!! $errors->first('dni', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="nombres" class="form-label">{{ __('Nombres') }}</label>
            <input type="text" name="nombres" class="form-control @error('nombres') is-invalid @enderror" value="{{ old('nombres', $profesor?->nombres) }}" id="nombres" placeholder="Nombres">
            {!! $errors->first('nombres', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="apellidos" class="form-label">{{ __('Apellidos') }}</label>
            <input type="text" name="apellidos" class="form-control @error('apellidos') is-invalid @enderror" value="{{ old('apellidos', $profesor?->apellidos) }}" id="apellidos" placeholder="Apellidos">
            {!! $errors->first('apellidos', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="email" class="form-label">{{ __('Email') }}</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $profesor?->email) }}" id="email" placeholder="Email">
            {!! $errors->first('email', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="telefono" class="form-label">{{ __('Telefono') }}</label>
            <input type="text" name="telefono" class="form-control @error('telefono') is-invalid @enderror" value="{{ old('telefono', $profesor?->telefono) }}" id="telefono" placeholder="Telefono">
            {!! $errors->first('telefono', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="especialidad" class="form-label">{{ __('Especialidad') }}</label>
            <input type="text" name="especialidad" class="form-control @error('especialidad') is-invalid @enderror" value="{{ old('especialidad', $profesor?->especialidad) }}" id="especialidad" placeholder="Especialidad">
            {!! $errors->first('especialidad', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>

    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">
            {{ __('Guardar') }}
        </button>
    </div>
</div>
