
@extends('layouts.app')

@section('content')

<style>
    .dashboard {
        padding: 20px 0 45px;
        color: #172b4d;
    }

    /* BANNER */
    .hero {
        position: relative;
        min-height: 245px;
        display: flex;
        align-items: center;
        overflow: hidden;
        border-radius: 23px;
        padding: 35px;
        color: white;
        background: linear-gradient(120deg, #082c67, #1265bd, #438ee8);
        box-shadow: 0 15px 35px rgba(15, 67, 140, .15);
    }

    .hero::before {
        content: "";
        position: absolute;
        width: 350px;
        height: 350px;
        border-radius: 50%;
        background: rgba(255,255,255,.07);
        right: 7%;
        top: -190px;
    }

    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 590px;
    }

    .hero-tag {
        display: inline-block;
        padding: 8px 15px;
        border-radius: 30px;
        background: rgba(255,255,255,.16);
        border: 1px solid rgba(255,255,255,.25);
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 1px;
        margin-bottom: 16px;
    }

    .hero h1 {
        font-size: clamp(26px, 4vw, 39px);
        font-weight: 800;
        margin-bottom: 12px;
    }

    .hero p {
        color: rgba(255,255,255,.9);
        font-size: 14px;
        line-height: 1.7;
        margin-bottom: 20px;
    }

    .hero-button {
        display: inline-block;
        background: white;
        color: #0755ad;
        padding: 11px 21px;
        border-radius: 11px;
        font-weight: 800;
        text-decoration: none;
        transition: .25s;
    }

    .hero-button:hover {
        background: #e7f1ff;
        color: #073e80;
        transform: translateY(-3px);
    }

    .hero-decoration {
        position: absolute;
        right: 8%;
        top: 50%;
        transform: translateY(-50%);
        width: 260px;
        height: 210px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .hero-globe {
        width: 160px;
        height: 160px;
        border-radius: 50%;
        background: rgba(255,255,255,.14);
        border: 1px solid rgba(255,255,255,.3);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 85px;
        box-shadow: 0 15px 40px rgba(0,0,0,.12);
    }

    .hero-float {
        position: absolute;
        padding: 10px 14px;
        border-radius: 12px;
        background: white;
        color: #173d73;
        font-weight: 800;
        font-size: 13px;
        box-shadow: 0 8px 25px rgba(0,0,0,.13);
    }

    .float-one { top: 5px; left: 0; transform: rotate(-7deg); }
    .float-two { right: 0; top: 70px; transform: rotate(6deg); }
    .float-three { bottom: 0; left: 35px; transform: rotate(-4deg); }

    /* TITULOS */
    .section-heading {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        margin: 32px 0 17px;
    }

    .section-heading h2 {
        font-size: 20px;
        font-weight: 800;
        margin: 0 0 4px;
    }

    .section-heading p {
        font-size: 13px;
        color: #8996a9;
        margin: 0;
    }

    .section-link {
        color: #1265bd;
        font-size: 13px;
        font-weight: 700;
        text-decoration: none;
        white-space: nowrap;
    }

    .section-link:hover { color: #082c67; }

    /* ESTADISTICAS */
    .stat-card {
        position: relative;
        height: 100%;
        padding: 21px;
        border-radius: 18px;
        background: white;
        border: 1px solid #edf1f7;
        box-shadow: 0 6px 22px rgba(20,50,90,.035);
        transition: .25s;
        overflow: hidden;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 13px 28px rgba(20,50,90,.09);
    }

    .stat-top {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        margin-bottom: 17px;
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 23px;
    }

    .stat-label {
        color: #8290a5;
        font-size: 13px;
        font-weight: 600;
    }

    .stat-number {
        font-size: 29px;
        font-weight: 800;
        color: #193452;
        line-height: 1.2;
    }

    .stat-description {
        font-size: 11px;
        color: #98a4b5;
        margin-top: 7px;
    }

    .stat-blue .stat-icon { background: #e7f0ff; color: #2470d3; }
    .stat-green .stat-icon { background: #e2f8ee; color: #1ba477; }
    .stat-purple .stat-icon { background: #f0eaff; color: #8055d6; }
    .stat-orange .stat-icon { background: #fff0df; color: #e78a32; }

    /* PANELES */
    .panel {
        height: 100%;
        padding: 22px;
        background: white;
        border: 1px solid #edf1f7;
        border-radius: 19px;
        box-shadow: 0 6px 22px rgba(20,50,90,.035);
    }

    .panel-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        gap: 10px;
        margin-bottom: 20px;
    }

    .panel-header h3 {
        font-size: 16px;
        font-weight: 800;
        margin: 0 0 5px;
    }

    .panel-header p {
        font-size: 12px;
        color: #94a0b1;
        margin: 0;
    }

    .panel-badge {
        background: #edf4ff;
        color: #246bc1;
        border-radius: 9px;
        padding: 7px 10px;
        font-size: 11px;
        font-weight: 700;
        white-space: nowrap;
    }

    .chart-container {
        position: relative;
        width: 100%;
        height: 260px;
    }

    .chart-container.doughnut {
        height: 260px;
        max-width: 360px;
        margin: auto;
    }

    .empty-chart {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        color: #98a4b5;
        font-size: 13px;
        text-align: center;
    }

    /* TABLA DE ALUMNOS */
    .students-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 490px;
    }

    .students-table thead th {
        background: #f7f9fc;
        color: #8794a7;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .5px;
        padding: 13px 12px;
        font-weight: 800;
        border-bottom: 1px solid #edf1f7;
    }

    .students-table tbody td {
        padding: 14px 12px;
        border-bottom: 1px solid #f0f2f6;
        font-size: 12px;
        color: #52647c;
        vertical-align: middle;
    }

    .students-table tbody tr:last-child td {
        border-bottom: none;
    }

    .student-info {
        display: flex;
        align-items: center;
        gap: 10px;
        min-width: 155px;
    }

    .student-avatar {
        width: 37px;
        height: 37px;
        flex-shrink: 0;
        border-radius: 12px;
        background: #e8f1ff;
        color: #246bc1;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-weight: 800;
    }

    .student-name {
        font-size: 12px;
        color: #263d5b;
        font-weight: 800;
    }

    .student-email {
        font-size: 10px;
        color: #9aa5b4;
        margin-top: 3px;
    }

    .date-badge {
        display: inline-block;
        padding: 6px 9px;
        border-radius: 8px;
        background: #f0f6ff;
        color: #3974b8;
        font-size: 10px;
        font-weight: 700;
        white-space: nowrap;
    }

    .empty-table {
        text-align: center;
        padding: 35px 15px !important;
        color: #98a4b5 !important;
    }

    /* ACCIONES RAPIDAS */
    .quick-link {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 12px;
        padding: 12px;
        border: 1px solid #edf1f7;
        border-radius: 12px;
        color: #29415f;
        text-decoration: none;
        margin-top: 10px;
        transition: .2s;
        font-size: 13px;
        font-weight: 700;
    }

    .quick-link:hover {
        background: #f0f6ff;
        color: #0755ad;
        border-color: #c9ddfa;
        transform: translateX(3px);
    }

    .quick-left {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .quick-icon {
        width: 36px;
        height: 36px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 10px;
        background: #e8f1ff;
        font-size: 17px;
    }

    /* MODULOS */
    .module-card {
        display: block;
        height: 100%;
        min-height: 150px;
        padding: 20px;
        border-radius: 17px;
        text-decoration: none;
        transition: .25s;
        border: 1px solid rgba(255,255,255,.8);
    }

    .module-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 25px rgba(31,54,100,.1);
    }

    .module-icon {
        width: 43px;
        height: 43px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 13px;
        background: rgba(255,255,255,.85);
        font-size: 22px;
        margin-bottom: 13px;
    }

    .module-card h3 {
        font-size: 15px;
        font-weight: 800;
        color: #183153;
        margin-bottom: 5px;
    }

    .module-card p {
        font-size: 11px;
        color: #52647c;
        margin: 0;
        line-height: 1.5;
    }

    .blue { background: linear-gradient(135deg,#c8ddff,#eaf2ff); }
    .green { background: linear-gradient(135deg,#b8f2e5,#e2fff6); }
    .purple { background: linear-gradient(135deg,#ddcaff,#f2eaff); }
    .orange { background: linear-gradient(135deg,#ffdfb5,#fff1dd); }
    .pink { background: linear-gradient(135deg,#ffc9dc,#ffedf3); }
    .cyan { background: linear-gradient(135deg,#b9eff7,#e5fbff); }
    .indigo { background: linear-gradient(135deg,#c8d4ff,#edf0ff); }
    .violet { background: linear-gradient(135deg,#edc9ff,#f9eaff); }

    /* FRASE */
    .quote-panel {
        height: 100%;
        min-height: 200px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 25px;
        color: white;
        border-radius: 19px;
        text-align: center;
        background: linear-gradient(145deg,#5134a5,#246ac2,#25a5bd);
    }

    .quote-icon { font-size: 34px; margin-bottom: 12px; }

    .quote-panel h3 {
        font-size: 18px;
        font-weight: 800;
        line-height: 1.4;
    }

    .quote-panel p {
        color: rgba(255,255,255,.85);
        font-size: 12px;
        margin: 8px 0 0;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .hero { min-height: 250px; padding: 27px; }
        .hero-decoration { right: -80px; opacity: .2; }
        .hero h1 { font-size: 28px; }
        .chart-container { height: 230px; }
        .panel { padding: 18px; }
    }

    @media (max-width: 576px) {
        .dashboard { padding-top: 10px; }
        .hero { min-height: 260px; padding: 22px; border-radius: 17px; }
        .hero h1 { font-size: 24px; }
        .hero p { font-size: 12px; }
        .hero-decoration { right: -115px; opacity: .12; }
        .section-heading { align-items: flex-start; flex-direction: column; }
        .stat-card { padding: 16px; }
        .stat-number { font-size: 25px; }
        .panel { padding: 15px; }
        .chart-container { height: 210px; }
        .chart-container.doughnut { height: 220px; }
    }
</style>

<div class="container-fluid dashboard">

    {{-- BANNER --}}
    <section class="hero">
        <div class="hero-content">
            <span class="hero-tag">🌎 ESCUELA DE IDIOMAS</span>

            <h1>¡Bienvenido, {{ auth()->user()->name }}! 👋</h1>

            <p>
                Tu esfuerzo de hoy construye las oportunidades de mañana.
                Administra todos los procesos académicos desde un solo lugar.
            </p>

            <a href="{{ route('alumnos.index') }}" class="hero-button">
                Explorar sistema →
            </a>
        </div>

        <div class="hero-decoration">
            <div class="hero-globe">🌍</div>
            <div class="hero-float float-one">🇬🇧 English</div>
            <div class="hero-float float-two">🇫🇷 Bonjour</div>
            <div class="hero-float float-three">🇪🇸 ¡Hola!</div>
        </div>
    </section>


    {{-- ESTADISTICAS --}}
    <div class="section-heading">
        <div>
            <h2>📊 Resumen general</h2>
            <p>Indicadores principales de la escuela.</p>
        </div>
    </div>

    <div class="row g-3">

        <div class="col-6 col-xl-3">
            <div class="stat-card stat-blue">
                <div class="stat-top">
                    <div class="stat-label">Total de alumnos</div>
                    <div class="stat-icon">🎓</div>
                </div>
                <div class="stat-number">{{ number_format($totalAlumnos) }}</div>
                <div class="stat-description">Alumnos registrados en el sistema</div>
            </div>
        </div>

        <div class="col-6 col-xl-3">
            <div class="stat-card stat-green">
                <div class="stat-top">
                    <div class="stat-label">Profesores</div>
                    <div class="stat-icon">👨‍🏫</div>
                </div>
                <div class="stat-number">{{ number_format($totalProfesores) }}</div>
                <div class="stat-description">Docentes registrados</div>
            </div>
        </div>

        <div class="col-6 col-xl-3">
            <div class="stat-card stat-purple">
                <div class="stat-top">
                    <div class="stat-label">Cursos</div>
                    <div class="stat-icon">📚</div>
                </div>
                <div class="stat-number">{{ number_format($totalCursos) }}</div>
                <div class="stat-description">Cursos disponibles</div>
            </div>
        </div>

        <div class="col-6 col-xl-3">
            <div class="stat-card stat-orange">
                <div class="stat-top">
                    <div class="stat-label">Grupos</div>
                    <div class="stat-icon">👥</div>
                </div>
                <div class="stat-number">{{ number_format($totalGrupos) }}</div>
                <div class="stat-description">Grupos académicos registrados</div>
            </div>
        </div>

    </div>


    {{-- GRAFICAS --}}
    <div class="section-heading">
        <div>
            <h2>📈 Estadísticas académicas</h2>
            <p>Visualiza el comportamiento de las matrículas y los idiomas.</p>
        </div>
    </div>

    <div class="row g-4">

        <div class="col-12 col-xl-7">
            <div class="panel">
                <div class="panel-header">
                    <div>
                        <h3>Matrículas por mes</h3>
                        <p>Registro de matrículas durante los últimos seis meses.</p>
                    </div>
                    <span class="panel-badge">📅 6 meses</span>
                </div>

                <div class="chart-container">
                    <canvas id="matriculasChart"></canvas>
                </div>
            </div>
        </div>

        <div class="col-12 col-xl-5">
            <div class="panel">
                <div class="panel-header">
                    <div>
                        <h3>Alumnos por idioma</h3>
                        <p>Distribución según los cursos matriculados.</p>
                    </div>
                    <span class="panel-badge">🌐 Idiomas</span>
                </div>

                <div class="chart-container doughnut">
                    <canvas id="idiomasChart"></canvas>
                </div>
            </div>
        </div>

    </div>


    {{-- ALUMNOS RECIENTES Y ACCIONES --}}
    <div class="section-heading">
        <div>
            <h2>🎓 Actividad reciente</h2>
            <p>Últimos alumnos incorporados a la institución.</p>
        </div>

        <a href="{{ route('alumnos.index') }}" class="section-link">
            Ver todos →
        </a>
    </div>

    <div class="row g-4">

        <div class="col-12 col-xl-8">
            <div class="panel">

                <div class="panel-header">
                    <div>
                        <h3>Alumnos recientemente registrados</h3>
                        <p>Los cinco registros más recientes.</p>
                    </div>
                    <span class="panel-badge">👨‍🎓 Alumnos</span>
                </div>

                <div class="table-responsive">
                    <table class="students-table">
                        <thead>
                            <tr>
                                <th>Alumno</th>
                                <th>DNI</th>
                                <th>Teléfono</th>
                                <th>Registro</th>
                            </tr>
                        </thead>

                        <tbody>
                            @forelse($alumnosRecientes as $alumno)
                                <tr>
                                    <td>
                                        <div class="student-info">
                                            <div class="student-avatar">
                                                {{ strtoupper(substr($alumno->nombres, 0, 1)) }}{{ strtoupper(substr($alumno->apellidos, 0, 1)) }}
                                            </div>

                                            <div>
                                                <div class="student-name">
                                                    {{ $alumno->nombres }} {{ $alumno->apellidos }}
                                                </div>
                                                <div class="student-email">
                                                    {{ $alumno->email }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td>{{ $alumno->dni }}</td>

                                    <td>{{ $alumno->telefono }}</td>

                                    <td>
                                        <span class="date-badge">
                                            {{ $alumno->created_at ? $alumno->created_at->format('d/m/Y') : 'Sin fecha' }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="empty-table">
                                        🎓 Todavía no hay alumnos registrados.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>


        <div class="col-12 col-xl-4">
            <div class="panel">
                <div class="panel-header">
                    <div>
                        <h3>⚡ Acciones rápidas</h3>
                        <p>Accede directamente a los registros.</p>
                    </div>
                </div>

                <a href="{{ route('alumnos.create') }}" class="quick-link">
                    <span class="quick-left">
                        <span class="quick-icon">🎓</span>
                        Nuevo alumno
                    </span>
                    <span>→</span>
                </a>

                <a href="{{ route('profesores.create') }}" class="quick-link">
                    <span class="quick-left">
                        <span class="quick-icon">👨‍🏫</span>
                        Nuevo profesor
                    </span>
                    <span>→</span>
                </a>

                <a href="{{ route('cursos.create') }}" class="quick-link">
                    <span class="quick-left">
                        <span class="quick-icon">📚</span>
                        Nuevo curso
                    </span>
                    <span>→</span>
                </a>

                <a href="{{ route('matriculas.create') }}" class="quick-link">
                    <span class="quick-left">
                        <span class="quick-icon">📝</span>
                        Nueva matrícula
                    </span>
                    <span>→</span>
                </a>

                <a href="{{ route('pagos.create') }}" class="quick-link">
                    <span class="quick-left">
                        <span class="quick-icon">💳</span>
                        Registrar pago
                    </span>
                    <span>→</span>
                </a>

            </div>
        </div>

    </div>


    {{-- MODULOS DEL SISTEMA --}}
    <div class="section-heading">
        <div>
            <h2>🚀 Módulos del sistema</h2>
            <p>Accede a las principales áreas de administración.</p>
        </div>
    </div>

    <div class="row g-3">

        <div class="col-6 col-md-4 col-xl-3">
            <a href="{{ route('alumnos.index') }}" class="module-card blue">
                <div class="module-icon">🎓</div>
                <h3>Alumnos</h3>
                <p>Gestiona la información de tus estudiantes.</p>
            </a>
        </div>

        <div class="col-6 col-md-4 col-xl-3">
            <a href="{{ route('profesores.index') }}" class="module-card green">
                <div class="module-icon">👨‍🏫</div>
                <h3>Profesores</h3>
                <p>Administra los docentes y especialidades.</p>
            </a>
        </div>

        <div class="col-6 col-md-4 col-xl-3">
            <a href="{{ route('idiomas.index') }}" class="module-card purple">
                <div class="module-icon">🌐</div>
                <h3>Idiomas</h3>
                <p>Organiza los idiomas de la institución.</p>
            </a>
        </div>

        <div class="col-6 col-md-4 col-xl-3">
            <a href="{{ route('cursos.index') }}" class="module-card orange">
                <div class="module-icon">📚</div>
                <h3>Cursos</h3>
                <p>Gestiona cursos, niveles y duración.</p>
            </a>
        </div>

        <div class="col-6 col-md-4 col-xl-3">
            <a href="{{ route('grupos.index') }}" class="module-card pink">
                <div class="module-icon">👥</div>
                <h3>Grupos</h3>
                <p>Organiza horarios y grupos académicos.</p>
            </a>
        </div>

        <div class="col-6 col-md-4 col-xl-3">
            <a href="{{ route('matriculas.index') }}" class="module-card cyan">
                <div class="module-icon">📝</div>
                <h3>Matrículas</h3>
                <p>Registra y administra las matrículas.</p>
            </a>
        </div>

        <div class="col-6 col-md-4 col-xl-3">
            <a href="{{ route('pagos.index') }}" class="module-card indigo">
                <div class="module-icon">💳</div>
                <h3>Pagos</h3>
                <p>Controla los pagos de las matrículas.</p>
            </a>
        </div>

        <div class="col-6 col-md-4 col-xl-3">
            <a href="{{ route('asistencias.index') }}" class="module-card violet">
                <div class="module-icon">📋</div>
                <h3>Asistencias</h3>
                <p>Consulta y registra las asistencias.</p>
            </a>
        </div>

    </div>


    {{-- FRASE FINAL --}}
    <div class="row mt-4">
        <div class="col-12">
            <div class="quote-panel">
                <div class="quote-icon">💬</div>
                <h3>“Un nuevo idioma es una nueva ventana al mundo”.</h3>
                <p>El aprendizaje abre nuevas oportunidades. 🌎</p>
            </div>
        </div>
    </div>

</div>

@endsection


{{-- GRAFICAS CON CHART.JS --}}
@push('scripts')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // ==================================
    // GRAFICA DE MATRICULAS
    // ==================================

    const matriculasCanvas = document.getElementById('matriculasChart');

    if (matriculasCanvas) {

        const matriculasLabels = @json($matriculasLabels);
        const matriculasDatos = @json($matriculasDatos);

        new Chart(matriculasCanvas, {
            type: 'line',

            data: {
                labels: matriculasLabels,

                datasets: [{
                    label: 'Matrículas',
                    data: matriculasDatos,

                    borderColor: '#2878d0',
                    backgroundColor: 'rgba(40, 120, 208, 0.12)',

                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,

                    pointRadius: 5,
                    pointHoverRadius: 7,
                    pointBackgroundColor: '#2878d0',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 2
                }]
            },

            options: {
                responsive: true,
                maintainAspectRatio: false,

                plugins: {
                    legend: {
                        display: false
                    }
                },

                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            precision: 0
                        },
                        grid: {
                            color: '#f0f3f8'
                        }
                    },

                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });
    }


    // ==================================
    // GRAFICA DE IDIOMAS
    // ==================================

    const idiomasCanvas = document.getElementById('idiomasChart');

    if (idiomasCanvas) {

        const idiomas = @json($idiomasDistribucion);

        const idiomasLabels = idiomas.map(item => item.nombre);
        const idiomasDatos = idiomas.map(item => Number(item.total));

        if (idiomasDatos.length > 0) {

            new Chart(idiomasCanvas, {
                type: 'doughnut',

                data: {
                    labels: idiomasLabels,

                    datasets: [{
                        data: idiomasDatos,

                        backgroundColor: [
                            '#2878d0',
                            '#26b99a',
                            '#8b65d6',
                            '#f1a34a',
                            '#e76f9a',
                            '#31b5c7',
                            '#667eea'
                        ],

                        borderWidth: 3,
                        borderColor: '#ffffff',
                        hoverOffset: 7
                    }]
                },

                options: {
                    responsive: true,
                    maintainAspectRatio: false,

                    cutout: '68%',

                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                usePointStyle: true,
                                padding: 17,
                                font: {
                                    size: 11
                                }
                            }
                        }
                    }
                }
            });

        } else {

            idiomasCanvas.parentElement.innerHTML =
                '<div class="empty-chart">🌐 Todavía no hay matrículas asociadas a idiomas.</div>';
        }
    }

});
</script>

@endpush
