
@extends('layouts.app')

@section('template_title')
    Editar profesor
@endsection

@section('content')
<style>
    .profesor-page {
        padding: 25px 15px;
        background: #f3f6fc;
        min-height: calc(100vh - 70px);
    }

    .profesor-hero {
        background: linear-gradient(120deg, #102b55, #174b91, #2875cc);
        border-radius: 18px;
        padding: 30px;
        color: white;
        margin-bottom: 25px;
        position: relative;
        overflow: hidden;
    }

    .profesor-hero::after {
        content: "\f4ca";
        font-family: "bootstrap-icons";
        position: absolute;
        right: 35px;
        top: 5px;
        font-size: 115px;
        opacity: .10;
    }

    .profesor-hero h2 {
        font-size: 27px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .profesor-hero p {
        margin: 0;
        opacity: .85;
        font-size: 14px;
    }

    .profesor-card {
        background: white;
        border: none;
        border-radius: 17px;
        box-shadow: 0 5px 22px rgba(20, 50, 90, .07);
        overflow: hidden;
    }

    .profesor-card-header {
        padding: 21px 25px;
        border-bottom: 1px solid #edf0f6;
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .profesor-icon {
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

    .profesor-card-header h5 {
        margin: 0;
        color: #17345f;
        font-weight: 750;
        font-size: 17px;
    }

    .profesor-card-header small {
        color: #8995a8;
        font-size: 12px;
    }

    .profesor-card-body {
        padding: 28px;
    }

    .profesor-footer {
        padding: 18px 25px;
        background: #fbfcff;
        border-top: 1px solid #edf0f6;
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 10px;
    }

    .btn-profesor {
        border: none;
        border-radius: 10px;
        padding: 10px 19px;
        font-weight: 650;
        font-size: 14px;
        transition: .2s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-profesor-primary {
        background: linear-gradient(120deg, #174b91, #2875cc);
        color: white;
        box-shadow: 0 4px 12px rgba(23, 75, 145, .20);
    }

    .btn-profesor-primary:hover {
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(23, 75, 145, .28);
    }

    .btn-profesor-secondary {
        background: #edf1f7;
        color: #52627a;
    }

    .btn-profesor-secondary:hover {
        background: #e0e7f1;
        color: #17345f;
    }

    @media (max-width: 576px) {
        .profesor-page {
            padding: 15px 10px;
        }

        .profesor-hero {
            padding: 23px 20px;
        }

        .profesor-hero h2 {
            font-size: 22px;
        }

        .profesor-hero::after {
            right: 15px;
            font-size: 75px;
        }

        .profesor-card-body {
            padding: 20px 16px;
        }

        .profesor-footer {
            flex-direction: column-reverse;
            padding: 17px;
        }

        .btn-profesor {
            width: 100%;
        }
    }
</style>

<div class="profesor-page">

    {{-- Encabezado --}}
    <div class="profesor-hero">
        <h2><i class="bi bi-pencil-square me-2"></i> Editar profesor</h2>
        <p>Actualiza la información personal y profesional del docente seleccionado.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">

            <div class="profesor-card">

                {{-- Cabecera --}}
                <div class="profesor-card-header">
                    <div class="profesor-icon">
                        <i class="bi bi-person-gear"></i>
                    </div>

                    <div>
                        <h5>Actualizar información</h5>
                        <small>Modifica los campos necesarios y guarda los cambios.</small>
                    </div>
                </div>

                {{-- Formulario --}}
                <div class="profesor-card-body">
                    <form method="POST"
                          action="{{ route('profesores.update', $profesor->id) }}"
                          role="form"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PATCH')

                        @include('profesor.form')

                        <div class="profesor-footer">
                            <a href="{{ route('profesores.index') }}"
                               class="btn-profesor btn-profesor-secondary">
                                <i class="bi bi-arrow-left"></i>
                                Volver al listado
                            </a>

                            <button type="submit"
                                    class="btn-profesor btn-profesor-primary">
                                <i class="bi bi-check-circle-fill"></i>
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
