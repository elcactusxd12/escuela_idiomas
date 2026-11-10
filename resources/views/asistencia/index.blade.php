 @extends('layouts.app')

@section('template_title')
    Asistencias
@endsection

@section('content')
@php
    $totalAsistencias = $asistencias->count();

    $totalPresentes = $asistencias->filter(function ($asistencia) {
        return strtolower(trim($asistencia->estado ?? '')) === 'presente';
    })->count();

    $totalAusentes = $asistencias->filter(function ($asistencia) {
        return strtolower(trim($asistencia->estado ?? '')) === 'ausente';
    })->count();

    $totalTardanzas = $asistencias->filter(function ($asistencia) {
        return strtolower(trim($asistencia->estado ?? '')) === 'tardanza';
    })->count();
@endphp

<style>
    .attendance-page {
        padding: 15px 5px 30px;
    }

    .attendance-hero {
        position: relative;
        overflow: hidden;
        padding: 30px;
        border-radius: 18px;
        color: white;
        background: linear-gradient(120deg, #102c54, #1769aa, #2589c7);
        box-shadow: 0 8px 25px rgba(16, 44, 84, .16);
        margin-bottom: 25px;
    }

    .attendance-hero::after {
        content: "\f4c8";
        font-family: "bootstrap-icons";
        position: absolute;
        right: 35px;
        top: 5px;
        font-size: 125px;
        opacity: .10;
        pointer-events: none;
    }

    .attendance-hero h2 {
        font-size: 27px;
        font-weight: 800;
        margin-bottom: 8px;
    }

    .attendance-hero p {
        margin-bottom: 0;
        color: rgba(255,255,255,.85);
    }

    .attendance-hero .btn {
        position: relative;
        z-index: 1;
        border-radius: 9px;
        font-weight: 600;
        padding: 10px 18px;
    }

    .attendance-stat {
        background: white;
        border: 1px solid #edf0f5;
        border-radius: 15px;
        padding: 20px;
        height: 100%;
        box-shadow: 0 4px 15px rgba(0,0,0,.035);
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .attendance-stat:hover {
        transform: translateY(-4px);
        box-shadow: 0 9px 22px rgba(0,0,0,.07);
    }

    .attendance-stat .stat-icon {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 13px;
        font-size: 22px;
        margin-bottom: 14px;
    }

    .attendance-stat h3 {
        font-size: 27px;
        font-weight: 800;
        color: #172b4d;
        margin-bottom: 3px;
    }

    .attendance-stat p {
        color: #8492a6;
        margin: 0;
        font-size: 13px;
        font-weight: 600;
    }

    .stat-blue { background: #e8f2ff; color: #2473c8; }
    .stat-green { background: #e4f8ed; color: #1b9b58; }
    .stat-red { background: #ffebeb; color: #dc4545; }
    .stat-orange { background: #fff2df; color: #dc8a21; }

    .attendance-table-card {
        border: none;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: 0 5px 22px rgba(0,0,0,.055);
    }

    .attendance-table-card .card-header {
        background: white;
        border-bottom: 1px solid #edf0f5;
        padding: 20px 24px;
    }

    .attendance-table-card .card-header h5 {
        color: #172b4d;
        font-weight: 800;
        margin: 0;
    }

    .attendance-table-card .card-body {
        padding: 22px;
    }

    #attendanceTable {
        width: 100% !important;
        border-collapse: separate;
        border-spacing: 0;
    }

    #attendanceTable thead th {
        background: #f5f8fc;
        color: #52647c;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: .5px;
        font-weight: 800;
        padding: 15px 12px;
        border-bottom: 1px solid #e8edf4;
        white-space: nowrap;
    }

    #attendanceTable tbody td {
        padding: 14px 12px;
        vertical-align: middle;
        color: #52647c;
        font-size: 13px;
        border-bottom: 1px solid #f0f2f6;
    }

    #attendanceTable tbody tr:hover {
        background: #f8fbff;
    }

    .attendance-number {
        display: inline-flex;
        width: 29px;
        height: 29px;
        align-items: center;
        justify-content: center;
        border-radius: 9px;
        background: #eaf2fc;
        color: #2672bd;
        font-weight: 800;
        font-size: 12px;
    }

    .attendance-person {
        font-weight: 700;
        color: #253858;
    }

    .attendance-group {
        display: inline-block;
        background: #eef4ff;
        color: #3474bd;
        padding: 6px 10px;
        border-radius: 7px;
        font-size: 11px;
        font-weight: 700;
    }

    .attendance-status {
        display: inline-block;
        padding: 6px 11px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 800;
        white-space: nowrap;
    }

    .status-presente { background: #e2f7eb; color: #198754; }
    .status-ausente { background: #ffe7e7; color: #d63939; }
    .status-tardanza { background: #fff1dc; color: #c77b13; }
    .status-otro { background: #edf0f5; color: #64748b; }

    .attendance-actions {
        display: flex;
        gap: 5px;
        justify-content: center;
    }

    .attendance-actions .btn {
        width: 31px;
        height: 31px;
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
    }

    .attendance-alert {
        border: none;
        border-radius: 10px;
        padding: 14px 18px;
    }

    @media (max-width: 768px) {
        .attendance-page {
            padding: 8px 0 20px;
        }

        .attendance-hero {
            padding: 23px 20px;
        }

        .attendance-hero h2 {
            font-size: 22px;
        }

        .attendance-hero::after {
            right: 10px;
            font-size: 85px;
        }

        .attendance-hero .btn {
            margin-top: 17px;
        }

        .attendance-stat {
            padding: 15px;
        }

        .attendance-stat h3 {
            font-size: 23px;
        }

        .attendance-table-card .card-body {
            padding: 12px;
        }

        .attendance-table-card .card-header {
            padding: 17px;
        }
    }
</style>

<div class="container-fluid attendance-page">

    {{-- ENCABEZADO --}}
    <div class="attendance-hero">
        <div class="row align-items-center">
            <div class="col-md-8">
                <h2><i class="bi bi-calendar2-check me-2"></i> Control de Asistencias</h2>
                <p>Administra y supervisa la asistencia de los alumnos de la escuela de idiomas.</p>
            </div>

            <div class="col-md-4 text-md-end">
                <a href="{{ route('asistencias.create') }}" class="btn btn-light">
                    <i class="bi bi-plus-circle me-1"></i> Registrar asistencia
                </a>
            </div>
        </div>
    </div>

    {{-- MENSAJE --}}
    @if ($message = Session::get('success'))
        <div class="alert alert-success attendance-alert alert-dismissible fade show mb-4" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ $message }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- TARJETAS ESTADÍSTICAS --}}
    <div class="row g-3 mb-4">

        <div class="col-6 col-xl-3">
            <div class="attendance-stat">
                <div class="stat-icon stat-blue">
                    <i class="bi bi-calendar-check"></i>
                </div>
                <h3>{{ $totalAsistencias }}</h3>
                <p>Total de asistencias</p>
            </div>
        </div>

        <div class="col-6 col-xl-3">
            <div class="attendance-stat">
                <div class="stat-icon stat-green">
                    <i class="bi bi-person-check"></i>
                </div>
                <h3>{{ $totalPresentes }}</h3>
                <p>Alumnos presentes</p>
            </div>
        </div>

        <div class="col-6 col-xl-3">
            <div class="attendance-stat">
                <div class="stat-icon stat-red">
                    <i class="bi bi-person-x"></i>
                </div>
                <h3>{{ $totalAusentes }}</h3>
                <p>Alumnos ausentes</p>
            </div>
        </div>

        <div class="col-6 col-xl-3">
            <div class="attendance-stat">
                <div class="stat-icon stat-orange">
                    <i class="bi bi-clock-history"></i>
                </div>
                <h3>{{ $totalTardanzas }}</h3>
                <p>Tardanzas</p>
            </div>
        </div>

    </div>

    {{-- TABLA --}}
    <div class="card attendance-table-card">

        <div class="card-header d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div>
                <h5><i class="bi bi-list-check me-2"></i> Registro de asistencias</h5>
                <small class="text-muted">Listado general de asistencias registradas</small>
            </div>

            <span class="badge bg-primary rounded-pill px-3 py-2">
                {{ $totalAsistencias }} registros
            </span>
        </div>

        <div class="card-body">
            <div class="table-responsive">

                <table id="attendanceTable" class="table table-hover align-middle datatable">
                    <thead>
                        <tr>
                            <th>N.º</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Observación</th>
                            <th>Alumno</th>
                            <th>Grupo</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($asistencias as $asistencia)
                            @php
                                $estado = strtolower(trim($asistencia->estado ?? ''));

                                $claseEstado = match ($estado) {
                                    'presente' => 'status-presente',
                                    'ausente' => 'status-ausente',
                                    'tardanza' => 'status-tardanza',
                                    default => 'status-otro',
                                };

                                $nombreAlumno = trim(
                                    ($asistencia->matricula?->alumno?->nombres ?? '') . ' ' .
                                    ($asistencia->matricula?->alumno?->apellidos ?? '')
                                );
                            @endphp

                            <tr>
                                <td>
                                    <span class="attendance-number">{{ ++$i }}</span>
                                </td>

                                <td>
                                    <i class="bi bi-calendar3 text-primary me-1"></i>
                                    {{ $asistencia->fecha ? \Carbon\Carbon::parse($asistencia->fecha)->format('d/m/Y') : 'Sin fecha' }}
                                </td>

                                <td>
                                    <span class="attendance-status {{ $claseEstado }}">
                                        {{ $asistencia->estado ?: 'Sin estado' }}
                                    </span>
                                </td>

                                <td>
                                    {{ $asistencia->observacion ?: '—' }}
                                </td>

                                <td>
                                    <span class="attendance-person">
                                        <i class="bi bi-person-circle text-secondary me-1"></i>
                                        {{ $nombreAlumno ?: 'Sin alumno' }}
                                    </span>
                                </td>

                                <td>
                                    <span class="attendance-group">
                                        <i class="bi bi-people me-1"></i>
                                        {{ $asistencia->matricula?->grupo?->nombre ?? 'Sin grupo' }}
                                    </span>
                                </td>

                                <td>
                                    <div class="attendance-actions">

                                        <a href="{{ route('asistencias.show', $asistencia->id) }}"
                                           class="btn btn-outline-primary"
                                           title="Ver asistencia">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <a href="{{ route('asistencias.edit', $asistencia->id) }}"
                                           class="btn btn-outline-success"
                                           title="Editar asistencia">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('asistencias.destroy', $asistencia->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('¿Estás seguro de eliminar esta asistencia?');">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-outline-danger"
                                                    title="Eliminar asistencia">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>
@endsection