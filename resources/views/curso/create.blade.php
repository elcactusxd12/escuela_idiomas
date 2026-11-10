
@extends('layouts.app')

@section('template_title')
    Registrar curso
@endsection

@section('content')
<style>
    .curso-page {
        padding: 25px 15px;
        background: #f3f6fc;
        min-height: calc(100vh - 70px);
    }

    .curso-hero {
        background: linear-gradient(120deg, #102b55, #174b91, #2875cc);
        border-radius: 18px;
        padding: 30px;
        color: white;
        margin-bottom: 25px;
        position: relative;
        overflow: hidden;
    }

    .curso-hero::after {
        content: "\f19d";
        font-family: "bootstrap-icons";
        position: absolute;
        right: 35px;
        top: 5px;
        font-size: 115px;
        opacity: .10;
    }

    .curso-hero h2 {
        font-weight: 800;
        margin-bottom: 8px;
        font-size: 27px;
    }

    .curso-hero p {
        margin: 0;
        opacity: .85;
        font-size: 14px;
    }

    .curso-card {
        background: #fff;
        border: none;
        border-radius: 17px;
        box-shadow: 0 5px 22px rgba(20, 50, 90, .07);
        overflow: hidden;
    }

    .curso-card-header {
        padding: 20px 25px;
        border-bottom: 1px solid #edf0f6;
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .curso-icon {
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

    .curso-card-header h5 {
        margin: 0;
        color: #17345f;
        font-weight: 750;
        font-size: 17px;
    }

    .curso-card-header small {
        color: #8995a8;
        font-size: 12px;
    }

    .curso-card-body {
        padding: 28px;
    }

    .curso-card-footer {
        padding: 18px 28px;
        background: #fafbfe;
        border-top: 1px solid #edf0f6;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
    }

    .btn-curso {
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

    .btn-curso-primary {
        background: linear-gradient(120deg, #174b91, #2875cc);
        color: white;
        box-shadow: 0 4px 12px rgba(23, 75, 145, .2);
    }

    .btn-curso-primary:hover {
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(23, 75, 145, .3);
    }

    .btn-curso-secondary {
        background: #edf1f7;
        color: #52627a;
    }

    .btn-curso-secondary:hover {
        background: #e0e7f1;
        color: #17345f;
    }

    @media (max-width: 576px) {
        .curso-page {
            padding: 15px 10px;
        }

        .curso-hero {
            padding: 23px 20px;
        }

        .curso-hero h2 {
            font-size: 22px;
        }

        .curso-hero::after {
            right: 15px;
            font-size: 75px;
        }

        .curso-card-body {
            padding: 20px 16px;
        }

        .curso-card-footer {
            padding: 16px;
            flex-direction: column-reverse;
        }

        .btn-curso {
            width: 100%;
        }
    }
</style>

<div class="curso-page">

    {{-- Encabezado --}}
    <div class="curso-hero">
        <h2><i class="bi bi-book-half me-2"></i> Registro de cursos</h2>
        <p>Incorpora nuevos cursos a la oferta académica de la escuela de idiomas.</p>
    </div>

    {{-- Formulario --}}
    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">

            <div class="curso-card">

                <div class="curso-card-header">
                    <div class="curso-icon">
                        <i class="bi bi-journal-bookmark"></i>
                    </div>

                    <div>
                        <h5>Nuevo curso</h5>
                        <small>Completa los campos para registrar un curso</small>
                    </div>
                </div>

                <div class="curso-card-body">

                    <form method="POST"
                          action="{{ route('cursos.store') }}"
                          role="form"
                          enctype="multipart/form-data">

                        @csrf

                        @include('curso.form')

                        <div class="curso-card-footer">
                            <a href="{{ route('cursos.index') }}"
                               class="btn-curso btn-curso-secondary">
                                <i class="bi bi-arrow-left"></i>
                                Volver al listado
                            </a>

                            <button type="submit"
                                    class="btn-curso btn-curso-primary">
                                <i class="bi bi-check-circle"></i>
                                Registrar curso
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
