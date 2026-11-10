
@extends('layouts.app')

@section('template_title')
    Editar idioma
@endsection

@section('content')
<style>
    .idioma-page {
        padding: 25px 15px;
        background: #f3f6fc;
        min-height: calc(100vh - 70px);
    }

    .idioma-hero {
        background: linear-gradient(120deg, #102b55, #174b91, #2875cc);
        border-radius: 18px;
        padding: 30px;
        color: white;
        margin-bottom: 25px;
        position: relative;
        overflow: hidden;
    }

    .idioma-hero::after {
        content: "\f4ca";
        font-family: "bootstrap-icons";
        position: absolute;
        right: 35px;
        top: 5px;
        font-size: 115px;
        opacity: .10;
    }

    .idioma-hero h2 {
        font-size: 27px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .idioma-hero p {
        margin: 0;
        opacity: .85;
        font-size: 14px;
    }

    .idioma-card {
        background: white;
        border: none;
        border-radius: 17px;
        box-shadow: 0 5px 22px rgba(20, 50, 90, .07);
        overflow: hidden;
    }

    .idioma-card-header {
        padding: 21px 25px;
        border-bottom: 1px solid #edf0f6;
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .idioma-icon {
        width: 45px;
        height: 45px;
        border-radius: 12px;
        background: #eaf2ff;
        color: #174b91;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }

    .idioma-card-header h5 {
        margin: 0;
        color: #17345f;
        font-weight: 750;
        font-size: 17px;
    }

    .idioma-card-header small {
        color: #8995a8;
        font-size: 12px;
    }

    .idioma-card-body {
        padding: 28px;
    }

    .idioma-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding-top: 22px;
        margin-top: 10px;
        border-top: 1px solid #edf0f6;
    }

    .btn-idioma {
        border: none;
        border-radius: 10px;
        padding: 11px 20px;
        font-size: 14px;
        font-weight: 650;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: .2s;
    }

    .btn-idioma-primary {
        background: linear-gradient(120deg, #174b91, #2875cc);
        color: white;
        box-shadow: 0 4px 10px rgba(40, 117, 204, .2);
    }

    .btn-idioma-primary:hover {
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 14px rgba(40, 117, 204, .3);
    }

    .btn-idioma-secondary {
        background: #edf1f7;
        color: #52627a;
    }

    .btn-idioma-secondary:hover {
        background: #e0e7f1;
        color: #17345f;
    }

    @media (max-width: 576px) {
        .idioma-page {
            padding: 15px 10px;
        }

        .idioma-hero {
            padding: 23px 20px;
        }

        .idioma-hero h2 {
            font-size: 22px;
        }

        .idioma-hero::after {
            right: 15px;
            font-size: 75px;
        }

        .idioma-card-body {
            padding: 20px 16px;
        }

        .idioma-actions {
            flex-direction: column-reverse;
        }

        .btn-idioma {
            width: 100%;
        }
    }
</style>

<div class="idioma-page">

    {{-- Encabezado --}}
    <div class="idioma-hero">
        <h2><i class="bi bi-pencil-square me-2"></i> Editar idioma</h2>
        <p>Actualiza la información del idioma seleccionado en el sistema académico.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-xl-9">

            <div class="idioma-card">

                {{-- Cabecera de la tarjeta --}}
                <div class="idioma-card-header">
                    <div class="idioma-icon">
                        <i class="bi bi-globe2"></i>
                    </div>

                    <div>
                        <h5>Actualizar información</h5>
                        <small>Modifica los datos necesarios y guarda los cambios</small>
                    </div>
                </div>

                {{-- Formulario --}}
                <div class="idioma-card-body">

                    <form method="POST"
                          action="{{ route('idiomas.update', $idioma->id) }}"
                          role="form"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PATCH')

                        @include('idioma.form')

                        <div class="idioma-actions">

                            <a href="{{ route('idiomas.index') }}"
                               class="btn-idioma btn-idioma-secondary">
                                <i class="bi bi-arrow-left"></i>
                                Volver al listado
                            </a>

                            <button type="submit"
                                    class="btn-idioma btn-idioma-primary">
                                <i class="bi bi-save"></i>
                                Guardar cambios
                            </button>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
