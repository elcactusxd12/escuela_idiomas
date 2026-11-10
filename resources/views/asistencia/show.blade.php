
@extends('layouts.app')

@section('template_title')
    Detalle de asistencia
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
        content: "\f1da";
        font-family: "bootstrap-icons";
        position: absolute;
        right: 35px;
        top: 5px;
        font-size: 115px;
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
        padding: 21px 25px;
        border-bottom: 1px solid #edf0f6;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .asistencia-header-info {
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .asistencia-icon {
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

    .asistencia-section-title {
        color: #17345f;
        font-weight: 750;
        font-size: 15px;
        margin-bottom: 17px;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .asistencia-section-title i {
        color: #2875cc;
        font-size: 18px;
    }

    .asistencia-detail {
        background: #f8faff;
        border: 1px solid #edf1f8;
        border-radius: 12px;
        padding: 17px;
        height: 100%;
        transition: .2s;
    }

    .asistencia-detail:hover {
        border-color: #c9dcfa;
        transform: translateY(-2px);
    }

    .asistencia-detail-label {
        color: #8995a8;
        font-size: 12px;
        font-weight: 650;
        text-transform: uppercase;
        letter-spacing: .4px;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 7px;
    }

    .asistencia-detail-label i {
        color: #2875cc;
        font-size: 15px;
    }

    .asistencia-detail-value {
        color: #243b5c;
        font-size: 15px;
        font-weight: 650;
        overflow-wrap: anywhere;
    }

    .asistencia-status {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        padding: 7px 13px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 750;
        background: #e8f7ee;
        color: #16834b;
    }

    .asistencia-observacion {
        background: #f8faff;
        border: 1px solid #edf1f8;
        border-radius: 12px;
        padding: 20px;
        color: #52627a;
        font-size: 14px;
        line-height: 1.7;
        min-height: 75px;
        overflow-wrap: anywhere;
    }

    .asistencia-divider {
        border: none;
        border-top: 1px solid #edf0f6;
        margin: 28px 0;
    }

    .btn-asistencia {
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

    .btn-asistencia-primary {
        background: linear-gradient(120deg, #174b91, #2875cc);
        color: white;
        box-shadow: 0 4px 12px rgba(23, 75, 145, .2);
    }

    .btn-asistencia-primary:hover {
        color: white;
        transform: translateY(-2px);
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

        .asistencia-card-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .asistencia-card-body {
            padding: 20px 16px;
        }

        .asistencia-card-header .btn-asistencia {
            width: 100%;
        }
    }
</style>

<div class="asistencia-page">

    {{-- Encabezado --}}
    <div class="asistencia-hero">
        <h2><i class="bi bi-clipboard-data me-2"></i> Detalle de asistencia</h2>
        <p>Consulta toda la información del registro de asistencia seleccionado.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">

            <div class="asistencia-card">

                {{-- Cabecera de la tarjeta --}}
                <div class="asistencia-card-header">

                    <div class="asistencia-header-info">
                        <div class="asistencia-icon">
                            <i class="bi bi-calendar-check"></i>
                        </div>

                        <div>
                            <h5>Información del registro</h5>
                            <small>Ficha detallada de asistencia</small>
                        </div>
                    </div>

                    <a href="{{ route('asistencias.index') }}"
                       class="btn-asistencia btn-asistencia-secondary">
                        <i class="bi bi-arrow-left"></i>
                        Volver al listado
                    </a>

                </div>

                <div class="asistencia-card-body">

                    {{-- Información de asistencia --}}
                    <div class="asistencia-section-title">
                        <i class="bi bi-info-circle"></i>
                        Datos de asistencia
                    </div>

                    <div class="row g-3">

                        <div class="col-12 col-md-6">
                            <div class="asistencia-detail">
                                <div class="asistencia-detail-label">
                                    <i class="bi bi-calendar-event"></i>
                                    Fecha
                                </div>
                                <div class="asistencia-detail-value">
                                    {{ $asistencia->fecha ?? 'No registrada' }}
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="asistencia-detail">
                                <div class="asistencia-detail-label">
                                    <i class="bi bi-check-circle"></i>
                                    Estado
                                </div>
                                <div class="asistencia-detail-value">
                                    @if($asistencia->estado)
                                        <span class="asistencia-status">
                                            <i class="bi bi-check-circle-fill"></i>
                                            {{ $asistencia->estado }}
                                        </span>
                                    @else
                                        <span class="text-muted">No registrado</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                    </div>

                    <hr class="asistencia-divider">

                    {{-- Información del alumno y grupo --}}
                    <div class="asistencia-section-title">
                        <i class="bi bi-people"></i>
                        Información académica
                    </div>

                    <div class="row g-3">

                        <div class="col-12 col-md-6">
                            <div class="asistencia-detail">
                                <div class="asistencia-detail-label">
                                    <i class="bi bi-person"></i>
                                    Alumno
                                </div>
                                <div class="asistencia-detail-value">
                                    {{ $asistencia->matricula?->alumno?->nombres ?? 'Sin alumno' }}
                                    {{ $asistencia->matricula?->alumno?->apellidos ?? '' }}
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="asistencia-detail">
                                <div class="asistencia-detail-label">
                                    <i class="bi bi-collection"></i>
                                    Grupo
                                </div>
                                <div class="asistencia-detail-value">
                                    {{ $asistencia->matricula?->grupo?->nombre ?? 'Sin grupo' }}
                                </div>
                            </div>
                        </div>

                    </div>

                    <hr class="asistencia-divider">

                    {{-- Observación --}}
                    <div class="asistencia-section-title">
                        <i class="bi bi-chat-left-text"></i>
                        Observación
                    </div>

                    <div class="asistencia-observacion">
                        {{ $asistencia->observacion ?: 'No hay ninguna observación registrada para esta asistencia.' }}
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>
@endsection
