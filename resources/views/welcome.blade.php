
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Escuela de Idiomas | Aprende y conquista el mundo</title>

    <meta name="description" content="Descubre nuestra Escuela de Idiomas. Aprende nuevos idiomas, desarrolla tus habilidades y alcanza tus metas.">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700;800&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary: #155eef;
            --primary-dark: #1046b5;
            --navy: #102447;
            --text: #26364d;
            --muted: #718096;
            --light: #f5f8ff;
            --white: #ffffff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
            scroll-padding-top: 85px;
        }

        body {
            font-family: 'DM Sans', sans-serif;
            color: var(--text);
            background: white;
        }

        a {
            text-decoration: none;
        }

        .container-custom {
            width: min(1180px, 92%);
            margin: auto;
        }

        /* NAVBAR */

        .navbar {
            width: 100%;
            background: rgba(255,255,255,.96);
            border-bottom: 1px solid #edf0f5;
            position: sticky;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(15px);
        }

        .nav-content {
            min-height: 76px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 25px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 11px;
            color: var(--navy);
            font-family: 'Manrope', sans-serif;
            font-size: 19px;
            font-weight: 800;
        }

        .brand-icon {
            width: 43px;
            height: 43px;
            display: grid;
            place-items: center;
            background: linear-gradient(135deg, #155eef, #4895ff);
            color: white;
            border-radius: 13px;
            font-size: 21px;
            box-shadow: 0 5px 14px rgba(21,94,239,.2);
        }

        .brand small {
            display: block;
            font-size: 10px;
            color: #8a98aa;
            letter-spacing: 2px;
            font-weight: 700;
            margin-top: -3px;
        }

        .nav-links {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        .nav-links a {
            color: #59677b;
            font-size: 13px;
            font-weight: 700;
            transition: .2s;
        }

        .nav-links a:hover {
            color: var(--primary);
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .btn-login {
            color: var(--navy);
            font-size: 13px;
            font-weight: 700;
            padding: 11px 17px;
            border-radius: 9px;
            transition: .2s;
        }

        .btn-login:hover {
            background: #f1f5ff;
            color: var(--primary);
        }

        .btn-register {
            background: var(--primary);
            color: white;
            padding: 12px 19px;
            border-radius: 9px;
            font-size: 13px;
            font-weight: 700;
            transition: .25s;
        }

        .btn-register:hover {
            background: var(--primary-dark);
            color: white;
            transform: translateY(-2px);
        }

        .menu-toggle {
            display: none;
            border: none;
            background: #eef4ff;
            color: var(--primary);
            width: 42px;
            height: 42px;
            border-radius: 9px;
            font-size: 23px;
            cursor: pointer;
        }

        /* HERO */

        .hero {
            position: relative;
            overflow: hidden;
            padding: 105px 0 100px;
            background:
                radial-gradient(circle at 85% 20%, rgba(75,145,255,.15), transparent 27%),
                linear-gradient(120deg, #f5f8ff 0%, #edf4ff 55%, #f9fbff 100%);
        }

        .hero::before {
            content: "";
            position: absolute;
            width: 400px;
            height: 400px;
            border: 1px solid rgba(21,94,239,.08);
            border-radius: 50%;
            right: -140px;
            bottom: -230px;
        }

        .hero-grid {
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            align-items: center;
            gap: 65px;
            position: relative;
            z-index: 1;
        }

        .hero-label {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #e2edff;
            color: var(--primary);
            padding: 8px 13px;
            border-radius: 30px;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: .6px;
            margin-bottom: 23px;
        }

        .hero-label i {
            font-size: 14px;
        }

        .hero h1 {
            font-family: 'Manrope', sans-serif;
            font-size: clamp(37px, 5vw, 59px);
            line-height: 1.13;
            font-weight: 800;
            color: var(--navy);
            letter-spacing: -2px;
            margin-bottom: 22px;
        }

        .hero h1 span {
            color: var(--primary);
        }

        .hero-description {
            max-width: 510px;
            color: #697991;
            line-height: 1.8;
            font-size: 15px;
            margin-bottom: 30px;
        }

        .hero-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 13px;
        }

        .btn-primary-custom {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            padding: 15px 23px;
            background: var(--primary);
            color: white;
            border-radius: 10px;
            font-weight: 700;
            font-size: 14px;
            box-shadow: 0 8px 20px rgba(21,94,239,.2);
            transition: .25s;
        }

        .btn-primary-custom:hover {
            background: var(--primary-dark);
            color: white;
            transform: translateY(-3px);
        }

        .btn-secondary-custom {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 15px 22px;
            background: white;
            border: 1px solid #dfe7f2;
            color: var(--navy);
            border-radius: 10px;
            font-weight: 700;
            font-size: 14px;
            transition: .2s;
        }

        .btn-secondary-custom:hover {
            border-color: var(--primary);
            color: var(--primary);
        }

        .hero-note {
            margin-top: 29px;
            color: #8794a7;
            font-size: 12px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .hero-note i {
            color: #19a66a;
            font-size: 16px;
        }

        /* HERO VISUAL */

        .hero-visual {
            position: relative;
            min-height: 410px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .visual-main {
            width: 100%;
            max-width: 450px;
            min-height: 350px;
            border-radius: 28px;
            background: linear-gradient(145deg, #174d9f, #0d2b5c);
            padding: 35px;
            color: white;
            position: relative;
            overflow: hidden;
            box-shadow: 0 25px 60px rgba(16,54,111,.22);
        }

        .visual-main::before {
            content: "";
            position: absolute;
            width: 270px;
            height: 270px;
            border: 1px solid rgba(255,255,255,.13);
            border-radius: 50%;
            right: -90px;
            top: -80px;
        }

        .visual-main::after {
            content: "";
            position: absolute;
            width: 180px;
            height: 180px;
            border: 1px solid rgba(255,255,255,.1);
            border-radius: 50%;
            right: -45px;
            top: -35px;
        }

        .visual-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 2;
        }

        .visual-top span {
            font-size: 11px;
            color: #c9ddff;
            font-weight: 700;
            letter-spacing: 1px;
        }

        .visual-top i {
            font-size: 25px;
            color: #8dbaff;
        }

        .visual-title {
            position: relative;
            z-index: 2;
            margin-top: 38px;
        }

        .visual-title h2 {
            font-family: 'Manrope', sans-serif;
            font-size: 31px;
            line-height: 1.2;
            font-weight: 800;
            margin-bottom: 12px;
        }

        .visual-title p {
            color: #c5d8f4;
            font-size: 13px;
            line-height: 1.7;
            max-width: 270px;
        }

        .language-cloud {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 28px;
            position: relative;
            z-index: 2;
        }

        .language-cloud span {
            padding: 9px 13px;
            background: rgba(255,255,255,.12);
            border: 1px solid rgba(255,255,255,.15);
            border-radius: 9px;
            font-size: 12px;
            font-weight: 700;
            backdrop-filter: blur(5px);
        }

        .visual-bottom {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 30px;
            padding-top: 18px;
            border-top: 1px solid rgba(255,255,255,.16);
            position: relative;
            z-index: 2;
        }

        .visual-bottom small {
            color: #c5d8f4;
            font-size: 11px;
        }

        .visual-bottom strong {
            display: block;
            font-size: 15px;
            margin-top: 3px;
        }

        .visual-bottom i {
            font-size: 35px;
            color: #8dbaff;
        }

        .floating-card {
            position: absolute;
            z-index: 3;
            background: white;
            border-radius: 13px;
            padding: 14px 17px;
            box-shadow: 0 10px 35px rgba(16,36,71,.13);
            display: flex;
            align-items: center;
            gap: 11px;
        }

        .floating-card.one {
            top: 35px;
            left: -28px;
        }

        .floating-card.two {
            bottom: 35px;
            right: -25px;
        }

        .floating-icon {
            width: 39px;
            height: 39px;
            display: grid;
            place-items: center;
            border-radius: 10px;
            background: #e8f1ff;
            color: var(--primary);
            font-size: 19px;
        }

        .floating-card strong {
            display: block;
            font-size: 12px;
            color: var(--navy);
        }

        .floating-card small {
            display: block;
            font-size: 10px;
            color: #8a98aa;
            margin-top: 2px;
        }

        /* SECTION GENERAL */

        section {
            padding: 85px 0;
        }

        .section-heading {
            text-align: center;
            max-width: 650px;
            margin: 0 auto 45px;
        }

        .section-tag {
            color: var(--primary);
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 1.7px;
            text-transform: uppercase;
            margin-bottom: 12px;
            display: block;
        }

        .section-heading h2 {
            font-family: 'Manrope', sans-serif;
            color: var(--navy);
            font-size: clamp(27px, 4vw, 37px);
            font-weight: 800;
            margin-bottom: 13px;
        }

        .section-heading p {
            color: var(--muted);
            line-height: 1.8;
            font-size: 14px;
        }

        /* LANGUAGES */

        .languages-section {
            background: white;
        }

        .language-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .language-card {
            padding: 27px 20px;
            border: 1px solid #edf0f5;
            border-radius: 16px;
            background: white;
            text-align: center;
            transition: .25s;
        }

        .language-card:hover {
            transform: translateY(-7px);
            border-color: #c9dcff;
            box-shadow: 0 15px 35px rgba(25,70,140,.08);
        }

        .language-emoji {
            width: 65px;
            height: 65px;
            border-radius: 18px;
            display: grid;
            place-items: center;
            margin: 0 auto 17px;
            background: #f0f5ff;
            font-size: 34px;
        }

        .language-card h3 {
            color: var(--navy);
            font-size: 16px;
            font-weight: 800;
            margin-bottom: 8px;
        }

        .language-card p {
            color: var(--muted);
            font-size: 12px;
            line-height: 1.6;
        }

        /* ABOUT */

        .about-section {
            background: var(--light);
        }

        .about-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 65px;
            align-items: center;
        }

        .about-panel {
            min-height: 350px;
            border-radius: 22px;
            background: linear-gradient(145deg, #174d9f, #0c2b5d);
            padding: 38px;
            color: white;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            overflow: hidden;
            position: relative;
        }

        .about-panel::after {
            content: "\f1ab";
            font-family: "bootstrap-icons";
            position: absolute;
            right: 15px;
            bottom: -35px;
            font-size: 190px;
            opacity: .09;
        }

        .about-panel small {
            color: #b9d4ff;
            font-size: 11px;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .about-panel h3 {
            font-family: 'Manrope', sans-serif;
            font-size: 33px;
            font-weight: 800;
            line-height: 1.25;
            max-width: 370px;
            position: relative;
            z-index: 2;
        }

        .about-panel p {
            color: #c5d8f4;
            font-size: 13px;
            line-height: 1.8;
            max-width: 330px;
            position: relative;
            z-index: 2;
        }

        .about-content .section-tag {
            text-align: left;
        }

        .about-content h2 {
            font-family: 'Manrope', sans-serif;
            font-size: 34px;
            font-weight: 800;
            color: var(--navy);
            line-height: 1.25;
            margin-bottom: 18px;
        }

        .about-content > p {
            color: var(--muted);
            font-size: 14px;
            line-height: 1.9;
            margin-bottom: 24px;
        }

        .benefit-list {
            display: grid;
            gap: 17px;
        }

        .benefit {
            display: flex;
            gap: 13px;
            align-items: flex-start;
        }

        .benefit i {
            width: 35px;
            height: 35px;
            display: grid;
            place-items: center;
            background: #e3edff;
            color: var(--primary);
            border-radius: 9px;
            flex-shrink: 0;
            font-size: 16px;
        }

        .benefit strong {
            color: var(--navy);
            font-size: 13px;
            display: block;
            margin-bottom: 4px;
        }

        .benefit span {
            color: var(--muted);
            font-size: 12px;
            line-height: 1.6;
        }

        /* SYSTEM */

        .system-section {
            background: white;
        }

        .system-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
        }

        .system-card {
            border: 1px solid #edf0f5;
            border-radius: 15px;
            padding: 25px;
            transition: .25s;
        }

        .system-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 30px rgba(16,36,71,.07);
        }

        .system-icon {
            width: 47px;
            height: 47px;
            display: grid;
            place-items: center;
            border-radius: 12px;
            background: #eaf1ff;
            color: var(--primary);
            font-size: 21px;
            margin-bottom: 18px;
        }

        .system-card h3 {
            color: var(--navy);
            font-size: 15px;
            font-weight: 800;
            margin-bottom: 9px;
        }

        .system-card p {
            color: var(--muted);
            font-size: 12px;
            line-height: 1.8;
        }

        /* CTA */

        .cta-section {
            padding: 75px 0;
            background: var(--light);
        }

        .cta-box {
            border-radius: 22px;
            padding: 55px 30px;
            text-align: center;
            color: white;
            background: linear-gradient(115deg, #123d82, #1768d5);
            position: relative;
            overflow: hidden;
        }

        .cta-box::before,
        .cta-box::after {
            content: "";
            position: absolute;
            border: 1px solid rgba(255,255,255,.13);
            border-radius: 50%;
            width: 240px;
            height: 240px;
        }

        .cta-box::before {
            left: -100px;
            top: -140px;
        }

        .cta-box::after {
            right: -100px;
            bottom: -160px;
        }

        .cta-box h2 {
            font-family: 'Manrope', sans-serif;
            font-size: clamp(26px, 4vw, 37px);
            font-weight: 800;
            margin-bottom: 13px;
            position: relative;
            z-index: 1;
        }

        .cta-box p {
            color: #d2e3ff;
            font-size: 14px;
            margin-bottom: 25px;
            position: relative;
            z-index: 1;
        }

        .cta-box .btn {
            display: inline-flex;
            align-items: center;
            gap: 9px;
            padding: 14px 23px;
            background: white;
            color: var(--primary);
            border-radius: 9px;
            font-size: 13px;
            font-weight: 800;
            position: relative;
            z-index: 1;
            transition: .2s;
        }

        .cta-box .btn:hover {
            transform: translateY(-3px);
            background: #edf4ff;
        }

        /* FOOTER */

        footer {
            background: #0c1d38;
            color: white;
            padding: 55px 0 22px;
        }

        .footer-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr;
            gap: 50px;
            padding-bottom: 40px;
        }

        .footer-brand {
            color: white;
            font-family: 'Manrope', sans-serif;
            font-weight: 800;
            font-size: 19px;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 17px;
        }

        .footer-description {
            color: #9baac0;
            font-size: 12px;
            line-height: 1.9;
            max-width: 320px;
        }

        .footer-column h4 {
            font-size: 13px;
            font-weight: 800;
            margin-bottom: 17px;
        }

        .footer-column a {
            display: block;
            color: #9baac0;
            font-size: 12px;
            margin-bottom: 12px;
            transition: .2s;
        }

        .footer-column a:hover {
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255,255,255,.1);
            padding-top: 20px;
            display: flex;
            justify-content: space-between;
            gap: 15px;
            color: #8494ad;
            font-size: 11px;
        }

        /* RESPONSIVE */

        @media (max-width: 900px) {
            .nav-links {
                gap: 16px;
            }

            .hero-grid {
                gap: 30px;
            }

            .floating-card.one {
                left: -10px;
            }

            .floating-card.two {
                right: -10px;
            }

            .language-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .about-grid {
                gap: 35px;
            }
        }

        @media (max-width: 700px) {
            .nav-content {
                min-height: 68px;
            }

            .menu-toggle {
                display: block;
            }

            .nav-links {
                display: none;
                position: absolute;
                top: 68px;
                left: 0;
                right: 0;
                background: white;
                padding: 20px 5%;
                flex-direction: column;
                align-items: flex-start;
                gap: 20px;
                border-bottom: 1px solid #edf0f5;
                box-shadow: 0 12px 20px rgba(0,0,0,.05);
            }

            .nav-links.active {
                display: flex;
            }

            .nav-actions {
                gap: 5px;
            }

            .btn-login {
                padding: 9px;
                font-size: 12px;
            }

            .btn-register {
                padding: 10px 12px;
                font-size: 11px;
            }

            .brand {
                font-size: 15px;
            }

            .brand-icon {
                width: 37px;
                height: 37px;
                font-size: 18px;
            }

            .brand small {
                font-size: 8px;
            }

            .hero {
                padding: 70px 0 65px;
            }

            .hero-grid {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .hero h1 {
                font-size: 39px;
            }

            .hero-description {
                font-size: 14px;
            }

            .hero-visual {
                min-height: 350px;
                margin: 0 10px;
            }

            .visual-main {
                min-height: 320px;
                padding: 27px;
            }

            .floating-card.one {
                top: 10px;
                left: -5px;
            }

            .floating-card.two {
                bottom: 10px;
                right: -5px;
            }

            section {
                padding: 65px 0;
            }

            .about-grid {
                grid-template-columns: 1fr;
            }

            .about-panel {
                min-height: 300px;
            }

            .about-content h2 {
                font-size: 28px;
            }

            .system-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 30px;
            }

            .footer-grid > div:first-child {
                grid-column: 1 / -1;
            }

            .footer-bottom {
                flex-direction: column;
                text-align: center;
            }
        }

        @media (max-width: 430px) {
            .nav-actions .btn-register {
                display: none;
            }

            .hero h1 {
                font-size: 34px;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .hero-buttons a {
                justify-content: center;
            }

            .language-grid,
            .system-grid {
                grid-template-columns: 1fr;
            }

            .visual-title h2 {
                font-size: 26px;
            }

            .floating-card {
                padding: 10px;
            }

            .floating-card strong {
                font-size: 10px;
            }

            .floating-card small {
                font-size: 9px;
            }

            .footer-grid {
                grid-template-columns: 1fr;
            }

            .footer-grid > div:first-child {
                grid-column: auto;
            }
        }
    </style>
</head>

<body>

    {{-- NAVBAR --}}
    <header class="navbar">
        <div class="container-custom nav-content">

            <a href="#inicio" class="brand">
                <div class="brand-icon">
                    <i class="bi bi-globe2"></i>
                </div>

                <div>
                    ESCUELA DE IDIOMAS
                    <small>APRENDE SIN FRONTERAS</small>
                </div>
            </a>

            <nav class="nav-links" id="navLinks">
                <a href="#inicio">Inicio</a>
                <a href="#nosotros">Nosotros</a>
                <a href="#idiomas">Programas</a>
                <a href="#servicios">Servicios</a>
            </nav>

            <div class="nav-actions">
                @if (Route::has('login'))
                    <a href="{{ route('login') }}" class="btn-login">
                        Iniciar sesión
                    </a>
                @endif

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn-register">
                        Registrarse <i class="bi bi-arrow-right"></i>
                    </a>
                @endif
            </div>

            <button class="menu-toggle" id="menuToggle" aria-label="Abrir menú">
                <i class="bi bi-list"></i>
            </button>

        </div>
    </header>


    {{-- HERO --}}
    <main>
        <section class="hero" id="inicio">
            <div class="container-custom hero-grid">

                <div class="hero-content">

                    <span class="hero-label">
                        <i class="bi bi-stars"></i>
                        BIENVENIDO A NUESTRA ESCUELA
                    </span>

                    <h1>
                        Un nuevo idioma.
                        <span>Un mundo de oportunidades.</span>
                    </h1>

                    <p class="hero-description">
                        Aprende nuevos idiomas, descubre otras culturas y
                        prepárate para alcanzar tus metas personales,
                        académicas y profesionales. Tu próxima aventura
                        comienza aquí.
                    </p>

                    <div class="hero-buttons">
                        <a href="{{ route('login') }}" class="btn-primary-custom">
                            Explorar plataforma
                            <i class="bi bi-arrow-right"></i>
                        </a>

                        <a href="#idiomas" class="btn-secondary-custom">
                            <i class="bi bi-book"></i>
                            Conocer programas
                        </a>
                    </div>

                    <div class="hero-note">
                        <i class="bi bi-check-circle-fill"></i>
                        Tu camino hacia nuevas oportunidades empieza hoy.
                    </div>

                </div>


                <div class="hero-visual">

                    <div class="floating-card one">
                        <div class="floating-icon">
                            <i class="bi bi-translate"></i>
                        </div>
                        <div>
                            <strong>Aprende a tu ritmo</strong>
                            <small>Desarrolla nuevas habilidades</small>
                        </div>
                    </div>

                    <div class="visual-main">

                        <div class="visual-top">
                            <span>LEARN. EXPLORE. CONNECT.</span>
                            <i class="bi bi-globe-americas"></i>
                        </div>

                        <div class="visual-title">
                            <h2>El mundo habla muchos idiomas. ¿Cuál aprenderás?</h2>
                            <p>
                                Amplía tus horizontes y conecta con
                                personas de todo el mundo.
                            </p>
                        </div>

                        <div class="language-cloud">
                            <span>🇺🇸 English</span>
                            <span>🇫🇷 Français</span>
                            <span>🇩🇪 Deutsch</span>
                            <span>🇮🇹 Italiano</span>
                            <span>🇵🇹 Português</span>
                        </div>

                        <div class="visual-bottom">
                            <div>
                                <small>EDUCACIÓN QUE TRANSFORMA</small>
                                <strong>Tu futuro comienza aquí</strong>
                            </div>
                            <i class="bi bi-mortarboard-fill"></i>
                        </div>

                    </div>

                    <div class="floating-card two">
                        <div class="floating-icon">
                            <i class="bi bi-award"></i>
                        </div>
                        <div>
                            <strong>Crece profesionalmente</strong>
                            <small>Abre nuevas oportunidades</small>
                        </div>
                    </div>

                </div>

            </div>
        </section>


        {{-- IDIOMAS --}}
        <section class="languages-section" id="idiomas">

            <div class="container-custom">

                <div class="section-heading">
                    <span class="section-tag">Nuestros programas</span>

                    <h2>Explora nuevos idiomas</h2>

                    <p>
                        Descubre nuevas formas de comunicarte y conoce
                        algunas de las posibilidades de aprendizaje
                        que ofrece el mundo de los idiomas.
                    </p>
                </div>

                <div class="language-grid">

                    <div class="language-card">
                        <div class="language-emoji">🇺🇸</div>
                        <h3>Inglés</h3>
                        <p>Conecta con el idioma internacional de los negocios y la tecnología.</p>
                    </div>

                    <div class="language-card">
                        <div class="language-emoji">🇫🇷</div>
                        <h3>Francés</h3>
                        <p>Descubre una lengua llena de cultura, historia y oportunidades.</p>
                    </div>

                    <div class="language-card">
                        <div class="language-emoji">🇩🇪</div>
                        <h3>Alemán</h3>
                        <p>Abre nuevas puertas académicas y profesionales en Europa.</p>
                    </div>

                    <div class="language-card">
                        <div class="language-emoji">🇮🇹</div>
                        <h3>Italiano</h3>
                        <p>Explora la riqueza cultural y lingüística de Italia.</p>
                    </div>

                </div>

            </div>
        </section>


        {{-- NOSOTROS --}}
        <section class="about-section" id="nosotros">

            <div class="container-custom about-grid">

                <div class="about-panel">

                    <small>NUESTRA FILOSOFÍA</small>

                    <h3>Aprender un idioma es descubrir una nueva manera de ver el mundo.</h3>

                    <p>
                        Creemos que la educación y la comunicación
                        son herramientas fundamentales para construir
                        un futuro con más posibilidades.
                    </p>

                </div>


                <div class="about-content">

                    <span class="section-tag">Conócenos</span>

                    <h2>Más que aprender palabras, construimos oportunidades.</h2>

                    <p>
                        Nuestra Escuela de Idiomas busca brindar una
                        experiencia educativa organizada, accesible
                        y orientada al desarrollo de competencias
                        lingüísticas.
                    </p>

                    <div class="benefit-list">

                        <div class="benefit">
                            <i class="bi bi-mortarboard"></i>
                            <div>
                                <strong>Formación académica</strong>
                                <span>Programas organizados por niveles y cursos.</span>
                            </div>
                        </div>

                        <div class="benefit">
                            <i class="bi bi-people"></i>
                            <div>
                                <strong>Acompañamiento educativo</strong>
                                <span>Profesores y grupos para una experiencia de aprendizaje organizada.</span>
                            </div>
                        </div>

                        <div class="benefit">
                            <i class="bi bi-laptop"></i>
                            <div>
                                <strong>Gestión digital</strong>
                                <span>Una plataforma que facilita la administración académica.</span>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </section>


        {{-- SERVICIOS DEL SISTEMA --}}
        <section class="system-section" id="servicios">

            <div class="container-custom">

                <div class="section-heading">
                    <span class="section-tag">Nuestra plataforma</span>

                    <h2>Todo organizado en un solo lugar</h2>

                    <p>
                        Conoce algunas de las funcionalidades que forman
                        parte de nuestro sistema de gestión académica.
                    </p>
                </div>

                <div class="system-grid">

                    <div class="system-card">
                        <div class="system-icon">
                            <i class="bi bi-person-vcard"></i>
                        </div>
                        <h3>Gestión de alumnos</h3>
                        <p>Organización de la información y los datos de los estudiantes.</p>
                    </div>

                    <div class="system-card">
                        <div class="system-icon">
                            <i class="bi bi-person-workspace"></i>
                        </div>
                        <h3>Gestión de profesores</h3>
                        <p>Administración de docentes y sus especialidades académicas.</p>
                    </div>

                    <div class="system-card">
                        <div class="system-icon">
                            <i class="bi bi-journal-bookmark"></i>
                        </div>
                        <h3>Cursos y grupos</h3>
                        <p>Organización de cursos, niveles, grupos y horarios.</p>
                    </div>

                    <div class="system-card">
                        <div class="system-icon">
                            <i class="bi bi-clipboard-check"></i>
                        </div>
                        <h3>Control de asistencias</h3>
                        <p>Seguimiento de la asistencia de los alumnos matriculados.</p>
                    </div>

                    <div class="system-card">
                        <div class="system-icon">
                            <i class="bi bi-credit-card"></i>
                        </div>
                        <h3>Gestión de pagos</h3>
                        <p>Registro y consulta de los pagos relacionados con las matrículas.</p>
                    </div>

                    <div class="system-card">
                        <div class="system-icon">
                            <i class="bi bi-file-earmark-bar-graph"></i>
                        </div>
                        <h3>Reportes académicos</h3>
                        <p>Consulta de información para facilitar el control administrativo.</p>
                    </div>

                </div>

            </div>
        </section>


        {{-- CTA --}}
        <section class="cta-section">

            <div class="container-custom">

                <div class="cta-box">

                    <h2>¡Tu próxima aventura comienza con un idioma!</h2>

                    <p>
                        Accede a nuestra plataforma y descubre
                        todo lo que puedes hacer.
                    </p>

                    <a href="{{ route('login') }}" class="btn">
                        Ingresar a la plataforma
                        <i class="bi bi-arrow-right"></i>
                    </a>

                </div>

            </div>
        </section>

    </main>


    {{-- FOOTER --}}
    <footer>

        <div class="container-custom">

            <div class="footer-grid">

                <div>
                    <div class="footer-brand">
                        <i class="bi bi-globe2"></i>
                        Escuela de Idiomas
                    </div>

                    <p class="footer-description">
                        Una plataforma orientada a la gestión académica
                        y al aprendizaje de idiomas. Conectando personas
                        con nuevas oportunidades.
                    </p>
                </div>


                <div class="footer-column">
                    <h4>Navegación</h4>
                    <a href="#inicio">Inicio</a>
                    <a href="#nosotros">Nosotros</a>
                    <a href="#idiomas">Programas</a>
                    <a href="#servicios">Servicios</a>
                </div>


                <div class="footer-column">
                    <h4>Acceso</h4>
                    <a href="{{ route('login') }}">Iniciar sesión</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Crear una cuenta</a>
                    @endif
                </div>

            </div>


            <div class="footer-bottom">
                <span>© {{ date('Y') }} Escuela de Idiomas. Todos los derechos reservados.</span>
                <span>Aprende sin fronteras <i class="bi bi-globe2"></i></span>
            </div>

        </div>

    </footer>


    {{-- MENÚ MÓVIL --}}
    <script>
        const menuToggle = document.getElementById('menuToggle');
        const navLinks = document.getElementById('navLinks');

        menuToggle.addEventListener('click', function () {
            navLinks.classList.toggle('active');

            const icon = menuToggle.querySelector('i');

            if (navLinks.classList.contains('active')) {
                icon.classList.replace('bi-list', 'bi-x-lg');
            } else {
                icon.classList.replace('bi-x-lg', 'bi-list');
            }
        });

        document.querySelectorAll('.nav-links a').forEach(function (link) {
            link.addEventListener('click', function () {
                navLinks.classList.remove('active');

                const icon = menuToggle.querySelector('i');
                icon.classList.replace('bi-x-lg', 'bi-list');
            });
        });
    </script>

</body>
</html>
