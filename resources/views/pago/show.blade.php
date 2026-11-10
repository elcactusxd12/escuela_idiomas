
@extends('layouts.app')

@section('template_title')
    Detalle del pago
@endsection

@section('content')
<style>
    .pago-page {
        padding: 25px 15px;
        background: #f3f6fc;
        min-height: calc(100vh - 70px);
    }

    .pago-hero {
        background: linear-gradient(120deg, #102b55, #174b91, #2875cc);
        border-radius: 18px;
        padding: 30px;
        color: white;
        margin-bottom: 25px;
        position: relative;
        overflow: hidden;
    }

    .pago-hero::after {
        content: "\f4c0";
        font-family: "bootstrap-icons";
        position: absolute;
        right: 35px;
        top: 5px;
        font-size: 115px;
        opacity: .10;
    }

    .pago-hero h2 {
        font-size: 27px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .pago-hero p {
        margin: 0;
        opacity: .85;
        font-size: 14px;
    }

    .pago-card {
        background: white;
        border: none;
        border-radius: 17px;
        box-shadow: 0 5px 22px rgba(20, 50, 90, .07);
        overflow: hidden;
    }

    .pago-card-header {
        padding: 21px 25px;
        border-bottom: 1px solid #edf0f6;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .pago-header-info {
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .pago-icon {
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

    .pago-card-header h5 {
        margin: 0;
        color: #17345f;
        font-weight: 750;
        font-size: 17px;
    }

    .pago-card-header small {
        color: #8995a8;
        font-size: 12px;
    }

    .pago-card-body {
        padding: 28px;
    }

    .pago-section-title {
        color: #17345f;
        font-weight: 750;
        font-size: 15px;
        margin-bottom: 18px;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .pago-section-title i {
        color: #2875cc;
        font-size: 18px;
    }

    .pago-detail {
        background: #f8faff;
        border: 1px solid #edf1f8;
        border-radius: 12px;
        padding: 20px;
        height: 100%;
        transition: .2s;
    }

    .pago-detail:hover {
        border-color: #c9dcfa;
        transform: translateY(-2px);
    }

    .pago-detail-label {
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

    .pago-detail-label i {
        color: #2875cc;
        font-size: 16px;
    }

    .pago-detail-value {
        color: #243b5c;
        font-size: 16px;
        font-weight: 750;
        overflow-wrap: anywhere;
    }

    .pago-amount {
        color: #16834b;
        font-size: 25px;
        font-weight: 800;
    }

    .pago-date {
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

    .pago-method {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #eaf2ff;
        color: #174b91;
        padding: 8px 13px;
        border-radius: 9px;
        font-size: 14px;
        font-weight: 700;
    }

    .pago-concept {
        background: #f8faff;
        border: 1px solid #edf1f8;
        border-left: 4px solid #2875cc;
        padding: 17px;
        border-radius: 10px;
        color: #52627a;
        font-size: 14px;
        font-weight: 600;
        line-height: 1.6;
        overflow-wrap: anywhere;
    }

    .pago-related {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .pago-related-icon {
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

    .pago-related-text {
        color: #243b5c;
        font-size: 15px;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    .pago-divider {
        border: none;
        border-top: 1px solid #edf0f6;
        margin: 28px 0;
    }

    .btn-pago {
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

    .btn-pago-secondary {
        background: #edf1f7;
        color: #52627a;
    }

    .btn-pago-secondary:hover {
        background: #e0e7f1;
        color: #17345f;
    }

    @media (max-width: 576px) {
        .pago-page {
            padding: 15px 10px;
        }

        .pago-hero {
            padding: 23px 20px;
        }

        .pago-hero h2 {
            font-size: 22px;
        }

        .pago-hero::after {
            right: 15px;
            font-size: 75px;
        }

        .pago-card-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .pago-card-header .btn-pago {
            width: 100%;
        }

        .pago-card-body {
            padding: 20px 16px;
        }

        .pago-amount {
            font-size: 22px;
        }
    }
</style>

<div class="pago-page">

    {{-- Encabezado --}}
    <div class="pago-hero">
        <h2><i class="bi bi-cash-coin me-2"></i> Detalle del pago</h2>
        <p>Consulta la información económica y académica de la operación registrada.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">

            <div class="pago-card">

                {{-- Cabecera --}}
                <div class="pago-card-header">

                    <div class="pago-header-info">
                        <div class="pago-icon">
                            <i class="bi bi-wallet2"></i>
                        </div>

                        <div>
                            <h5>Información del pago</h5>
                            <small>Ficha descriptiva de la operación registrada</small>
                        </div>
                    </div>

                    <a href="{{ route('pagos.index') }}"
                       class="btn-pago btn-pago-secondary">
                        <i class="bi bi-arrow-left"></i>
                        Volver al listado
                    </a>

                </div>

                <div class="pago-card-body">

                    {{-- Información económica --}}
                    <div class="pago-section-title">
                        <i class="bi bi-cash-stack"></i>
                        Información económica
                    </div>

                    <div class="row g-3">

                        <div class="col-12 col-md-6">
                            <div class="pago-detail">
                                <div class="pago-detail-label">
                                    <i class="bi bi-currency-exchange"></i>
                                    Monto del pago
                                </div>

                                <div class="pago-detail-value">
                                    <span class="pago-amount">
                                        S/ {{ number_format((float) $pago->monto, 2) }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="pago-detail">
                                <div class="pago-detail-label">
                                    <i class="bi bi-calendar-check"></i>
                                    Fecha del pago
                                </div>

                                <div class="pago-detail-value">
                                    <span class="pago-date">
                                        {{ $pago->fecha_pago ?? 'No registrada' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="pago-detail">
                                <div class="pago-detail-label">
                                    <i class="bi bi-credit-card"></i>
                                    Método de pago
                                </div>

                                <div class="pago-detail-value">
                                    <span class="pago-method">
                                        <i class="bi bi-wallet"></i>
                                        {{ $pago->metodo_pago ?? 'No especificado' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <hr class="pago-divider">

                    {{-- Concepto --}}
                    <div class="pago-section-title">
                        <i class="bi bi-card-text"></i>
                        Concepto del pago
                    </div>

                    <div class="pago-concept">
                        {{ $pago->concepto ?: 'Sin concepto registrado.' }}
                    </div>

                    <hr class="pago-divider">

                    {{-- Información académica --}}
                    <div class="pago-section-title">
                        <i class="bi bi-mortarboard"></i>
                        Información académica relacionada
                    </div>

                    <div class="row g-3">

                        <div class="col-12 col-md-6">
                            <div class="pago-detail">
                                <div class="pago-detail-label">
                                    <i class="bi bi-person-badge"></i>
                                    Alumno
                                </div>

                                <div class="pago-related">
                                    <div class="pago-related-icon">
                                        <i class="bi bi-person-fill"></i>
                                    </div>

                                    <div class="pago-related-text">
                                        {{ $pago->matricula?->alumno?->nombres ?? 'Sin alumno' }}
                                        {{ $pago->matricula?->alumno?->apellidos ?? '' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6">
                            <div class="pago-detail">
                                <div class="pago-detail-label">
                                    <i class="bi bi-people"></i>
                                    Grupo
                                </div>

                                <div class="pago-related">
                                    <div class="pago-related-icon">
                                        <i class="bi bi-collection"></i>
                                    </div>

                                    <div class="pago-related-text">
                                        {{ $pago->matricula?->grupo?->nombre ?? 'Sin grupo' }}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <hr class="pago-divider">

                    <div class="d-flex align-items-center gap-2 text-muted">
                        <i class="bi bi-shield-check text-success"></i>
                        <small>Información correspondiente al pago seleccionado.</small>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>
@endsection
