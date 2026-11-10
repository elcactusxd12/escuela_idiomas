
@extends('layouts.app')

@section('content')
<style>
    .login-page {
        min-height: calc(100vh - 70px);
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 45px 18px;
        background:
            radial-gradient(circle at 10% 15%, rgba(59, 130, 246, .16), transparent 30%),
            radial-gradient(circle at 90% 85%, rgba(99, 102, 241, .15), transparent 30%),
            #f1f5fb;
    }

    .login-wrapper {
        width: 100%;
        max-width: 1050px;
        min-height: 590px;
        display: grid;
        grid-template-columns: 1fr 1fr;
        background: #fff;
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 25px 70px rgba(15, 35, 75, .13);
    }

    /* PANEL IZQUIERDO */
    .login-info {
        position: relative;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 48px;
        color: white;
        overflow: hidden;
        background: linear-gradient(145deg, #102b55, #174b91 65%, #2563b9);
    }

    .login-info::before,
    .login-info::after {
        content: "";
        position: absolute;
        border-radius: 50%;
        background: rgba(255,255,255,.06);
    }

    .login-info::before {
        width: 330px;
        height: 330px;
        right: -120px;
        top: -100px;
    }

    .login-info::after {
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

    .language-cards {
        position: relative;
        z-index: 2;
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 30px;
    }

    .language-card {
        padding: 10px 14px;
        border-radius: 12px;
        background: rgba(255,255,255,.12);
        border: 1px solid rgba(255,255,255,.12);
        font-size: 13px;
    }

    .info-footer {
        position: relative;
        z-index: 2;
        color: rgba(255,255,255,.65);
        font-size: 12px;
    }

    /* PANEL DERECHO */
    .login-form-panel {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 55px 50px;
    }

    .login-form-content {
        width: 100%;
        max-width: 370px;
    }

    .welcome-text {
        margin-bottom: 35px;
    }

    .welcome-text .welcome-icon {
        width: 55px;
        height: 55px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 17px;
        background: #eaf2ff;
        color: #2563b9;
        font-size: 25px;
        margin-bottom: 22px;
    }

    .welcome-text h2 {
        color: #142b4d;
        font-size: 29px;
        font-weight: 800;
        margin-bottom: 9px;
    }

    .welcome-text p {
        color: #8995a7;
        font-size: 14px;
        margin: 0;
    }

    .form-label-custom {
        display: block;
        color: #34445d;
        font-size: 13px;
        font-weight: 700;
        margin-bottom: 9px;
    }

    .input-group-custom {
        position: relative;
        margin-bottom: 22px;
    }

    .input-group-custom .input-icon {
        position: absolute;
        top: 50%;
        left: 16px;
        transform: translateY(-50%);
        color: #91a0b5;
        font-size: 17px;
        z-index: 3;
    }

    .input-custom {
        width: 100%;
        height: 53px;
        padding: 12px 15px 12px 46px;
        border: 1px solid #e1e8f0;
        border-radius: 12px;
        background: #f8faff;
        color: #263b59;
        font-size: 14px;
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
        right: 15px;
        transform: translateY(-50%);
        border: none;
        background: transparent;
        color: #8492a6;
        cursor: pointer;
        z-index: 4;
    }

    .login-options {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        margin: 3px 0 27px;
        font-size: 12px;
    }

    .remember-check {
        color: #78869a;
    }

    .remember-check input {
        margin-right: 6px;
        accent-color: #2563b9;
    }

    .forgot-link {
        color: #2563b9;
        text-decoration: none;
        font-weight: 700;
    }

    .forgot-link:hover {
        color: #174b91;
        text-decoration: underline;
    }

    .btn-login {
        width: 100%;
        height: 53px;
        border: none;
        border-radius: 12px;
        background: linear-gradient(100deg, #174b91, #2875cc);
        color: white;
        font-size: 14px;
        font-weight: 800;
        letter-spacing: .4px;
        box-shadow: 0 9px 20px rgba(37,99,185,.22);
        transition: .25s;
    }

    .btn-login:hover {
        transform: translateY(-2px);
        box-shadow: 0 13px 25px rgba(37,99,185,.3);
        background: linear-gradient(100deg, #123e7b, #1e65b5);
    }

    .register-text {
        text-align: center;
        margin-top: 28px;
        color: #8995a7;
        font-size: 13px;
    }

    .register-text a {
        color: #2563b9;
        font-weight: 800;
        text-decoration: none;
    }

    .register-text a:hover {
        text-decoration: underline;
    }

    .security-note {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 7px;
        color: #a0aaba;
        font-size: 11px;
        margin-top: 35px;
    }

    @media (max-width: 767px) {
        .login-page {
            padding: 25px 13px;
        }

        .login-wrapper {
            grid-template-columns: 1fr;
            max-width: 480px;
        }

        .login-info {
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

        .language-cards {
            margin-top: 18px;
        }

        .info-footer {
            display: none;
        }

        .login-form-panel {
            padding: 38px 27px;
        }

        .welcome-text {
            margin-bottom: 27px;
        }
    }

    @media (max-width: 380px) {
        .login-info {
            padding: 25px 22px;
        }

        .login-form-panel {
            padding: 35px 21px;
        }

        .login-options {
            align-items: flex-start;
            flex-direction: column;
        }
    }
</style>

<div class="login-page">
    <div class="login-wrapper">

        {{-- PANEL INFORMATIVO --}}
        <div class="login-info">

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
                    <i class="bi bi-stars"></i> TU FUTURO COMIENZA AQUÍ
                </span>

                <h1>
                    Un nuevo idioma,
                    <span>un mundo de oportunidades.</span>
                </h1>

                <p>
                    Accede a nuestra plataforma académica y descubre una
                    nueva forma de aprender, organizar tus cursos y alcanzar
                    tus metas.
                </p>

                <div class="language-cards">
                    <div class="language-card">🌎 Nuevos idiomas</div>
                    <div class="language-card">📚 Cursos</div>
                    <div class="language-card">🎓 Formación</div>
                </div>
            </div>

            <div class="info-footer">
                © {{ date('Y') }} Escuela de Idiomas. Todos los derechos reservados.
            </div>

        </div>

        {{-- PANEL DE LOGIN --}}
        <div class="login-form-panel">
            <div class="login-form-content">

                <div class="welcome-text">
                    <div class="welcome-icon">
                        <i class="bi bi-person-lock"></i>
                    </div>

                    <h2>¡Bienvenido!</h2>
                    <p>Ingresa tus credenciales para acceder a la plataforma.</p>
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

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
                            autofocus
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
                            placeholder="Ingresa tu contraseña"
                            required
                            autocomplete="current-password"
                        >

                        <button
                            type="button"
                            class="password-toggle"
                            onclick="togglePassword()"
                            aria-label="Mostrar u ocultar contraseña"
                        >
                            <i class="bi bi-eye" id="passwordIcon"></i>
                        </button>

                        @error('password')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- OPCIONES --}}
                    <div class="login-options">
                        <label class="remember-check">
                            <input
                                type="checkbox"
                                name="remember"
                                id="remember"
                                {{ old('remember') ? 'checked' : '' }}
                            >
                            Recordar mi sesión
                        </label>

                        @if (Route::has('password.request'))
                            <a class="forgot-link" href="{{ route('password.request') }}">
                                ¿Olvidaste tu contraseña?
                            </a>
                        @endif
                    </div>

                    {{-- BOTÓN --}}
                    <button type="submit" class="btn-login">
                        INICIAR SESIÓN
                        <i class="bi bi-arrow-right ms-2"></i>
                    </button>

                </form>

                @if (Route::has('register'))
                    <div class="register-text">
                        ¿Todavía no tienes una cuenta?
                        <a href="{{ route('register') }}">Regístrate aquí</a>
                    </div>
                @endif

                <div class="security-note">
                    <i class="bi bi-shield-lock-fill"></i>
                    Tu acceso está protegido y es seguro.
                </div>

            </div>
        </div>

    </div>
</div>

<script>
    function togglePassword() {
        const password = document.getElementById('password');
        const icon = document.getElementById('passwordIcon');

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
