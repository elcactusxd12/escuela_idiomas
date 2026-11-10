
@extends('layouts.app')

@section('template_title')
    {{ $profesor->nombres ?? 'Detalle del profesor' }}
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
        content: "\f4da";
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
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .profesor-header-info {
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

    .profesor-profile {
        display: flex;
        align-items: center;
        gap: 18px;
        padding: 22px;
        border-radius: 14px;
        background: linear-gradient(120deg, #f0f5ff, #f8faff);
        border: 1px solid #e7eefb;
        margin-bottom: 28px;
    }

    .profesor-avatar {
        width: 72px;
        height: 72px;
        flex-shrink: 0;
        border-radius: 20px;
        background: linear-gradient(135deg, #174b91, #2875cc);
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 29px;
        font-weight: 800;
        box-shadow: 0 5px 13px rgba(23, 75, 145, .2);
    }

    .profesor-profile h4 {
        color: #17345f;
        font-size: 21px;
        font-weight: 800;
        margin: 0 0 6px;
    }

    .profesor-profile p {
        color: #718096;
        font-size: 13px;
        margin: 0;
    }

    .profesor-section-title {
        color: #17345f;
        font-weight: 750;
        font-size: 15px;
        margin-bottom: 18px;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .profesor-section-title i {
        color: #2875cc;
        font-size: 18px;
    }

    .profesor-detail {
        background: #f8faff;
        border: 1px solid #edf1f8;
        border-radius: 12px;
        padding: 20px;
        height: 100%;
        transition: .2s;
    }

    .profesor-detail:hover {
        border-color: #c9dcfa;
        transform: translateY(-2px);
    }

    .profesor-detail-label {
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

    .profesor-detail-label i {
        color: #2875cc;
        font-size: 16px;
    }

    .profesor-detail-value {
        color: #243b5c;
        font-size: 15px;
        font-weight: 750;
        overflow-wrap: anywhere;
    }

    .profesor-specialty {
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

    .profesor-divider {
        border: none;
        border-top: 1px solid #edf0f6;
        margin: 28px 0;
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

        .profesor-card-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .profesor-card-header .btn-profesor {
            width: 100%;
        }

        .profesor-card-body {
            padding: 20px 16px;
        }

        .profesor-profile {
            padding: 16px;
            gap: 13px;
        }

        .profesor-avatar {
            width: 58px;
            height: 58px;
            font-size: 23px;
        }

        .profesor-profile h4 {
            font-size: 17px;
        }
    }
</style>

<div class="profesor-page">

    {{-- Encabezado --}}
    <div class="profesor-hero">
        <h2><i class="bi bi-person-badge-fill me-2"></i> Detalle del profesor</h2>
        <p>Consulta la información personal y profesional del docente registrado.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">

            <div class="profesor-card">

                {{-- Cabecera --}}
                <div class="profesor-card-header">

                    <div class="profesor-header-info">
                        <div class="profesor-icon">
                            <i class="bi bi-person-vcard-fill"></i>
                        </div>

                        <div>
                            <h5>Información del profesor</h5>
                            <small>Ficha descriptiva del docente seleccionado</small>
                        </div>
                    </div>

                    <a href="{{ route('profesores.index') }}"
                       class="btn-profesor btn-profesor-secondary">
                        <i class="bi bi-arrow-left"></i>
                        Volver al listado
                    </a>

                </div>

                <div class="profesor-card-body">

                    {{-- Perfil --}}
                    <div class="profesor-profile">

                        <div class="profesor-avatar">
                            {{ strtoupper(substr($profesor->nombres ?? 'P', 0, 1)) }}
                        </div>

                        <div>
                            <h4>
                                {{ $profesor->nombres }}
                                {{ $profesor->apellidos }}
                            </h4>

                            <p>
                                <i class="bi bi-mortarboard me-1"></i>
                                {{ $profesor->especialidad ?: 'Especialidad no registrada' }}
                            </p>
                        </div>

                    </div>

                    {{-- Información personal --}}
                    <div class="profesor-section-title">
                        <i class="bi bi-person-lines-fill"></i>
                        Información personal
                    </div>

                    <div class="row g-3">

                        <div class="col-12 col-md-6">
                            <div class="profesor-detail">
                                <div class="profesor-detail-label">
                                    <i class="bi bi-card-text"></i>
                                    DNI
                                </div>

                                <div class="profesor-detail-value">
                                    {{ $profesor->dni ?: 'No registrado' }}
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="profesor-detail">
                                <div class="profesor-detail-label">
                                    <i class="bi bi-person"></i>
                                    Nombres
                                </div>

                                <div class="profesor-detail-value">
                                    {{ $profesor->nombres ?: 'No registrado' }}
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="profesor-detail">
                                <div class="profesor-detail-label">
                                    <i class="bi bi-person-vcard"></i>
                                    Apellidos
                                </div>

                                <div class="profesor-detail-value">
                                    {{ $profesor->apellidos ?: 'No registrado' }}
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="profesor-detail">
                                <div class="profesor-detail-label">
                                    <i class="bi bi-envelope"></i>
                                    Correo electrónico
                                </div>

                                <div class="profesor-detail-value">
                                    {{ $profesor->email ?: 'No registrado' }}
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="profesor-detail">
                                <div class="profesor-detail-label">
                                    <i class="bi bi-telephone"></i>
                                    Teléfono
                                </div>

                                <div class="profesor-detail-value">
                                    {{ $profesor->telefono ?: 'No registrado' }}
                                </div>
                            </div>
                        </div>

                    </div>

                    <hr class="profesor-divider">

                    {{-- Información profesional --}}
                    <div class="profesor-section-title">
                        <i class="bi bi-mortarboard-fill"></i>
                        Información profesional
                    </div>

                    <div class="row g-3">

                        <div class="col-12">
                            <div class="profesor-detail">
                                <div class="profesor-detail-label">
                                    <i class="bi bi-book"></i>
                                    Especialidad
                                </div>

                                <div class="profesor-detail-value">
                                    <span class="profesor-specialty">
                                        <i class="bi bi-award-fill"></i>
                                        {{ $profesor->especialidad ?: 'No registrada' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <hr class="profesor-divider">

                    <div class="d-flex align-items-center gap-2 text-muted">
                        <i class="bi bi-shield-check text-success"></i>
                        <small>Información correspondiente al profesor seleccionado.</small>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>
@endsection
