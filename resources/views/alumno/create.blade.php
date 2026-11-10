
@extends('layouts.app')

@section('template_title')
    Registrar alumno
@endsection

@section('content')

<style>
    .student-create-page {
        min-height: calc(100vh - 70px);
        padding: 35px 20px 50px;
        background:
            radial-gradient(circle at 5% 5%, rgba(59,130,246,.09), transparent 28%),
            radial-gradient(circle at 95% 95%, rgba(99,102,241,.09), transparent 28%),
            #f3f6fc;
    }

    .student-create-container {
        max-width: 1100px;
        margin: auto;
    }

    /* CABECERA */
    .create-hero {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
        padding: 30px 35px;
        margin-bottom: 27px;
        border-radius: 20px;
        color: white;
        overflow: hidden;
        background: linear-gradient(120deg, #102b55, #174b91 65%, #2875cc);
        box-shadow: 0 12px 30px rgba(23,75,145,.16);
    }

    .create-hero::after {
        content: "";
        position: absolute;
        width: 260px;
        height: 260px;
        border-radius: 50%;
        right: -75px;
        top: -130px;
        background: rgba(255,255,255,.07);
    }

    .hero-content {
        position: relative;
        z-index: 1;
    }

    .hero-label {
        display: inline-block;
        padding: 6px 12px;
        border-radius: 30px;
        background: rgba(255,255,255,.13);
        border: 1px solid rgba(255,255,255,.15);
        font-size: 11px;
        letter-spacing: 1px;
        margin-bottom: 12px;
    }

    .create-hero h1 {
        font-size: 27px;
        font-weight: 800;
        margin: 0 0 8px;
    }

    .create-hero p {
        margin: 0;
        color: rgba(255,255,255,.75);
        font-size: 13px;
    }

    .hero-icon {
        position: relative;
        z-index: 1;
        width: 75px;
        height: 75px;
        flex-shrink: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 22px;
        background: rgba(255,255,255,.14);
        border: 1px solid rgba(255,255,255,.2);
        font-size: 34px;
    }

    /* TARJETA PRINCIPAL */
    .create-card {
        background: white;
        border: 1px solid #edf1f7;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 35px rgba(20,43,77,.06);
    }

    .create-card-header {
        display: flex;
        align-items: center;
        gap: 14px;
        padding: 23px 30px;
        border-bottom: 1px solid #edf1f7;
    }

    .header-icon {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 13px;
        background: #eaf2ff;
        color: #2563b9;
        font-size: 21px;
    }

    .create-card-header h5 {
        color: #172e50;
        font-size: 16px;
        font-weight: 800;
        margin: 0 0 4px;
    }

    .create-card-header p {
        color: #94a0b1;
        font-size: 12px;
        margin: 0;
    }

    .create-card-body {
        padding: 30px;
    }

    .form-section-title {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #174b91;
        font-size: 13px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .5px;
        margin-bottom: 20px;
    }

    .form-section-title i {
        font-size: 17px;
    }

    .form-section-divider {
        height: 1px;
        background: #edf1f7;
        margin: 25px 0;
    }

    /* BOTONES */
    .create-actions {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 12px;
        padding: 20px 30px;
        background: #fafcff;
        border-top: 1px solid #edf1f7;
    }

    .btn-back-custom {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 11px 19px;
        border: 1px solid #dfe7f1;
        border-radius: 10px;
        background: white;
        color: #52647d;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        transition: .2s;
    }

    .btn-back-custom:hover {
        background: #f0f5fc;
        color: #174b91;
        border-color: #b8cce7;
    }

    .btn-save-custom {
        display: inline-flex;
        align-items: center;
        gap: 9px;
        padding: 12px 23px;
        border: none;
        border-radius: 10px;
        background: linear-gradient(100deg, #174b91, #2875cc);
        color: white;
        font-size: 13px;
        font-weight: 800;
        box-shadow: 0 7px 17px rgba(37,99,185,.2);
        transition: .2s;
    }

    .btn-save-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 10px 22px rgba(37,99,185,.3);
    }

    .create-note {
        display: flex;
        align-items: center;
        gap: 8px;
        color: #91a0b5;
        font-size: 11px;
        margin-top: 20px;
    }

    /* ADAPTACIÓN */
    @media (max-width: 576px) {
        .student-create-page {
            padding: 20px 12px 35px;
        }

        .create-hero {
            padding: 24px 20px;
        }

        .create-hero h1 {
            font-size: 22px;
        }

        .hero-icon {
            width: 55px;
            height: 55px;
            font-size: 25px;
            border-radius: 16px;
        }

        .create-card-header {
            padding: 20px;
        }

        .create-card-body {
            padding: 22px 18px;
        }

        .create-actions {
            padding: 18px;
        }

        .create-actions > * {
            flex: 1;
            justify-content: center;
        }
    }
</style>

<div class="student-create-page">
    <div class="student-create-container">

        {{-- CABECERA --}}
        <div class="create-hero">
            <div class="hero-content">
                <span class="hero-label">
                    <i class="bi bi-mortarboard"></i> GESTIÓN ACADÉMICA
                </span>

                <h1>Registro de alumnos</h1>

                <p>
                    Registra un nuevo alumno y completa su información
                    para incorporarlo a nuestra institución.
                </p>
            </div>

            <div class="hero-icon">
                <i class="bi bi-person-plus-fill"></i>
            </div>
        </div>

        {{-- FORMULARIO --}}
        <div class="create-card">

            <div class="create-card-header">
                <div class="header-icon">
                    <i class="bi bi-person-vcard"></i>
                </div>

                <div>
                    <h5>Información del alumno</h5>
                    <p>Completa los campos correspondientes para registrar al alumno.</p>
                </div>
            </div>

            <form method="POST"
                  action="{{ route('alumnos.store') }}"
                  role="form"
                  enctype="multipart/form-data">

                @csrf

                <div class="create-card-body">

                    <div class="form-section-title">
                        <i class="bi bi-card-text"></i>
                        Datos personales y de contacto
                    </div>

                    {{-- Se conserva el formulario original del módulo --}}
                    @include('alumno.form')

                    <div class="create-note">
                        <i class="bi bi-info-circle"></i>
                        Verifica que la información ingresada sea correcta antes de guardar.
                    </div>

                </div>

                {{-- ACCIONES --}}
                <div class="create-actions">

                    <a href="{{ route('alumnos.index') }}" class="btn-back-custom">
                        <i class="bi bi-arrow-left"></i>
                        Volver a alumnos
                    </a>

                    <button type="submit" class="btn-save-custom">
                        <i class="bi bi-check-circle-fill"></i>
                        Registrar alumno
                    </button>

                </div>

            </form>
        </div>

    </div>
</div>

@endsection
