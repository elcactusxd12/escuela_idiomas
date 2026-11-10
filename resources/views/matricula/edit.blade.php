
@extends('layouts.app')

@section('template_title')
    Editar matrícula
@endsection

@section('content')
<style>
    .matricula-page {
        padding: 25px 15px;
        background: #f3f6fc;
        min-height: calc(100vh - 70px);
    }

    .matricula-hero {
        background: linear-gradient(120deg, #102b55, #174b91, #2875cc);
        border-radius: 18px;
        padding: 30px;
        color: white;
        margin-bottom: 25px;
        position: relative;
        overflow: hidden;
    }

    .matricula-hero::after {
        content: "\f4ca";
        font-family: "bootstrap-icons";
        position: absolute;
        right: 35px;
        top: 5px;
        font-size: 115px;
        opacity: .10;
    }

    .matricula-hero h2 {
        font-size: 27px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .matricula-hero p {
        margin: 0;
        opacity: .85;
        font-size: 14px;
    }

    .matricula-card {
        background: white;
        border: none;
        border-radius: 17px;
        box-shadow: 0 5px 22px rgba(20, 50, 90, .07);
        overflow: hidden;
    }

    .matricula-card-header {
        padding: 21px 25px;
        border-bottom: 1px solid #edf0f6;
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .matricula-icon {
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

    .matricula-card-header h5 {
        margin: 0;
        color: #17345f;
        font-weight: 750;
        font-size: 17px;
    }

    .matricula-card-header small {
        color: #8995a8;
        font-size: 12px;
    }

    .matricula-card-body {
        padding: 28px;
    }

    .matricula-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding-top: 22px;
        margin-top: 10px;
        border-top: 1px solid #edf0f6;
    }

    .btn-matricula {
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

    .btn-matricula-primary {
        background: linear-gradient(120deg, #174b91, #2875cc);
        color: white;
        box-shadow: 0 4px 10px rgba(40, 117, 204, .2);
    }

    .btn-matricula-primary:hover {
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 14px rgba(40, 117, 204, .3);
    }

    .btn-matricula-secondary {
        background: #edf1f7;
        color: #52627a;
    }

    .btn-matricula-secondary:hover {
        background: #e0e7f1;
        color: #17345f;
    }

    @media (max-width: 576px) {
        .matricula-page {
            padding: 15px 10px;
        }

        .matricula-hero {
            padding: 23px 20px;
        }

        .matricula-hero h2 {
            font-size: 22px;
        }

        .matricula-hero::after {
            right: 15px;
            font-size: 75px;
        }

        .matricula-card-body {
            padding: 20px 16px;
        }

        .matricula-actions {
            flex-direction: column-reverse;
        }

        .btn-matricula {
            width: 100%;
        }
    }
</style>

<div class="matricula-page">

    {{-- Encabezado --}}
    <div class="matricula-hero">
        <h2><i class="bi bi-pencil-square me-2"></i> Editar matrícula</h2>
        <p>Actualiza la información de la matrícula seleccionada en el sistema académico.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">

            <div class="matricula-card">

                {{-- Cabecera de la tarjeta --}}
                <div class="matricula-card-header">
                    <div class="matricula-icon">
                        <i class="bi bi-journal-check"></i>
                    </div>

                    <div>
                        <h5>Actualizar información</h5>
                        <small>Modifica los datos necesarios y guarda los cambios</small>
                    </div>
                </div>

                {{-- Formulario --}}
                <div class="matricula-card-body">

                    <form method="POST"
                          action="{{ route('matriculas.update', $matricula->id) }}"
                          role="form"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PATCH')

                        @include('matricula.form')

                        <div class="matricula-actions">

                            <a href="{{ route('matriculas.index') }}"
                               class="btn-matricula btn-matricula-secondary">
                                <i class="bi bi-arrow-left"></i>
                                Volver al listado
                            </a>

                            <button type="submit"
                                    class="btn-matricula btn-matricula-primary">
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
