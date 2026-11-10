
@extends('layouts.app')

@section('content')
<style>
    .register-page {
        min-height: calc(100vh - 70px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 40px 18px;
        background:
            radial-gradient(circle at 10% 15%, rgba(59, 130, 246, .16), transparent 30%),
            radial-gradient(circle at 90% 85%, rgba(99, 102, 241, .15), transparent 30%),
            #f1f5fb;
    }

    .register-wrapper {
        width: 100%;
        max-width: 1100px;
        min-height: 650px;
        display: grid;
        grid-template-columns: .95fr 1.05fr;
        background: #fff;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 25px 70px rgba(15, 35, 75, .13);
    }

    /* PANEL INFORMATIVO */
    .register-info {
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 48px;
        color: white;
        overflow: hidden;
        background: linear-gradient(145deg, #102b55, #174b91 65%, #2563b9);
    }

    .register-info::before,
    .register-info::after {
        content: "";
        position: absolute;
        border-radius: 50%;
        background: rgba(255,255,255,.06);
    }

    .register-info::before {
        width: 330px;
        height: 330px;
        right: -120px;
        top: -100px;
    }

    .register-info::after {
        width: 250px;
        height: 250px;
        left: -100px;
        bottom: -100px;
    }

    .brand {
        position: relative;
        z-index: 2;
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .brand-icon {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 14px;
        background: rgba(255,255,255,.15);
        font-size: 25px;
    }

    .brand-name {
        font-size: 19px;
        font-weight: 800;
        line-height: 1.2;
    }

    .brand-name small {
        display: block;
        margin-top: 4px;
        font-size: 11px;
        font-weight: 400;
        letter-spacing: 2px;
        opacity: .75;
    }

    .info-content {
        position: relative;
        z-index: 2;
        margin: 45px 0;
    }

    .info-label {
        display: inline-block;
        padding: 8px 14px;
        border: 1px solid rgba(255,255,255,.25);
        border-radius: 30px;
        background: rgba(255,255,255,.1);
        font-size: 12px;
        letter-spacing: 1px;
        margin-bottom: 23px;
    }

    .info-content h1 {
        font-size: clamp(32px, 4vw, 43px);
        line-height: 1.18;
        font-weight: 800;
        margin-bottom: 20px;
    }

    .info-content h1 span {
        color: #83c5ff;
    }

    .info-content p {
        color: rgba(255,255,255,.78);
        font-size: 15px;
        line-height: 1.8;
        max-width: 390px;
    }

    .benefits {
        position: relative;
        z-index: 2;
        display: flex;
        flex-direction: column;
        gap: 17px;
        margin-top: 30px;
    }

    .benefit-item {
        display: flex;
        align-items: center;
        gap: 13px;
        color: rgba(255,255,255,.9);
        font-size: 13px;
    }

    .benefit-icon {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        border-radius: 11px;
        background: rgba(255,255,255,.13);
        font-size: 17px;
    }

    .info-footer {
        position: relative;
        z-index: 2;
        color: rgba(255,255,255,.65);
        font-size: 12px;
    }

    /* PANEL DEL FORMULARIO */
    .register-form-panel {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 45px 55px;
    }

    .register-form-content {
        width: 100%;
        max-width: 410px;
    }

    .welcome-text {
        margin-bottom: 27px;
    }

    .welcome-icon {
        width: 52px;
        height: 52px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 16px;
        background: #eaf2ff;
        color: #2563b9;
        font-size: 24px;
        margin-bottom: 17px;
    }

    .welcome-text h2 {
        color: #142b4d;
        font-size: 29px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .welcome-text p {
        color: #8995a7;
        font-size: 13px;
        margin: 0;
    }

    .form-label-custom {
        display: block;
        color: #34445d;
        font-size: 12px;
        font-weight: 700;
        margin-bottom: 8px;
    }

    .input-group-custom {
        position: relative;
        margin-bottom: 17px;
    }

    .input-icon {
        position: absolute;
        top: 50%;
        left: 15px;
        transform: translateY(-50%);
        color: #91a0b5;
        font-size: 16px;
        z-index: 3;
    }

    .input-custom {
        width: 100%;
        height: 49px;
        padding: 11px 43px 11px 44px;
        border: 1px solid #e1e8f0;
        border-radius: 11px;
        background: #f8faff;
        color: #263b59;
        font-size: 13px;
        outline: none;
        transition: .25s;
    }

    .input-custom:focus {
        border-color: #3b82d6;
        background: #fff;
        box-shadow: 0 0 0 4px rgba(59,130,214,.10);
    }

    .input-custom.is-invalid {
        border-color: #dc3545;
    }

    .password-toggle {
        position: absolute;
        top: 50%;
        right: 14px;
        transform: translateY(-50%);
        border: none;
        background: transparent;
        color: #8492a6;
        cursor: pointer;
        z-index: 4;
    }

    .invalid-feedback {
        font-size: 11px;
    }

    .btn-register {
        width: 100%;
        height: 51px;
        border: none;
        border-radius: 12px;
        background: linear-gradient(100deg, #174b91, #2875cc);
        color: white;
        font-size: 13px;
        font-weight: 800;
        letter-spacing: .5px;
        box-shadow: 0 9px 20px rgba(37,99,185,.22);
        transition: .25s;
        margin-top: 5px;
    }

    .btn-register:hover {
        transform: translateY(-2px);
        box-shadow: 0 13px 25px rgba(37,99,185,.3);
        background: linear-gradient(100deg, #123e7b, #1e65b5);
    }

    .login-text {
        text-align: center;
        margin-top: 23px;
        color: #8995a7;
        font-size: 12px;
    }

    .login-text a {
        color: #2563b9;
        font-weight: 800;
        text-decoration: none;
    }

    .login-text a:hover {
        text-decoration: underline;
    }

    .security-note {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        color: #a0aaba;
        font-size: 11px;
        margin-top: 22px;
    }

    @media (max-width: 850px) {
        .register-wrapper {
            grid-template-columns: .85fr 1.15fr;
        }

        .register-info {
            padding: 35px 28px;
        }

        .register-form-panel {
            padding: 40px 30px;
        }
    }

    @media (max-width: 767px) {
        .register-page {
            padding: 25px 13px;
        }

        .register-wrapper {
            grid-template-columns: 1fr;
            max-width: 490px;
        }

        .register-info {
            min-height: 300px;
            padding: 30px;
        }

        .info-content {
            margin: 30px 0 15px;
        }

        .info-content h1 {
            font-size: 29px;
        }

        .info-content p {
            font-size: 13px;
        }

        .benefits {
            gap: 11px;
            margin-top: 20px;
        }

        .info-footer {
            display: none;
        }

        .register-form-panel {
            padding: 38px 27px;
        }
    }

    @media (max-width: 380px) {
        .register-info {
            padding: 25px 22px;
        }

        .register-form-panel {
            padding: 35px 21px;
        }
    }
</style>

<div class="register-page">
    <div class="register-wrapper">

        {{-- PANEL INFORMATIVO --}}
        <div class="register-info">

            <div class="brand">
                <div class="brand-icon">
                    <i class="bi bi-translate"></i>
                </div>

                <div class="brand-name">
                    ESCUELA DE IDIOMAS
                    <small>APRENDE · COMUNICA · CRECE</small>
                </div>
            </div>

            <div class="info-content">
                <span class="info-label">
                    <i class="bi bi-stars"></i> COMIENZA TU EXPERIENCIA
                </span>

                <h1>
                    Tu próximo capítulo
                    <span>comienza con un idioma.</span>
                </h1>

                <p>
                    Crea tu cuenta y forma parte de nuestra comunidad.
                    Da el primer paso hacia nuevas experiencias,
                    conocimientos y oportunidades.
                </p>

                <div class="benefits">
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="bi bi-book-half"></i>
                        </div>
                        Descubre cursos y programas académicos.
                    </div>

                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="bi bi-mortarboard"></i>
                        </div>
                        Aprende con una formación organizada.
                    </div>

                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="bi bi-globe2"></i>
                        </div>
                        Prepárate para nuevas oportunidades.
                    </div>
                </div>
            </div>

            <div class="info-footer">
                © {{ date('Y') }} Escuela de Idiomas. Todos los derechos reservados.
            </div>

        </div>

        {{-- PANEL DE REGISTRO --}}
        <div class="register-form-panel">
            <div class="register-form-content">

                <div class="welcome-text">
                    <div class="welcome-icon">
                        <i class="bi bi-person-plus"></i>
                    </div>

                    <h2>Crear una cuenta</h2>
                    <p>Completa tus datos para comenzar.</p>
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- NOMBRE --}}
                    <div class="input-group-custom">
                        <label for="name" class="form-label-custom">
                            Nombre completo
                        </label>

                        <i class="bi bi-person input-icon"></i>

                        <input
                            id="name"
                            type="text"
                            class="input-custom @error('name') is-invalid @enderror"
                            name="name"
                            value="{{ old('name') }}"
                            placeholder="Ingresa tu nombre"
                            required
                            autocomplete="name"
                            autofocus
                        >

                        @error('name')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- CORREO --}}
                    <div class="input-group-custom">
                        <label for="email" class="form-label-custom">
                            Correo electrónico
                        </label>

                        <i class="bi bi-envelope input-icon"></i>

                        <input
                            id="email"
                            type="email"
                            class="input-custom @error('email') is-invalid @enderror"
                            name="email"
                            value="{{ old('email') }}"
                            placeholder="ejemplo@correo.com"
                            required
                            autocomplete="email"
                        >

                        @error('email')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- CONTRASEÑA --}}
                    <div class="input-group-custom">
                        <label for="password" class="form-label-custom">
                            Contraseña
                        </label>

                        <i class="bi bi-lock input-icon"></i>

                        <input
                            id="password"
                            type="password"
                            class="input-custom @error('password') is-invalid @enderror"
                            name="password"
                            placeholder="Crea una contraseña"
                            required
                            autocomplete="new-password"
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            onclick="togglePassword('password', 'iconPassword')"
                            aria-label="Mostrar u ocultar contraseña"
                        >
                            <i class="bi bi-eye" id="iconPassword"></i>
                        </button>

                        @error('password')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- CONFIRMAR CONTRASEÑA --}}
                    <div class="input-group-custom">
                        <label for="password-confirm" class="form-label-custom">
                            Confirmar contraseña
                        </label>

                        <i class="bi bi-shield-lock input-icon"></i>

                        <input
                            id="password-confirm"
                            type="password"
                            class="input-custom"
                            name="password_confirmation"
                            placeholder="Repite tu contraseña"
                            required
                            autocomplete="new-password"
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            onclick="togglePassword('password-confirm', 'iconConfirm')"
                            aria-label="Mostrar u ocultar confirmación"
                        >
                            <i class="bi bi-eye" id="iconConfirm"></i>
                        </button>
                    </div>

                    {{-- BOTÓN --}}
                    <button type="submit" class="btn-register">
                        CREAR MI CUENTA
                        <i class="bi bi-arrow-right ms-2"></i>
                    </button>

                </form>

                <div class="login-text">
                    ¿Ya tienes una cuenta?
                    <a href="{{ route('login') }}">Inicia sesión aquí</a>
                </div>

                <div class="security-note">
                    <i class="bi bi-shield-lock-fill"></i>
                    Tus datos están protegidos.
                </div>

            </div>
        </div>

    </div>
</div>

<script>
    function togglePassword(inputId, iconId) {
        const password = document.getElementById(inputId);
        const icon = document.getElementById(iconId);

        if (password.type === 'password') {
            password.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            password.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    }
</script>
@endsection
