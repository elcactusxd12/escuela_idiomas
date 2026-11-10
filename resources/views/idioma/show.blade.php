
@extends('layouts.app')

@section('template_title')
    Detalle del idioma
@endsection

@section('content')
<style>
    .idioma-page {
        padding: 25px 15px;
        background: #f3f6fc;
        min-height: calc(100vh - 70px);
    }

    .idioma-hero {
        background: linear-gradient(120deg, #102b55, #174b91, #2875cc);
        border-radius: 18px;
        padding: 30px;
        color: white;
        margin-bottom: 25px;
        position: relative;
        overflow: hidden;
    }

    .idioma-hero::after {
        content: "\f3e8";
        font-family: "bootstrap-icons";
        position: absolute;
        right: 35px;
        top: 5px;
        font-size: 115px;
        opacity: .10;
    }

    .idioma-hero h2 {
        font-size: 27px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .idioma-hero p {
        margin: 0;
        opacity: .85;
        font-size: 14px;
    }

    .idioma-card {
        background: white;
        border: none;
        border-radius: 17px;
        box-shadow: 0 5px 22px rgba(20, 50, 90, .07);
        overflow: hidden;
    }

    .idioma-card-header {
        padding: 21px 25px;
        border-bottom: 1px solid #edf0f6;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
    }

    .idioma-header-info {
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .idioma-icon {
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

    .idioma-card-header h5 {
        margin: 0;
        color: #17345f;
        font-weight: 750;
        font-size: 17px;
    }

    .idioma-card-header small {
        color: #8995a8;
        font-size: 12px;
    }

    .idioma-card-body {
        padding: 28px;
    }

    .idioma-section-title {
        color: #17345f;
        font-weight: 750;
        font-size: 15px;
        margin-bottom: 18px;
        display: flex;
        align-items: center;
        gap: 9px;
    }

    .idioma-section-title i {
        color: #2875cc;
        font-size: 18px;
    }

    .idioma-detail {
        background: #f8faff;
        border: 1px solid #edf1f8;
        border-radius: 12px;
        padding: 22px;
        height: 100%;
        transition: .2s;
    }

    .idioma-detail:hover {
        border-color: #c9dcfa;
        transform: translateY(-2px);
    }

    .idioma-detail-label {
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

    .idioma-detail-label i {
        color: #2875cc;
        font-size: 16px;
    }

    .idioma-detail-value {
        color: #243b5c;
        font-size: 18px;
        font-weight: 750;
        overflow-wrap: anywhere;
    }

    .idioma-code {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        background: #eaf2ff;
        color: #174b91;
        border-radius: 10px;
        padding: 9px 15px;
        font-size: 16px;
        font-weight: 800;
        letter-spacing: 1px;
    }

    .idioma-divider {
        border: none;
        border-top: 1px solid #edf0f6;
        margin: 27px 0;
    }

    .btn-idioma {
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

    .btn-idioma-secondary {
        background: #edf1f7;
        color: #52627a;
    }

    .btn-idioma-secondary:hover {
        background: #e0e7f1;
        color: #17345f;
    }

    @media (max-width: 576px) {
        .idioma-page {
            padding: 15px 10px;
        }

        .idioma-hero {
            padding: 23px 20px;
        }

        .idioma-hero h2 {
            font-size: 22px;
        }

        .idioma-hero::after {
            right: 15px;
            font-size: 75px;
        }

        .idioma-card-header {
            align-items: flex-start;
            flex-direction: column;
        }

        .idioma-card-header .btn-idioma {
            width: 100%;
        }

        .idioma-card-body {
            padding: 20px 16px;
        }

        .idioma-detail-value {
            font-size: 16px;
        }
    }
</style>

<div class="idioma-page">

    {{-- Encabezado --}}
    <div class="idioma-hero">
        <h2><i class="bi bi-translate me-2"></i> Detalle del idioma</h2>
        <p>Consulta la información del idioma registrado en el sistema académico.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-xl-9">

            <div class="idioma-card">

                {{-- Cabecera --}}
                <div class="idioma-card-header">

                    <div class="idioma-header-info">
                        <div class="idioma-icon">
                            <i class="bi bi-globe2"></i>
                        </div>

                        <div>
                            <h5>Información del idioma</h5>
                            <small>Ficha descriptiva del idioma seleccionado</small>
                        </div>
                    </div>

                    <a href="{{ route('idiomas.index') }}"
                       class="btn-idioma btn-idioma-secondary">
                        <i class="bi bi-arrow-left"></i>
                        Volver al listado
                    </a>

                </div>

                <div class="idioma-card-body">

                    <div class="idioma-section-title">
                        <i class="bi bi-info-circle"></i>
                        Datos generales
                    </div>

                    <div class="row g-3">

                        {{-- Nombre --}}
                        <div class="col-12 col-md-7">
                            <div class="idioma-detail">
                                <div class="idioma-detail-label">
                                    <i class="bi bi-fonts"></i>
                                    Nombre del idioma
                                </div>

                                <div class="idioma-detail-value">
                                    {{ $idioma->nombre ?? 'No registrado' }}
                                </div>
                            </div>
                        </div>

                        {{-- Código --}}
                        <div class="col-12 col-md-5">
                            <div class="idioma-detail">
                                <div class="idioma-detail-label">
                                    <i class="bi bi-upc-scan"></i>
                                    Código del idioma
                                </div>

                                <div class="idioma-detail-value">
                                    <span class="idioma-code">
                                        <i class="bi bi-translate"></i>
                                        {{ $idioma->codigo ?? 'Sin código' }}
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>

                    <hr class="idioma-divider">

                    <div class="d-flex align-items-center gap-2 text-muted">
                        <i class="bi bi-check-circle-fill text-success"></i>
                        <small>Información correspondiente al idioma seleccionado.</small>
                    </div>

                </div>

            </div>

        </div>
    </div>

</div>
@endsection
