
@extends('layouts.app')

@section('template_title')
    Detalle de matrícula
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
        content: "\f4da";
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
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .matricula-header-info {
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

    .matricula-section-title {
        color: #17345f;
        font-weight: 750;
        font-size: 15px;
        margin-bottom: 18px;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .matricula-section-title i {
        color: #2875cc;
        font-size: 18px;
    }

    .matricula-detail {
        background: #f8faff;
        border: 1px solid #edf1f8;
        border-radius: 12px;
        padding: 20px;
        height: 100%;
        transition: .2s;
    }

    .matricula-detail:hover {
        border-color: #c9dcfa;
        transform: translateY(-2px);
    }

    .matricula-detail-label {
        color: #8995a8;
        font-size: 12px;
        font-weight: 650;
        text-transform: uppercase;
        letter-spacing: .4px;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .matricula-detail-label i {
        color: #2875cc;
        font-size: 16px;
    }

    .matricula-detail-value {
        color: #243b5c;
        font-size: 16px;
        font-weight: 750;
        overflow-wrap: anywhere;
    }

    .matricula-date {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #eaf2ff;
        color: #174b91;
        border-radius: 9px;
        padding: 8px 12px;
        font-size: 14px;
        font-weight: 700;
    }

    .matricula-price {
        color: #16834b;
        font-size: 23px;
        font-weight: 800;
    }

    .matricula-status {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 8px 13px;
        border-radius: 9px;
        background: #e8f7ee;
        color: #16834b;
        font-size: 13px;
        font-weight: 750;
    }

    .matricula-related {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .matricula-related-icon {
        width: 42px;
        height: 42px;
        flex-shrink: 0;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eaf2ff;
        color: #174b91;
        font-size: 20px;
    }

    .matricula-related-text {
        color: #243b5c;
        font-size: 15px;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    .matricula-divider {
        border: none;
        border-top: 1px solid #edf0f6;
        margin: 28px 0;
    }

    .btn-matricula {
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

        .matricula-card-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .matricula-card-header .btn-matricula {
            width: 100%;
        }

        .matricula-card-body {
            padding: 20px 16px;
        }

        .matricula-price {
            font-size: 20px;
        }
    }
</style>

<div class="matricula-page">

    {{-- Encabezado --}}
    <div class="matricula-hero">
        <h2><i class="bi bi-journal-check me-2"></i> Detalle de matrícula</h2>
        <p>Consulta la información académica y económica de la matrícula seleccionada.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">

            <div class="matricula-card">

                {{-- Cabecera --}}
                <div class="matricula-card-header">

                    <div class="matricula-header-info">
                        <div class="matricula-icon">
                            <i class="bi bi-card-checklist"></i>
                        </div>

                        <div>
                            <h5>Información de la matrícula</h5>
                            <small>Ficha descriptiva del registro académico</small>
                        </div>
                    </div>

                    <a href="{{ route('matriculas.index') }}"
                       class="btn-matricula btn-matricula-secondary">
                        <i class="bi bi-arrow-left"></i>
                        Volver al listado
                    </a>

                </div>

                <div class="matricula-card-body">

                    {{-- Datos de matrícula --}}
                    <div class="matricula-section-title">
                        <i class="bi bi-info-circle"></i>
                        Datos generales
                    </div>

                    <div class="row g-3">

                        <div class="col-12 col-md-6">
                            <div class="matricula-detail">
                                <div class="matricula-detail-label">
                                    <i class="bi bi-calendar-check"></i>
                                    Fecha de matrícula
                                </div>

                                <div class="matricula-detail-value">
                                    <span class="matricula-date">
                                        {{ $matricula->fecha_matricula ?? 'No registrada' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="matricula-detail">
                                <div class="matricula-detail-label">
                                    <i class="bi bi-cash-stack"></i>
                                    Precio total
                                </div>

                                <div class="matricula-detail-value">
                                    <span class="matricula-price">
                                        S/ {{ number_format((float) $matricula->precio_total, 2) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="matricula-detail">
                                <div class="matricula-detail-label">
                                    <i class="bi bi-clipboard-check"></i>
                                    Estado de la matrícula
                                </div>

                                <div class="matricula-detail-value">
                                    <span class="matricula-status">
                                        <i class="bi bi-check-circle-fill"></i>
                                        {{ $matricula->estado ?? 'Sin estado' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <hr class="matricula-divider">

                    {{-- Información académica --}}
                    <div class="matricula-section-title">
                        <i class="bi bi-mortarboard"></i>
                        Información académica
                    </div>

                    <div class="row g-3">

                        <div class="col-12 col-md-6">
                            <div class="matricula-detail">
                                <div class="matricula-detail-label">
                                    <i class="bi bi-person-badge"></i>
                                    Alumno matriculado
                                </div>

                                <div class="matricula-related">
                                    <div class="matricula-related-icon">
                                        <i class="bi bi-person-fill"></i>
                                    </div>

                                    <div class="matricula-related-text">
                                        {{ $matricula->alumno?->nombres ?? 'Sin alumno' }}
                                        {{ $matricula->alumno?->apellidos ?? '' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="matricula-detail">
                                <div class="matricula-detail-label">
                                    <i class="bi bi-people"></i>
                                    Grupo asignado
                                </div>

                                <div class="matricula-related">
                                    <div class="matricula-related-icon">
                                        <i class="bi bi-collection"></i>
                                    </div>

                                    <div class="matricula-related-text">
                                        {{ $matricula->grupo?->nombre ?? 'Sin grupo' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <hr class="matricula-divider">

                    <div class="d-flex align-items-center gap-2 text-muted">
                        <i class="bi bi-shield-check text-success"></i>
                        <small>Información correspondiente al registro de matrícula seleccionado.</small>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>
@endsection
