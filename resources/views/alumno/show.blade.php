
@extends('layouts.app')

@section('template_title')
    Detalles del alumno
@endsection

@section('content')

<style>
    .student-show-page {
        min-height: calc(100vh - 70px);
        padding: 35px 20px 50px;
        background:
            radial-gradient(circle at 5% 5%, rgba(59,130,246,.09), transparent 28%),
            radial-gradient(circle at 95% 95%, rgba(99,102,241,.09), transparent 28%),
            #f3f6fc;
    }

    .student-show-container {
        max-width: 1100px;
        margin: auto;
    }

    /* CABECERA */
    .show-hero {
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

    .show-hero::after {
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

    .show-hero h1 {
        font-size: 27px;
        font-weight: 800;
        margin: 0 0 8px;
    }

    .show-hero p {
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
    .show-card {
        background: white;
        border: 1px solid #edf1f7;
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 10px 35px rgba(20,43,77,.06);
    }

    .show-card-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 15px;
        flex-wrap: wrap;
        padding: 23px 30px;
        border-bottom: 1px solid #edf1f7;
    }

    .header-info {
        display: flex;
        align-items: center;
        gap: 14px;
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

    .show-card-header h5 {
        color: #172e50;
        font-size: 16px;
        font-weight: 800;
        margin: 0 0 4px;
    }

    .show-card-header p {
        color: #94a0b1;
        font-size: 12px;
        margin: 0;
    }

    .btn-edit-custom {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 10px 17px;
        border: none;
        border-radius: 10px;
        background: linear-gradient(100deg, #174b91, #2875cc);
        color: white;
        font-size: 12px;
        font-weight: 700;
        text-decoration: none;
        transition: .2s;
    }

    .btn-edit-custom:hover {
        transform: translateY(-2px);
        color: white;
        box-shadow: 0 7px 16px rgba(37,99,185,.25);
    }

    .show-card-body {
        padding: 30px;
    }

    /* PERFIL */
    .student-profile {
        display: flex;
        align-items: center;
        gap: 18px;
        padding: 22px;
        margin-bottom: 30px;
        border: 1px solid #e7effa;
        border-radius: 16px;
        background: linear-gradient(110deg, #f4f8ff, #fbfdff);
    }

    .profile-avatar {
        width: 70px;
        height: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        border-radius: 20px;
        background: linear-gradient(135deg, #174b91, #2875cc);
        color: white;
        font-size: 30px;
        font-weight: 800;
        box-shadow: 0 7px 15px rgba(37,99,185,.2);
    }

    .profile-info h3 {
        color: #172e50;
        font-size: 20px;
        font-weight: 800;
        margin: 0 0 6px;
    }

    .profile-info p {
        color: #8995a7;
        font-size: 12px;
        margin: 0;
    }

    .profile-tag {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        margin-top: 9px;
        padding: 5px 10px;
        border-radius: 20px;
        background: #e5efff;
        color: #2563b9;
        font-size: 11px;
        font-weight: 700;
    }

    /* DATOS */
    .section-title {
        display: flex;
        align-items: center;
        gap: 9px;
        color: #174b91;
        font-size: 13px;
        font-weight: 800;
        text-transform: uppercase;
        letter-spacing: .5px;
        margin-bottom: 18px;
    }

    .details-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 16px;
    }

    .detail-item {
        display: flex;
        align-items: center;
        gap: 14px;
        min-width: 0;
        padding: 17px;
        border: 1px solid #edf1f7;
        border-radius: 13px;
        background: #fff;
        transition: .2s;
    }

    .detail-item:hover {
        border-color: #c8dafa;
        background: #fafdff;
        transform: translateY(-2px);
    }

    .detail-icon {
        width: 42px;
        height: 42px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        border-radius: 12px;
        background: #edf4ff;
        color: #2563b9;
        font-size: 18px;
    }

    .detail-text {
        min-width: 0;
    }

    .detail-text small {
        display: block;
        color: #94a0b1;
        font-size: 11px;
        font-weight: 700;
        margin-bottom: 5px;
    }

    .detail-text strong {
        display: block;
        color: #263b59;
        font-size: 13px;
        font-weight: 700;
        overflow-wrap: anywhere;
    }

    .show-card-footer {
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

    .show-note {
        color: #91a0b5;
        font-size: 11px;
    }

    @media (max-width: 576px) {
        .student-show-page {
            padding: 20px 12px 35px;
        }

        .show-hero {
            padding: 24px 20px;
        }

        .show-hero h1 {
            font-size: 22px;
        }

        .hero-icon {
            width: 55px;
            height: 55px;
            font-size: 25px;
            border-radius: 16px;
        }

        .show-card-header {
            padding: 20px;
        }

        .show-card-body {
            padding: 20px 16px;
        }

        .student-profile {
            padding: 16px;
        }

        .profile-avatar {
            width: 55px;
            height: 55px;
            font-size: 23px;
        }

        .profile-info h3 {
            font-size: 16px;
        }

        .details-grid {
            grid-template-columns: 1fr;
            gap: 11px;
        }

        .show-card-footer {
            padding: 18px;
        }

        .show-note {
            width: 100%;
        }
    }
</style>

<div class="student-show-page">
    <div class="student-show-container">

        {{-- CABECERA --}}
        <div class="show-hero">
            <div class="hero-content">
                <span class="hero-label">
                    <i class="bi bi-mortarboard"></i> GESTIÓN ACADÉMICA
                </span>

                <h1>Información del alumno</h1>

                <p>
                    Consulta los datos personales y de contacto
                    registrados en el sistema académico.
                </p>
            </div>

            <div class="hero-icon">
                <i class="bi bi-person-vcard-fill"></i>
            </div>
        </div>

        {{-- DETALLES --}}
        <div class="show-card">

            <div class="show-card-header">
                <div class="header-info">
                    <div class="header-icon">
                        <i class="bi bi-person-lines-fill"></i>
                    </div>

                    <div>
                        <h5>Ficha del alumno</h5>
                        <p>Información general del registro.</p>
                    </div>
                </div>

                <a href="{{ route('alumnos.edit', $alumno->id) }}"
                   class="btn-edit-custom">
                    <i class="bi bi-pencil-square"></i>
                    Editar información
                </a>
            </div>

            <div class="show-card-body">

                {{-- PERFIL --}}
                <div class="student-profile">
                    <div class="profile-avatar">
                        {{ strtoupper(substr($alumno->nombres ?? 'A', 0, 1)) }}
                    </div>

                    <div class="profile-info">
                        <h3>
                            {{ $alumno->nombres }} {{ $alumno->apellidos }}
                        </h3>

                        <p>Alumno registrado en la Escuela de Idiomas</p>

                        <span class="profile-tag">
                            <i class="bi bi-patch-check-fill"></i>
                            Ficha académica
                        </span>
                    </div>
                </div>

                {{-- INFORMACIÓN PERSONAL --}}
                <div class="section-title">
                    <i class="bi bi-person-badge"></i>
                    Datos personales y de contacto
                </div>

                <div class="details-grid">

                    <div class="detail-item">
                        <div class="detail-icon">
                            <i class="bi bi-card-heading"></i>
                        </div>
                        <div class="detail-text">
                            <small>DNI</small>
                            <strong>{{ $alumno->dni ?: 'No registrado' }}</strong>
                        </div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-icon">
                            <i class="bi bi-person"></i>
                        </div>
                        <div class="detail-text">
                            <small>Nombres</small>
                            <strong>{{ $alumno->nombres ?: 'No registrado' }}</strong>
                        </div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-icon">
                            <i class="bi bi-people"></i>
                        </div>
                        <div class="detail-text">
                            <small>Apellidos</small>
                            <strong>{{ $alumno->apellidos ?: 'No registrado' }}</strong>
                        </div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-icon">
                            <i class="bi bi-envelope"></i>
                        </div>
                        <div class="detail-text">
                            <small>Correo electrónico</small>
                            <strong>{{ $alumno->email ?: 'No registrado' }}</strong>
                        </div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-icon">
                            <i class="bi bi-telephone"></i>
                        </div>
                        <div class="detail-text">
                            <small>Teléfono</small>
                            <strong>{{ $alumno->telefono ?: 'No registrado' }}</strong>
                        </div>
                    </div>

                    <div class="detail-item">
                        <div class="detail-icon">
                            <i class="bi bi-geo-alt"></i>
                        </div>
                        <div class="detail-text">
                            <small>Dirección</small>
                            <strong>{{ $alumno->direccion ?: 'No registrada' }}</strong>
                        </div>
                    </div>

                </div>

            </div>

            {{-- PIE --}}
            <div class="show-card-footer">
                <a href="{{ route('alumnos.index') }}" class="btn-back-custom">
                    <i class="bi bi-arrow-left"></i>
                    Volver a alumnos
                </a>

                <span class="show-note">
                    <i class="bi bi-shield-check"></i>
                    Información del registro académico.
                </span>
            </div>

        </div>

    </div>
</div>

@endsection
