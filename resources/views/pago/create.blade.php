
@extends('layouts.app')

@section('template_title')
    Registrar pago
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

    .pago-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        padding-top: 22px;
        margin-top: 10px;
        border-top: 1px solid #edf0f6;
    }

    .btn-pago {
        border: none;
        border-radius: 10px;
        padding: 11px 20px;
        font-size: 14px;
        font-weight: 650;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: .2s;
    }

    .btn-pago-primary {
        background: linear-gradient(120deg, #174b91, #2875cc);
        color: white;
        box-shadow: 0 4px 10px rgba(40, 117, 204, .2);
    }

    .btn-pago-primary:hover {
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 14px rgba(40, 117, 204, .3);
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

        .pago-card-body {
            padding: 20px 16px;
        }

        .pago-actions {
            flex-direction: column-reverse;
        }

        .btn-pago {
            width: 100%;
        }
    }
</style>

<div class="pago-page">

    {{-- Encabezado --}}
    <div class="pago-hero">
        <h2><i class="bi bi-cash-coin me-2"></i> Registro de pagos</h2>
        <p>Registra y administra los pagos correspondientes a las matrículas de los alumnos.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">

            <div class="pago-card">

                {{-- Cabecera de la tarjeta --}}
                <div class="pago-card-header">
                    <div class="pago-icon">
                        <i class="bi bi-wallet2"></i>
                    </div>

                    <div>
                        <h5>Información del pago</h5>
                        <small>Completa los datos para registrar una nueva operación</small>
                    </div>
                </div>

                {{-- Formulario --}}
                <div class="pago-card-body">

                    <form method="POST"
                          action="{{ route('pagos.store') }}"
                          role="form"
                          enctype="multipart/form-data">

                        @csrf

                        @include('pago.form')

                        <div class="pago-actions">

                            <a href="{{ route('pagos.index') }}"
                               class="btn-pago btn-pago-secondary">
                                <i class="bi bi-arrow-left"></i>
                                Volver al listado
                            </a>

                            <button type="submit"
                                    class="btn-pago btn-pago-primary">
                                <i class="bi bi-check-circle"></i>
                                Registrar pago
                            </button>

                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
