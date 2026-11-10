
@extends('layouts.app')

@section('template_title')
    Editar asistencia
@endsection

@section('content')
<style>
    .asistencia-page {
        padding: 25px 15px;
        background: #f3f6fc;
        min-height: calc(100vh - 70px);
    }

    .asistencia-hero {
        background: linear-gradient(120deg, #102b55, #174b91, #2875cc);
        border-radius: 18px;
        padding: 30px;
        color: white;
        margin-bottom: 25px;
        position: relative;
        overflow: hidden;
    }

    .asistencia-hero::after {
        content: "\f4ca";
        font-family: "bootstrap-icons";
        position: absolute;
        right: 35px;
        top: 10px;
        font-size: 110px;
        opacity: .10;
    }

    .asistencia-hero h2 {
        font-weight: 800;
        margin-bottom: 8px;
        font-size: 27px;
    }

    .asistencia-hero p {
        margin: 0;
        opacity: .85;
        font-size: 14px;
    }

    .asistencia-card {
        background: #fff;
        border: none;
        border-radius: 17px;
        box-shadow: 0 5px 22px rgba(20, 50, 90, .07);
        overflow: hidden;
    }

    .asistencia-card-header {
        padding: 20px 25px;
        border-bottom: 1px solid #edf0f6;
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .asistencia-icon {
        width: 43px;
        height: 43px;
        border-radius: 12px;
        background: #eaf2ff;
        color: #174b91;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
    }

    .asistencia-card-header h5 {
        margin: 0;
        color: #17345f;
        font-weight: 750;
        font-size: 17px;
    }

    .asistencia-card-header small {
        color: #8995a8;
        font-size: 12px;
    }

    .asistencia-card-body {
        padding: 28px;
    }

    .asistencia-card-footer {
        padding: 18px 28px;
        background: #fafbfe;
        border-top: 1px solid #edf0f6;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
    }

    .btn-asistencia {
        border: none;
        border-radius: 10px;
        padding: 11px 21px;
        font-weight: 650;
        font-size: 14px;
        transition: .2s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-asistencia-primary {
        background: linear-gradient(120deg, #174b91, #2875cc);
        color: white;
        box-shadow: 0 4px 12px rgba(23, 75, 145, .2);
    }

    .btn-asistencia-primary:hover {
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(23, 75, 145, .3);
    }

    .btn-asistencia-secondary {
        background: #edf1f7;
        color: #52627a;
    }

    .btn-asistencia-secondary:hover {
        background: #e0e7f1;
        color: #17345f;
    }

    @media (max-width: 576px) {
        .asistencia-page {
            padding: 15px 10px;
        }

        .asistencia-hero {
            padding: 23px 20px;
        }

        .asistencia-hero h2 {
            font-size: 22px;
        }

        .asistencia-hero::after {
            right: 15px;
            font-size: 75px;
        }

        .asistencia-card-body {
            padding: 20px 16px;
        }

        .asistencia-card-footer {
            padding: 16px;
            flex-direction: column-reverse;
        }

        .btn-asistencia {
            width: 100%;
        }
    }
</style>

<div class="asistencia-page">

    {{-- Encabezado --}}
    <div class="asistencia-hero">
        <h2><i class="bi bi-pencil-square me-2"></i> Editar asistencia</h2>
        <p>Actualiza la información del registro de asistencia seleccionado.</p>
    </div>

    {{-- Formulario --}}
    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">

            <div class="asistencia-card">

                <div class="asistencia-card-header">
                    <div class="asistencia-icon">
                        <i class="bi bi-clipboard-check"></i>
                    </div>
                    <div>
                        <h5>Actualizar asistencia</h5>
                        <small>Modifica los campos que necesites actualizar</small>
                    </div>
                </div>

                <div class="asistencia-card-body">

                    <form method="POST"
                          action="{{ route('asistencias.update', $asistencia->id) }}"
                          role="form"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PATCH')

                        @include('asistencia.form')

                        <div class="asistencia-card-footer">
                            <a href="{{ route('asistencias.index') }}"
                               class="btn-asistencia btn-asistencia-secondary">
                                <i class="bi bi-arrow-left"></i>
                                Volver al listado
                            </a>

                            <button type="submit"
                                    class="btn-asistencia btn-asistencia-primary">
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
