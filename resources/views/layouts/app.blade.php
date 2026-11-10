
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Escuela de Idiomas')</title>

    <!-- FUENTES -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- BOOTSTRAP ICONS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- DATATABLES CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.4/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.7/css/responsive.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/3.2.5/css/buttons.bootstrap5.min.css">

    <!-- LARAVEL / BOOTSTRAP -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        :root {
            --primary: #1765e8;
            --primary-dark: #0b2860;
            --sidebar: #071d49;
            --sidebar-light: #103878;
            --body-bg: #f5f8fd;
            --text: #14264b;
            --muted: #75839b;
            --border: #e7edf6;
            --white: #ffffff;
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Nunito', sans-serif;
            background: var(--body-bg);
            color: var(--text);
            overflow-x: hidden;
        }

        a {
            text-decoration: none;
        }

        /* =====================================
           ESTRUCTURA GENERAL
        ===================================== */

        .app-wrapper {
            min-height: 100vh;
        }

        /* =====================================
           BARRA SUPERIOR
        ===================================== */

        .topbar {
            height: 76px;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1050;
            background: rgba(255, 255, 255, .97);
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            padding: 0 25px;
            gap: 22px;
        }

        .brand {
            width: 225px;
            min-width: 225px;
            display: flex;
            align-items: center;
            gap: 12px;
            color: var(--primary-dark);
        }

        .brand-logo {
            width: 52px;
            height: 52px;
            flex-shrink: 0;
            border-radius: 50%;
            background: linear-gradient(145deg, #1765e8, #071d49);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 23px;
            font-weight: 900;
            box-shadow: 0 4px 12px rgba(23, 101, 232, .22);
        }

        .brand-name {
            font-size: 16px;
            font-weight: 900;
            line-height: 1.2;
        }

        .brand-subtitle {
            font-size: 11px;
            color: var(--muted);
            letter-spacing: .5px;
        }

        .topbar-search {
            flex: 1;
            max-width: 590px;
            position: relative;
        }

        .topbar-search i {
            position: absolute;
            left: 17px;
            top: 50%;
            transform: translateY(-50%);
            color: #8092ae;
        }

        .topbar-search input {
            width: 100%;
            height: 43px;
            border: none;
            outline: none;
            border-radius: 30px;
            background: #f2f5fa;
            padding: 0 20px 0 45px;
            font-family: inherit;
        }

        .topbar-search input:focus {
            box-shadow: 0 0 0 3px rgba(23, 101, 232, .12);
        }

        .topbar-right {
            margin-left: auto;
            display: flex;
            align-items: center;
            gap: 22px;
        }

        .notification-button {
            position: relative;
            border: none;
            background: transparent;
            color: #38547e;
            font-size: 22px;
        }

        .notification-dot {
            position: absolute;
            top: -3px;
            right: -5px;
            background: #ef4444;
            width: 9px;
            height: 9px;
            border-radius: 50%;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 10px;
            border-left: 1px solid var(--border);
            padding-left: 20px;
        }

        .user-avatar {
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            background: #e7f1ff;
            color: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .user-name {
            font-size: 13px;
            font-weight: 900;
        }

        .user-role {
            font-size: 11px;
            color: var(--muted);
        }

        /* =====================================
           BOTÓN MÓVIL
        ===================================== */

        .mobile-menu-button {
            display: none;
            border: none;
            background: #edf4ff;
            color: var(--primary);
            border-radius: 10px;
            padding: 9px 12px;
            font-size: 22px;
        }

        /* =====================================
           MENÚ LATERAL
        ===================================== */

        .sidebar {
            position: fixed;
            top: 76px;
            bottom: 0;
            left: 0;
            width: 248px;
            background: linear-gradient(180deg, #071d49, #09285c);
            padding: 18px 13px;
            overflow-y: auto;
            z-index: 1040;
            display: flex;
            flex-direction: column;
            transition: transform .3s ease;
        }

        .sidebar::-webkit-scrollbar {
            width: 5px;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #31568d;
            border-radius: 10px;
        }

        .sidebar-label {
            color: #91acd3;
            font-size: 12px;
            font-weight: 800;
            padding: 20px 10px 9px;
            text-transform: uppercase;
            letter-spacing: .7px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 13px;
            color: #e4edff;
            padding: 11px 13px;
            border-radius: 10px;
            margin-bottom: 4px;
            font-size: 14px;
            font-weight: 700;
            transition: .2s;
        }

        .sidebar-link i {
            font-size: 17px;
            width: 21px;
            text-align: center;
        }

        .sidebar-link:hover {
            background: rgba(255, 255, 255, .11);
            color: white;
            transform: translateX(3px);
        }

        .sidebar-link.active {
            background: linear-gradient(100deg, #1765e8, #10469d);
            color: white;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .13);
        }

        .sidebar-decoration {
            margin-top: auto;
            background: rgba(23, 101, 232, .17);
            border-radius: 17px;
            padding: 19px 15px;
            color: white;
            text-align: left;
        }

        .sidebar-decoration .decoration-icon {
            font-size: 35px;
            margin-bottom: 8px;
        }

        .sidebar-decoration h6 {
            font-size: 16px;
            font-weight: 900;
        }

        .sidebar-decoration p {
            color: #b9d1f5;
            font-size: 12px;
            margin: 0;
        }

        /* =====================================
           CONTENIDO PRINCIPAL
        ===================================== */

        .main-container {
            margin-left: 248px;
            padding-top: 76px;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .main-content {
            flex: 1;
            padding: 25px;
            min-width: 0;
        }

        /* =====================================
           TARJETAS Y FORMULARIOS
        ===================================== */

        .card {
            border: 1px solid var(--border);
            border-radius: 14px;
            box-shadow: 0 4px 18px rgba(20, 45, 90, .035);
        }

        .form-control,
        .form-select {
            border: 1px solid #dce5f1;
            border-radius: 9px;
            padding: 10px 12px;
            font-family: inherit;
            min-height: 42px;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(23, 101, 232, .12);
        }

        textarea.form-control {
            min-height: auto;
        }

        .btn {
            border-radius: 9px;
            font-weight: 700;
        }

        .btn-primary {
            background: var(--primary);
            border-color: var(--primary);
        }

        .table {
            vertical-align: middle;
        }

        .table thead th {
            background: #f3f6fb;
            color: #344b70;
            font-size: 13px;
            font-weight: 800;
            white-space: nowrap;
        }

        .table tbody td {
            font-size: 13px;
        }

        .table-responsive {
            border-radius: 10px;
        }

        .invalid-feedback {
            font-size: 12px;
        }

        /* =====================================
           DATATABLES
        ===================================== */

        .dt-container {
            width: 100%;
            font-family: 'Nunito', sans-serif;
            color: var(--text);
            font-size: 13px;
        }

        .dt-container .dt-layout-row {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin: 15px 0;
        }

        .dt-container .dt-search input,
        .dt-container .dt-length select {
            border: 1px solid #dce5f1;
            border-radius: 9px;
            padding: 8px 12px;
            outline: none;
            font-family: inherit;
            background: white;
        }

        .dt-container .dt-search input:focus,
        .dt-container .dt-length select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(23, 101, 232, .12);
        }

        .dt-container .dt-search label,
        .dt-container .dt-length label {
            color: #718096;
            font-weight: 700;
        }

        .dt-container .dt-info {
            color: #8492a6;
            font-size: 12px;
        }

        /* PAGINACIÓN CORREGIDA */

        .dt-container .dt-paging {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex-wrap: wrap;
            gap: 3px;
        }

        .dt-container .dt-paging .dt-paging-button {
            display: inline-flex !important;
            align-items: center !important;
            justify-content: center !important;
            min-width: 34px !important;
            width: auto !important;
            height: 34px !important;
            padding: 5px 10px !important;
            margin: 0 !important;
            border: none !important;
            border-radius: 8px !important;
            font-family: 'Nunito', sans-serif !important;
            font-size: 12px !important;
            line-height: 1 !important;
            font-weight: 700 !important;
            box-shadow: none !important;
            transform: none !important;
        }

        .dt-container .dt-paging .dt-paging-button.current {
            background: var(--primary) !important;
            color: white !important;
        }

        .dt-container .dt-paging .dt-paging-button:hover:not(.current):not(.disabled) {
            background: #e7f1ff !important;
            color: var(--primary) !important;
        }

        .dt-container .dt-paging .dt-paging-button.disabled {
            opacity: .4;
            cursor: not-allowed;
        }

        .dt-container .dt-paging .dt-paging-button span {
            display: inline-block !important;
            font-size: 12px !important;
            line-height: 1 !important;
            width: auto !important;
            height: auto !important;
            padding: 0 !important;
            margin: 0 !important;
        }

        .dt-container .dt-paging .ellipsis {
            font-size: 12px !important;
        }

        /* BOTONES DE EXPORTACIÓN */

        .dt-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
        }

        .dt-buttons .btn {
            font-size: 12px;
            padding: 7px 11px;
            border-radius: 8px !important;
        }

        .dt-buttons .buttons-excel {
            background: #16865b;
            color: white;
            border-color: #16865b;
        }

        .dt-buttons .buttons-csv {
            background: #2878bd;
            color: white;
            border-color: #2878bd;
        }

        .dt-buttons .buttons-pdf {
            background: #dc4545;
            color: white;
            border-color: #dc4545;
        }

        .dt-buttons .buttons-print {
            background: #596579;
            color: white;
            border-color: #596579;
        }

        .dt-buttons .btn:hover {
            filter: brightness(.92);
            color: white;
        }

        table.dataTable {
            width: 100% !important;
        }

        table.dataTable thead th {
            white-space: nowrap;
        }

        /* =====================================
           PIE DE PÁGINA
        ===================================== */

        .footer {
            position: relative;
            background: linear-gradient(110deg, #071d49, #103878);
            color: #dce8fa;
            padding: 25px 30px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 20px;
            overflow: hidden;
        }

        .footer::before {
            content: "";
            position: absolute;
            width: 220px;
            height: 220px;
            border: 35px solid rgba(255, 255, 255, .035);
            border-radius: 50%;
            right: 12%;
            top: -130px;
        }

        .footer-left,
        .footer-center,
        .footer-right {
            position: relative;
            z-index: 1;
        }

        .footer-brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .footer-logo {
            width: 43px;
            height: 43px;
            flex-shrink: 0;
            background: linear-gradient(145deg, #3988ff, #1765e8);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 17px;
            font-weight: 900;
            box-shadow: 0 4px 12px rgba(0, 0, 0, .2);
        }

        .footer-brand h6 {
            font-size: 14px;
            font-weight: 900;
            margin: 0;
            color: white;
        }

        .footer-brand span {
            font-size: 11px;
            color: #a9c4ec;
        }

        .footer-center {
            text-align: center;
        }

        .footer-course {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 15px;
            border: 1px solid rgba(255, 255, 255, .16);
            background: rgba(255, 255, 255, .08);
            border-radius: 30px;
            color: #eaf2ff;
            font-size: 12px;
            font-weight: 800;
            letter-spacing: .3px;
        }

        .footer-course i {
            color: #69a8ff;
            font-size: 16px;
        }

        .footer-right {
            text-align: right;
            font-size: 11px;
            color: #a9c4ec;
        }

        .footer-right p {
            margin: 0 0 5px;
        }

        .footer-right strong {
            color: white;
        }

        .footer-heart {
            color: #ff667a;
            margin: 0 3px;
        }

        /* =====================================
           FONDO MÓVIL
        ===================================== */

        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 76px 0 0;
            background: rgba(4, 18, 43, .55);
            z-index: 1030;
        }

        /* =====================================
           TABLETS
        ===================================== */

        @media (max-width: 1100px) {
            .sidebar {
                width: 225px;
            }

            .main-container {
                margin-left: 225px;
            }

            .brand {
                width: 200px;
                min-width: 200px;
            }

            .main-content {
                padding: 20px;
            }
        }

        /* =====================================
           CELULARES
        ===================================== */

        @media (max-width: 768px) {
            .topbar {
                height: 68px;
                padding: 0 13px;
                gap: 12px;
            }

            .mobile-menu-button {
                display: block;
            }

            .brand {
                width: auto;
                min-width: 0;
            }

            .brand-logo {
                width: 42px;
                height: 42px;
                font-size: 19px;
            }

            .brand-name {
                font-size: 13px;
            }

            .brand-subtitle {
                font-size: 10px;
            }

            .topbar-search {
                display: none;
            }

            .topbar-right {
                gap: 12px;
            }

            .user-menu {
                padding-left: 10px;
                gap: 6px;
            }

            .user-avatar {
                width: 36px;
                height: 36px;
            }

            .user-info {
                display: none;
            }

            .sidebar {
                top: 68px;
                width: 265px;
                transform: translateX(-100%);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .sidebar-overlay {
                inset: 68px 0 0;
            }

            .sidebar-overlay.show {
                display: block;
            }

            .main-container {
                margin-left: 0;
                padding-top: 68px;
            }

            .main-content {
                padding: 15px;
            }

            .footer {
                flex-direction: column;
                text-align: center;
                padding: 25px 15px;
                gap: 17px;
            }

            .footer-brand {
                justify-content: center;
            }

            .footer-right {
                text-align: center;
            }
        }

        /* =====================================
           DATATABLES EN CELULARES
        ===================================== */

        @media (max-width: 576px) {
            .dt-container .dt-layout-row {
                align-items: stretch;
                flex-direction: column;
            }

            .dt-container .dt-search {
                width: 100%;
            }

            .dt-container .dt-search input {
                width: 100%;
                margin-left: 0 !important;
            }

            .dt-buttons {
                width: 100%;
            }

            .dt-buttons .btn {
                flex: 1;
            }

            .dt-container .dt-paging {
                justify-content: center;
                overflow-x: auto;
                max-width: 100%;
            }
        }

        /* =====================================
           CELULARES PEQUEÑOS
        ===================================== */

        @media (max-width: 380px) {
            .brand-name {
                font-size: 12px;
            }

            .brand-subtitle {
                display: none;
            }

            .topbar {
                gap: 8px;
            }
        }
    </style>

    @stack('styles')
</head>

<body>

<div class="app-wrapper">

    <!-- BARRA SUPERIOR -->
    <header class="topbar">

        <button class="mobile-menu-button" id="mobileMenuButton"
            type="button" aria-label="Abrir menú">
            <i class="bi bi-list"></i>
        </button>

        <a href="{{ auth()->check() ? route('home') : url('/') }}" class="brand">
            <div class="brand-logo">EI</div>

            <div>
                <div class="brand-name">Escuela de Idiomas</div>
                <div class="brand-subtitle">Learning Center</div>
            </div>
        </a>

        <div class="topbar-search">
            <i class="bi bi-search"></i>
            <input type="text" placeholder="Buscar..." aria-label="Buscar">
        </div>

        <div class="topbar-right">

            @auth
                <button class="notification-button" type="button" title="Notificaciones">
                    <i class="bi bi-bell"></i>
                    <span class="notification-dot"></span>
                </button>

                <div class="dropdown user-menu">

                    <a href="#" class="dropdown-toggle d-flex align-items-center gap-2 text-decoration-none"
                        id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">

                        <div class="user-avatar">
                            <i class="bi bi-person-fill"></i>
                        </div>

                        <div class="user-info">
                            <div class="user-name">{{ Auth::user()->name }}</div>
                            <div class="user-role">Administrador</div>
                        </div>
                    </a>

                    <ul class="dropdown-menu dropdown-menu-end shadow border-0"
                        aria-labelledby="userDropdown">

                        <li>
                            <span class="dropdown-item-text fw-bold">
                                {{ Auth::user()->name }}
                            </span>
                        </li>

                        <li><hr class="dropdown-divider"></li>

                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="bi bi-box-arrow-right me-2"></i>
                                Cerrar sesión
                            </a>
                        </li>
                    </ul>
                </div>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-primary btn-sm">
                    Iniciar sesión
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-outline-primary btn-sm">
                        Registrarse
                    </a>
                @endif
            @endauth

        </div>
    </header>

    @auth
        <!-- MENÚ LATERAL -->
        <aside class="sidebar" id="sidebar">

            <div class="sidebar-label">Principal</div>

            <a href="{{ route('home') }}"
                class="sidebar-link {{ request()->routeIs('home') ? 'active' : '' }}">
                <i class="bi bi-house-door-fill"></i>
                Inicio
            </a>

            <div class="sidebar-label">Gestión académica</div>

            <a href="{{ route('alumnos.index') }}"
                class="sidebar-link {{ request()->routeIs('alumnos.*') ? 'active' : '' }}">
                <i class="bi bi-people-fill"></i>
                Alumnos
            </a>

            <a href="{{ route('profesores.index') }}"
                class="sidebar-link {{ request()->routeIs('profesores.*') ? 'active' : '' }}">
                <i class="bi bi-person-workspace"></i>
                Profesores
            </a>

            <a href="{{ route('idiomas.index') }}"
                class="sidebar-link {{ request()->routeIs('idiomas.*') ? 'active' : '' }}">
                <i class="bi bi-globe-americas"></i>
                Idiomas
            </a>

            <a href="{{ route('cursos.index') }}"
                class="sidebar-link {{ request()->routeIs('cursos.*') ? 'active' : '' }}">
                <i class="bi bi-book-half"></i>
                Cursos
            </a>

            <a href="{{ route('grupos.index') }}"
                class="sidebar-link {{ request()->routeIs('grupos.*') ? 'active' : '' }}">
                <i class="bi bi-people"></i>
                Grupos
            </a>

            <div class="sidebar-label">Administración</div>

            <a href="{{ route('matriculas.index') }}"
                class="sidebar-link {{ request()->routeIs('matriculas.*') ? 'active' : '' }}">
                <i class="bi bi-journal-check"></i>
                Matrículas
            </a>

            <a href="{{ route('pagos.index') }}"
                class="sidebar-link {{ request()->routeIs('pagos.*') ? 'active' : '' }}">
                <i class="bi bi-credit-card"></i>
                Pagos
            </a>

            <a href="{{ route('asistencias.index') }}"
                class="sidebar-link {{ request()->routeIs('asistencias.*') ? 'active' : '' }}">
                <i class="bi bi-calendar2-check"></i>
                Asistencias
            </a>

            <div class="sidebar-decoration">
                <div class="decoration-icon">🌎📚</div>
                <h6>¡Aprender abre puertas!</h6>
                <p>Cada idioma es una nueva oportunidad para descubrir el mundo.</p>
            </div>

        </aside>

        <div class="sidebar-overlay" id="sidebarOverlay"></div>
    @endauth

    <!-- CONTENIDO PRINCIPAL -->
    <div class="main-container">

        <main class="main-content">
            @yield('content')
        </main>

        <!-- PIE DE PÁGINA -->
        <footer class="footer">

            <div class="footer-left">
                <div class="footer-brand">
                    <div class="footer-logo">EI</div>

                    <div>
                        <h6>Escuela de Idiomas</h6>
                        <span>Learning Center · Educación sin fronteras</span>
                    </div>
                </div>
            </div>

            <div class="footer-center">
                <div class="footer-course">
                    <i class="bi bi-code-slash"></i>
                    <span>Curso: Backend Developer Web</span>
                </div>
            </div>

            <div class="footer-right">
                <p>
                    © {{ date('Y') }} <strong>Escuela de Idiomas</strong>
                </p>

                <span>
                    Desarrollado con
                    <i class="bi bi-heart-fill footer-heart"></i>
                    pasión por la tecnología.
                </span>
            </div>

        </footer>

    </div>
</div>

<!-- JQUERY -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<!-- DATATABLES -->
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.min.js"></script>
<script src="https://cdn.datatables.net/2.3.4/js/dataTables.bootstrap5.min.js"></script>

<!-- RESPONSIVE -->
<script src="https://cdn.datatables.net/responsive/3.0.7/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/3.0.7/js/responsive.bootstrap5.min.js"></script>

<!-- BOTONES -->
<script src="https://cdn.datatables.net/buttons/3.2.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.5/js/buttons.bootstrap5.min.js"></script>

<!-- EXPORTACIONES -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script src="https://cdn.datatables.net/buttons/3.2.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.2.5/js/buttons.print.min.js"></script>

<!-- CONFIGURACIÓN GLOBAL DATATABLES -->
<script>
    document.addEventListener('DOMContentLoaded', function () {

        if (typeof $ === 'undefined' || !$.fn.DataTable) {
            return;
        }

        document.querySelectorAll('table.datatable').forEach(function (tabla) {

            if ($.fn.DataTable.isDataTable(tabla)) {
                return;
            }

            $(tabla).DataTable({
                responsive: true,
                pageLength: 10,

                lengthMenu: [
                    [5, 10, 25, 50, 100, -1],
                    [5, 10, 25, 50, 100, "Todos"]
                ],

                order: [],

                language: {
                    decimal: "",
                    emptyTable: "No hay información disponible",
                    info: "Mostrando _START_ a _END_ de _TOTAL_ registros",
                    infoEmpty: "Mostrando 0 a 0 de 0 registros",
                    infoFiltered: "(filtrado de _MAX_ registros totales)",
                    lengthMenu: "Mostrar _MENU_ registros",
                    loadingRecords: "Cargando...",
                    processing: "Procesando...",
                    search: "Buscar:",
                    zeroRecords: "No se encontraron resultados",
                    paginate: {
                        first: "Primero",
                        last: "Último",
                        next: "Siguiente",
                        previous: "Anterior"
                    }
                },

                layout: {
                    topStart: {
                        buttons: [
                            {
                                extend: 'excelHtml5',
                                text: '<i class="bi bi-file-earmark-excel"></i> Excel',
                                title: 'Escuela de Idiomas'
                            },
                            {
                                extend: 'csvHtml5',
                                text: '<i class="bi bi-filetype-csv"></i> CSV',
                                title: 'Escuela de Idiomas'
                            },
                            {
                                extend: 'pdfHtml5',
                                text: '<i class="bi bi-file-earmark-pdf"></i> PDF',
                                title: 'Escuela de Idiomas',
                                orientation: 'landscape',
                                pageSize: 'A4'
                            },
                            {
                                extend: 'print',
                                text: '<i class="bi bi-printer"></i> Imprimir',
                                title: 'Escuela de Idiomas'
                            }
                        ]
                    },

                    topEnd: 'search',
                    bottomStart: ['info', 'pageLength'],
                    bottomEnd: 'paging'
                }
            });
        });
    });
</script>

<!-- MENÚ RESPONSIVE -->
<script>
    document.addEventListener('DOMContentLoaded', function () {

        const menuButton = document.getElementById('mobileMenuButton');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebarOverlay');

        if (!menuButton || !sidebar || !overlay) {
            return;
        }

        function closeMenu() {
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
        }

        menuButton.addEventListener('click', function () {
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
        });

        overlay.addEventListener('click', closeMenu);

        sidebar.querySelectorAll('a').forEach(function (link) {
            link.addEventListener('click', closeMenu);
        });

        document.addEventListener('keydown', function (event) {
            if (event.key === 'Escape') {
                closeMenu();
            }
        });
    });
</script>

<!-- SCRIPTS ADICIONALES DE CADA VISTA -->
@stack('scripts')

</body>
</html>
