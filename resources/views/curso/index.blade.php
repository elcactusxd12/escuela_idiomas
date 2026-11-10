 @extends('layouts.app')

@section('template_title')
    Cursos
@endsection

@push('styles')
<style>
    .courses-header {
        background: linear-gradient(135deg, #123c69, #2563a6);
        border-radius: 18px;
        padding: 30px;
        color: white;
        margin-bottom: 25px;
        box-shadow: 0 8px 25px rgba(18, 60, 105, .15);
    }

    .courses-header h2 {
        font-weight: 800;
        margin-bottom: 8px;
    }

    .courses-header p {
        margin: 0;
        opacity: .85;
    }

    .courses-header .btn {
        border-radius: 10px;
        font-weight: 600;
        padding: 10px 18px;
    }

    .course-stat {
        border: none;
        border-radius: 16px;
        box-shadow: 0 4px 18px rgba(0, 0, 0, .06);
        transition: transform .2s ease;
        height: 100%;
    }

    .course-stat:hover {
        transform: translateY(-4px);
    }

    .course-stat .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 13px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
    }

    .course-stat h3 {
        font-size: 25px;
        font-weight: 800;
        margin: 12px 0 3px;
        color: #243247;
    }

    .course-stat p {
        color: #7b8794;
        margin: 0;
        font-size: 13px;
    }

    .courses-table-card {
        border: none;
        border-radius: 17px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, .06);
        overflow: hidden;
    }

    .courses-table-card .card-header {
        background: white;
        border-bottom: 1px solid #edf0f4;
        padding: 20px 24px;
    }

    .courses-table-card .card-body {
        padding: 22px;
    }

    .courses-table thead th {
        background: #f5f7fb;
        color: #536174;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: .5px;
        font-weight: 700;
        border: none;
        padding: 15px 12px;
        white-space: nowrap;
    }

    .courses-table tbody td {
        padding: 14px 12px;
        vertical-align: middle;
        color: #465468;
        border-color: #edf0f4;
    }

    .course-name {
        font-weight: 700;
        color: #26364a;
    }

    .course-level {
        display: inline-block;
        padding: 5px 11px;
        border-radius: 20px;
        background: #e8f1ff;
        color: #2563a6;
        font-size: 12px;
        font-weight: 700;
    }

    .course-language {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        background: #eef8f3;
        color: #198754;
        padding: 6px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .course-price {
        font-weight: 800;
        color: #198754;
        white-space: nowrap;
    }

    .course-actions {
        display: flex;
        justify-content: center;
        gap: 6px;
        white-space: nowrap;
    }

    .course-actions .btn {
        width: 34px;
        height: 34px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 9px;
    }

    .courses-table tbody tr:hover {
        background: #f8faff;
    }

    .dataTables_wrapper .dt-buttons {
        margin-bottom: 15px;
    }

    .dataTables_wrapper .dt-buttons .dt-button {
        border: none !important;
        background: #eef3f9 !important;
        color: #34445a !important;
        border-radius: 8px !important;
        padding: 7px 12px !important;
        margin-right: 5px !important;
        font-size: 12px !important;
    }

    @media (max-width: 576px) {
        .courses-header {
            padding: 22px;
        }

        .courses-header .btn {
            margin-top: 15px;
        }

        .courses-table-card .card-body {
            padding: 12px;
        }
    }
</style>
@endpush

@section('content')
<div class="container-fluid py-3">

    {{-- Encabezado --}}
    <div class="courses-header">
        <div class="d-flex flex-wrap justify-content-between align-items-center">
            <div>
                <h2><i class="bi bi-book-half me-2"></i>Gestión de Cursos</h2>
                <p>Administra los cursos, niveles, precios e idiomas de la escuela.</p>
            </div>

            <a href="{{ route('cursos.create') }}" class="btn btn-light">
                <i class="bi bi-plus-circle me-1"></i> Nuevo curso
            </a>
        </div>
    </div>

    {{-- Tarjetas estadísticas --}}
    <div class="row g-3 mb-4">

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card course-stat">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p>Total de cursos registrados</p>
                            <h3>{{ $cursos->count() }}</h3>
                        </div>
                        <div class="stat-icon bg-primary-subtle text-primary">
                            <i class="bi bi-journal-bookmark-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card course-stat">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p>Niveles diferentes</p>
                            <h3>{{ $cursos->pluck('nivel')->filter()->unique()->count() }}</h3>
                        </div>
                        <div class="stat-icon bg-success-subtle text-success">
                            <i class="bi bi-bar-chart-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="card course-stat">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p>Horas académicas</p>
                            <h3>{{ number_format($cursos->sum('duracion_horas')) }}</h3>
                        </div>
                        <div class="stat-icon bg-warning-subtle text-warning">
                            <i class="bi bi-clock-history"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- Mensaje de éxito --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show rounded-3" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- Tabla de cursos --}}
    <div class="card courses-table-card">

        <div class="card-header d-flex flex-wrap justify-content-between align-items-center gap-2">
            <div>
                <h5 class="mb-1 fw-bold text-dark">
                    <i class="bi bi-list-ul text-primary me-2"></i>Listado de cursos
                </h5>
                <small class="text-muted">Consulta y administra los cursos registrados.</small>
            </div>

            <span class="badge bg-primary-subtle text-primary px-3 py-2 rounded-pill">
                {{ $cursos->count() }} registros
            </span>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table courses-table datatable align-middle w-100">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Curso</th>
                            <th>Nivel</th>
                            <th>Duración</th>
                            <th>Precio</th>
                            <th>Idioma</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($cursos as $curso)
                            <tr>
                                <td>{{ ++$i }}</td>

                                <td>
                                    <span class="course-name">
                                        <i class="bi bi-book text-primary me-1"></i>
                                        {{ $curso->nombre }}
                                    </span>
                                </td>

                                <td>
                                    <span class="course-level">
                                        {{ $curso->nivel }}
                                    </span>
                                </td>

                                <td>
                                    <i class="bi bi-clock text-muted me-1"></i>
                                    {{ $curso->duracion_horas }} horas
                                </td>

                                <td>
                                    <span class="course-price">
                                        S/ {{ number_format((float) $curso->precio, 2) }}
                                    </span>
                                </td>

                                <td>
                                    <span class="course-language">
                                        <i class="bi bi-translate"></i>
                                        {{ $curso->idioma?->nombre ?? 'Sin idioma' }}
                                    </span>
                                </td>

                                <td>
                                    <div class="course-actions">

                                        <a href="{{ route('cursos.show', $curso->id) }}"
                                           class="btn btn-sm btn-outline-primary"
                                           title="Ver curso">
                                            <i class="bi bi-eye"></i>
                                        </a>

                                        <a href="{{ route('cursos.edit', $curso->id) }}"
                                           class="btn btn-sm btn-outline-success"
                                           title="Editar curso">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>

                                        <form action="{{ route('cursos.destroy', $curso->id) }}"
                                              method="POST"
                                              onsubmit="return confirm('¿Estás seguro de eliminar este curso?')">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="btn btn-sm btn-outline-danger"
                                                    title="Eliminar curso">
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