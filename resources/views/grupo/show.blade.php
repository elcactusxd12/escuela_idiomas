
@extends('layouts.app')

@section('template_title')
    Detalle del grupo
@endsection

@section('content')
<style>
    .grupo-page {
        padding: 25px 15px;
        background: #f3f6fc;
        min-height: calc(100vh - 70px);
    }

    .grupo-hero {
        background: linear-gradient(120deg, #102b55, #174b91, #2875cc);
        border-radius: 18px;
        padding: 30px;
        color: white;
        margin-bottom: 25px;
        position: relative;
        overflow: hidden;
    }

    .grupo-hero::after {
        content: "\f4d0";
        font-family: "bootstrap-icons";
        position: absolute;
        right: 35px;
        top: 5px;
        font-size: 115px;
        opacity: .10;
    }

    .grupo-hero h2 {
        font-weight: 800;
        margin-bottom: 8px;
        font-size: 27px;
    }

    .grupo-hero p {
        margin: 0;
        opacity: .85;
        font-size: 14px;
    }

    .grupo-card {
        background: #fff;
        border: none;
        border-radius: 17px;
        box-shadow: 0 5px 22px rgba(20, 50, 90, .07);
        overflow: hidden;
    }

    .grupo-card-header {
        padding: 21px 25px;
        border-bottom: 1px solid #edf0f6;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .grupo-header-info {
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .grupo-icon {
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

    .grupo-card-header h5 {
        margin: 0;
        color: #17345f;
        font-weight: 750;
        font-size: 17px;
    }

    .grupo-card-header small {
        color: #8995a8;
        font-size: 12px;
    }

    .grupo-card-body {
        padding: 28px;
    }

    .grupo-section-title {
        color: #17345f;
        font-weight: 750;
        font-size: 15px;
        margin-bottom: 18px;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .grupo-section-title i {
        color: #2875cc;
        font-size: 18px;
    }

    .grupo-detail {
        background: #f8faff;
        border: 1px solid #edf1f8;
        border-radius: 12px;
        padding: 19px;
        height: 100%;
        transition: .2s;
    }

    .grupo-detail:hover {
        border-color: #c9dcfa;
        transform: translateY(-2px);
    }

    .grupo-detail-label {
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

    .grupo-detail-label i {
        color: #2875cc;
        font-size: 16px;
    }

    .grupo-detail-value {
        color: #243b5c;
        font-size: 15px;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    .grupo-date {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: #eaf2ff;
        color: #174b91;
        border-radius: 9px;
        padding: 7px 11px;
        font-size: 13px;
        font-weight: 700;
    }

    .grupo-capacity {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #e8f7ee;
        color: #16834b;
        padding: 8px 13px;
        border-radius: 10px;
        font-weight: 750;
        font-size: 14px;
    }

    .grupo-related {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .grupo-related-icon {
        width: 40px;
        height: 40px;
        flex-shrink: 0;
        border-radius: 11px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #eaf2ff;
        color: #174b91;
        font-size: 19px;
    }

    .grupo-related-text {
        color: #243b5c;
        font-size: 15px;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    .grupo-divider {
        border: none;
        border-top: 1px solid #edf0f6;
        margin: 28px 0;
    }

    .btn-grupo {
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

    .btn-grupo-secondary {
        background: #edf1f7;
        color: #52627a;
    }

    .btn-grupo-secondary:hover {
        background: #e0e7f1;
        color: #17345f;
    }

    @media (max-width: 576px) {
        .grupo-page {
            padding: 15px 10px;
        }

        .grupo-hero {
            padding: 23px 20px;
        }

        .grupo-hero h2 {
            font-size: 22px;
        }

        .grupo-hero::after {
            right: 15px;
            font-size: 75px;
        }

        .grupo-card-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .grupo-card-header .btn-grupo {
            width: 100%;
        }

        .grupo-card-body {
            padding: 20px 16px;
        }
    }
</style>

<div class="grupo-page">

    {{-- Encabezado --}}
    <div class="grupo-hero">
        <h2><i class="bi bi-people-fill me-2"></i> Detalle del grupo</h2>
        <p>Consulta la información académica, los horarios y las asignaciones del grupo seleccionado.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">

            <div class="grupo-card">

                {{-- Cabecera --}}
                <div class="grupo-card-header">

                    <div class="grupo-header-info">
                        <div class="grupo-icon">
                            <i class="bi bi-collection"></i>
                        </div>

                        <div>
                            <h5>Información del grupo</h5>
                            <small>Ficha descriptiva del grupo académico</small>
                        </div>
                    </div>

                    <a href="{{ route('grupos.index') }}"
                       class="btn-grupo btn-grupo-secondary">
                        <i class="bi bi-arrow-left"></i>
                        Volver al listado
                    </a>

                </div>

                <div class="grupo-card-body">

                    {{-- Datos generales --}}
                    <div class="grupo-section-title">
                        <i class="bi bi-info-circle"></i>
                        Datos generales
                    </div>

                    <div class="row g-3">

                        <div class="col-12 col-md-6">
                            <div class="grupo-detail">
                                <div class="grupo-detail-label">
                                    <i class="bi bi-tag"></i>
                                    Nombre del grupo
                                </div>

                                <div class="grupo-detail-value">
                                    {{ $grupo->nombre ?? 'No registrado' }}
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="grupo-detail">
                                <div class="grupo-detail-label">
                                    <i class="bi bi-people"></i>
                                    Cupo máximo
                                </div>

                                <div class="grupo-detail-value">
                                    <span class="grupo-capacity">
                                        <i class="bi bi-person-fill"></i>
                                        {{ $grupo->cupo_maximo ?? 'No definido' }}
                                        @if($grupo->cupo_maximo !== null)
                                            alumnos
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <hr class="grupo-divider">

                    {{-- Fechas y horario --}}
                    <div class="grupo-section-title">
                        <i class="bi bi-calendar-week"></i>
                        Programación del grupo
                    </div>

                    <div class="row g-3">

                        <div class="col-12 col-md-6">
                            <div class="grupo-detail">
                                <div class="grupo-detail-label">
                                    <i class="bi bi-calendar-check"></i>
                                    Fecha de inicio
                                </div>

                                <div class="grupo-detail-value">
                                    <span class="grupo-date">
                                        {{ $grupo->fecha_inicio ?? 'No registrada' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="grupo-detail">
                                <div class="grupo-detail-label">
                                    <i class="bi bi-calendar-x"></i>
                                    Fecha de finalización
                                </div>

                                <div class="grupo-detail-value">
                                    <span class="grupo-date">
                                        {{ $grupo->fecha_fin ?? 'No registrada' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="grupo-detail">
                                <div class="grupo-detail-label">
                                    <i class="bi bi-clock"></i>
                                    Horario
                                </div>

                                <div class="grupo-detail-value">
                                    {{ $grupo->horario ?? 'No registrado' }}
                                </div>
                            </div>
                        </div>

                    </div>

                    <hr class="grupo-divider">

                    {{-- Asignaciones --}}
                    <div class="grupo-section-title">
                        <i class="bi bi-mortarboard"></i>
                        Asignaciones académicas
                    </div>

                    <div class="row g-3">

                        <div class="col-12 col-md-6">
                            <div class="grupo-detail">
                                <div class="grupo-detail-label">
                                    <i class="bi bi-book"></i>
                                    Curso asignado
                                </div>

                                <div class="grupo-related">
                                    <div class="grupo-related-icon">
                                        <i class="bi bi-journal-bookmark"></i>
                                    </div>

                                    <div class="grupo-related-text">
                                        {{ $grupo->curso?->nombre ?? 'Sin curso' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="grupo-detail">
                                <div class="grupo-detail-label">
                                    <i class="bi bi-person-badge"></i>
                                    Profesor asignado
                                </div>

                                <div class="grupo-related">
                                    <div class="grupo-related-icon">
                                        <i class="bi bi-person-workspace"></i>
                                    </div>

                                    <div class="grupo-related-text">
                                        {{ $grupo->profesor?->nombres ?? 'Sin profesor' }}
                                        {{ $grupo->profesor?->apellidos ?? '' }}
                                    </div>
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
