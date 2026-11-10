
<div class="row padding-1 p-1">
    <div class="col-md-12">

        <div class="form-group mb-2 mb20">
            <label for="monto" class="form-label">{{ __('Monto') }}</label>
            <input type="number" step="0.01" name="monto"
                class="form-control @error('monto') is-invalid @enderror"
                value="{{ old('monto', $pago?->monto) }}"
                id="monto" placeholder="Monto">
            {!! $errors->first('monto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="fecha_pago" class="form-label">{{ __('Fecha de Pago') }}</label>
            <input type="date" name="fecha_pago"
                class="form-control @error('fecha_pago') is-invalid @enderror"
                value="{{ old('fecha_pago', $pago?->fecha_pago) }}"
                id="fecha_pago">
            {!! $errors->first('fecha_pago', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="metodo_pago" class="form-label">{{ __('Método de Pago') }}</label>
            <select name="metodo_pago" id="metodo_pago"
                class="form-control @error('metodo_pago') is-invalid @enderror">

                <option value="">Seleccione un método de pago</option>

                <option value="Efectivo" {{ old('metodo_pago', $pago?->metodo_pago) == 'Efectivo' ? 'selected' : '' }}>
                    Efectivo
                </option>

                <option value="Tarjeta" {{ old('metodo_pago', $pago?->metodo_pago) == 'Tarjeta' ? 'selected' : '' }}>
                    Tarjeta
                </option>

                <option value="Transferencia" {{ old('metodo_pago', $pago?->metodo_pago) == 'Transferencia' ? 'selected' : '' }}>
                    Transferencia
                </option>

                <option value="Yape" {{ old('metodo_pago', $pago?->metodo_pago) == 'Yape' ? 'selected' : '' }}>
                    Yape
                </option>

                <option value="Plin" {{ old('metodo_pago', $pago?->metodo_pago) == 'Plin' ? 'selected' : '' }}>
                    Plin
                </option>

            </select>
            {!! $errors->first('metodo_pago', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="concepto" class="form-label">{{ __('Concepto') }}</label>
            <input type="text" name="concepto"
                class="form-control @error('concepto') is-invalid @enderror"
                value="{{ old('concepto', $pago?->concepto) }}"
                id="concepto" placeholder="Concepto">
            {!! $errors->first('concepto', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

        <div class="form-group mb-2 mb20">
            <label for="matriculas_id" class="form-label">{{ __('Matrícula') }}</label>

            <select name="matriculas_id" id="matriculas_id"
                class="form-control @error('matriculas_id') is-invalid @enderror">

                <option value="">Seleccione una matrícula</option>

                @foreach ($matricula as $id => $numero)
                    <option value="{{ $id }}"
                        {{ old('matriculas_id', $pago?->matriculas_id) == $id ? 'selected' : '' }}>
                        Matrícula N.º {{ $numero }}
                    </option>
                @endforeach

            </select>

            {!! $errors->first('matriculas_id', '<div class="invalid-feedback" role="alert"><strong>:message</strong></div>') !!}
        </div>

    </div>

    <div class="col-md-12 mt20 mt-2">
        <button type="submit" class="btn btn-primary">
            {{ __('Guardar') }}
        </button>
    </div>
</div>
