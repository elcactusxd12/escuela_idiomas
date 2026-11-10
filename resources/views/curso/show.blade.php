
@extends('layouts.app')

@section('template_title')
    Detalle del curso
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
        padding: 21px 25px;
        border-bottom: 1px solid #edf0f6;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .curso-header-info {
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .curso-icon {
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

    .curso-section-title {
        color: #17345f;
        font-weight: 750;
        font-size: 15px;
        margin-bottom: 18px;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .curso-section-title i {
        color: #2875cc;
        font-size: 18px;
    }

    .curso-detail {
        background: #f8faff;
        border: 1px solid #edf1f8;
        border-radius: 12px;
        padding: 19px;
        height: 100%;
        transition: .2s;
    }

    .curso-detail:hover {
        border-color: #c9dcfa;
        transform: translateY(-2px);
    }

    .curso-detail-label {
        color: #8995a8;
        font-size: 12px;
        font-weight: 650;
        text-transform: uppercase;
        letter-spacing: .4px;
        margin-bottom: 9px;
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .curso-detail-label i {
        color: #2875cc;
        font-size: 16px;
    }

    .curso-detail-value {
        color: #243b5c;
        font-size: 16px;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    .curso-level {
        display: inline-flex;
        align-items: center;
        padding: 7px 13px;
        border-radius: 30px;
        background: #eaf2ff;
        color: #174b91;
        font-size: 12px;
        font-weight: 750;
    }

    .curso-price {
        color: #16834b;
        font-size: 20px;
        font-weight: 800;
    }

    .curso-language {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #edf7ff;
        color: #17609d;
        border-radius: 10px;
        padding: 8px 13px;
        font-weight: 700;
        font-size: 14px;
    }

    .curso-divider {
        border: none;
        border-top: 1px solid #edf0f6;
        margin: 28px 0;
    }

    .btn-curso {
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

    .btn-curso-primary {
        background: linear-gradient(120deg, #174b91, #2875cc);
        color: white;
        box-shadow: 0 4px 12px rgba(23, 75, 145, .2);
    }

    .btn-curso-primary:hover {
        color: white;
        transform: translateY(-2px);
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

        .curso-card-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .curso-card-header .btn-curso {
            width: 100%;
        }

        .curso-card-body {
            padding: 20px 16px;
        }
    }
</style>

<div class="curso-page">

    {{-- Encabezado --}}
    <div class="curso-hero">
        <h2><i class="bi bi-book-half me-2"></i> Detalle del curso</h2>
        <p>Consulta toda la información académica del curso seleccionado.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">

            <div class="curso-card">

                {{-- Cabecera --}}
                <div class="curso-card-header">

                    <div class="curso-header-info">
                        <div class="curso-icon">
                            <i class="bi bi-journal-bookmark"></i>
                        </div>

                        <div>
                            <h5>Información del curso</h5>
                            <small>Ficha descriptiva del curso académico</small>
                        </div>
                    </div>

                    <a href="{{ route('cursos.index') }}"
                       class="btn-curso btn-curso-secondary">
                        <i class="bi bi-arrow-left"></i>
                        Volver al listado
                    </a>

                </div>

                <div class="curso-card-body">

                    <div class="curso-section-title">
                        <i class="bi bi-info-circle"></i>
                        Datos generales
                    </div>

                    <div class="row g-3">

                        {{-- Nombre --}}
                        <div class="col-12 col-md-6">
                            <div class="curso-detail">
                                <div class="curso-detail-label">
                                    <i class="bi bi-book"></i>
                                    Nombre del curso
                                </div>

                                <div class="curso-detail-value">
                                    {{ $curso->nombre ?? 'No registrado' }}
                                </div>
                            </div>
                        </div>

                        {{-- Nivel --}}
                        <div class="col-12 col-md-6">
                            <div class="curso-detail">
                                <div class="curso-detail-label">
                                    <i class="bi bi-bar-chart"></i>
                                    Nivel
                                </div>

                                <div class="curso-detail-value">
                                    <span class="curso-level">
                                        {{ $curso->nivel ?? 'No registrado' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- Duración --}}
                        <div class="col-12 col-md-6">
                            <div class="curso-detail">
                                <div class="curso-detail-label">
                                    <i class="bi bi-clock"></i>
                                    Duración
                                </div>

                                <div class="curso-detail-value">
                                    {{ $curso->duracion_horas ?? 'No registrada' }}
                                    @if($curso->duracion_horas !== null)
                                        horas
                                    @endif
                                </div>
                            </div>
                        </div>

                        {{-- Precio --}}
                        <div class="col-12 col-md-6">
                            <div class="curso-detail">
                                <div class="curso-detail-label">
                                    <i class="bi bi-cash-coin"></i>
                                    Precio del curso
                                </div>

                                <div class="curso-price">
                                    S/ {{ number_format((float) $curso->precio, 2) }}
                                </div>
                            </div>
                        </div>

                    </div>

                    <hr class="curso-divider">

                    {{-- Idioma --}}
                    <div class="curso-section-title">
                        <i class="bi bi-globe2"></i>
                        Idioma asociado
                    </div>

                    <div class="row g-3">
                        <div class="col-12 col-md-6">
                            <div class="curso-detail">
                                <div class="curso-detail-label">
                                    <i class="bi bi-translate"></i>
                                    Idioma
                                </div>

                                <div class="curso-detail-value">
                                    <span class="curso-language">
                                        <i class="bi bi-globe"></i>
                                        {{ $curso->idioma?->nombre ?? 'Sin idioma' }}
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>
@endsection
