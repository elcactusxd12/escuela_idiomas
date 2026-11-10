
@extends('layouts.app')

@section('template_title')
    Grupos
@endsection

@section('content')

@php
    $totalGrupos = $grupos->count();
    $totalCursos = $grupos->pluck('cursos_id')->unique()->count();
    $totalProfesores = $grupos->pluck('profesores_id')->unique()->count();
    $totalCupos = $grupos->sum('cupo_maximo');
@endphp

<style>
    .grupo-page {
        padding: 10px 5px 25px;
    }

    .grupo-hero {
        background: linear-gradient(120deg, #172554, #1d4ed8, #2563eb);
        color: white;
        padding: 30px;
        border-radius: 20px;
        margin-bottom: 25px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(37, 99, 235, .16);
    }

    .grupo-hero::after {
        content: "\f51c";
        font-family: "bootstrap-icons";
        position: absolute;
        right: 35px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 100px;
        opacity: .10;
    }

    .grupo-hero h2 {
        font-weight: 800;
        margin-bottom: 8px;
        font-size: clamp(22px, 3vw, 30px);
    }

    .grupo-hero p {
        margin: 0;
        color: #dbeafe;
        max-width: 600px;
    }

    .grupo-stat {
        background: white;
        border: 1px solid #edf0f5;
        border-radius: 16px;
        padding: 20px;
        height: 100%;
        display: flex;
        align-items: center;
        gap: 15px;
        box-shadow: 0 4px 15px rgba(15, 23, 42, .04);
        transition: transform .2s ease, box-shadow .2s ease;
    }

    .grupo-stat:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 22px rgba(15, 23, 42, .08);
    }

    .grupo-stat-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 23px;
        flex-shrink: 0;
    }

    .grupo-stat h3 {
        font-size: 25px;
        font-weight: 800;
        margin: 0;
        color: #172554;
    }

    .grupo-stat p {
        margin: 3px 0 0;
        color: #64748b;
        font-size: 13px;
    }

    .grupo-table-card {
        background: white;
        border: 1px solid #edf0f5;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(15, 23, 42, .04);
    }

    .grupo-table-header {
        padding: 22px 24px;
        border-bottom: 1px solid #edf0f5;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .grupo-table-header h5 {
        color: #172554;
        font-weight: 800;
        margin: 0;
    }

    .grupo-table-header p {
        color: #64748b;
        font-size: 13px;
        margin: 4px 0 0;
    }

    .btn-grupo {
        background: linear-gradient(120deg, #2563eb, #1d4ed8);
        color: white;
        border: none;
        border-radius: 10px;
        padding: 10px 17px;
        font-weight: 700;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        transition: .2s;
    }

    .btn-grupo:hover {
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 14px rgba(37, 99, 235, .25);
    }

    .grupo-table-wrapper {
        padding: 20px;
    }

    #tablaGrupos {
        width: 100% !important;
        border-collapse: separate !important;
        border-spacing: 0;
    }

    #tablaGrupos thead th {
        background: #f1f5f9;
        color: #475569;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: .4px;
        font-weight: 800;
        padding: 15px 12px;
        border-bottom: 1px solid #e2e8f0;
        white-space: nowrap;
    }

    #tablaGrupos tbody td {
        padding: 14px 12px;
        vertical-align: middle;
        color: #475569;
        font-size: 13px;
        border-bottom: 1px solid #f1f5f9;
    }

    #tablaGrupos tbody tr:hover {
        background: #f8fafc;
    }

    .grupo-nombre {
        color: #172554;
        font-weight: 800;
    }

    .grupo-badge {
        display: inline-block;
        background: #eff6ff;
        color: #1d4ed8;
        border-radius: 7px;
        padding: 6px 9px;
        font-size: 12px;
        font-weight: 700;
    }

    .grupo-profesor {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        color: #334155;
        font-weight: 600;
    }

    .grupo-profesor i {
        color: #64748b;
        font-size: 16px;
    }

    .grupo-actions {
        display: flex;
        align-items: center;
        gap: 5px;
        white-space: nowrap;
    }

    .grupo-action {
        width: 32px;
        height: 32px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        text-decoration: none;
        border: none;
        transition: .2s;
        font-size: 14px;
    }

    .grupo-action:hover {
        transform: translateY(-2px);
    }

    .grupo-action.view {
        background: #eff6ff;
        color: #2563eb;
    }

    .grupo-action.edit {
        background: #ecfdf5;
        color: #059669;
    }

    .grupo-action.delete {
        background: #fef2f2;
        color: #dc2626;
    }

    .grupo-alert {
        border: none;
        border-radius: 12px;
        padding: 14px 18px;
        margin: 20px 24px 0;
    }

    @media (max-width: 768px) {
        .grupo-hero {
            padding: 23px 20px;
        }

        .grupo-hero::after {
            font-size: 65px;
            right: 15px;
        }

        .grupo-table-header {
            padding: 18px;
        }

        .grupo-table-wrapper {
            padding: 12px;
        }

        .grupo-stat {
            padding: 15px;
        }
    }
</style>

<div class="container-fluid grupo-page">

    {{-- ENCABEZADO --}}
    <div class="grupo-hero">
        <h2><i class="bi bi-people-fill me-2"></i> Gestión de Grupos</h2>
        <p>
            Administra los grupos académicos, organiza los cursos,
            asigna profesores y controla los cupos disponibles.
        </p>
    </div>

    {{-- MENSAJE DE ÉXITO --}}
    @if (session('success'))
        <div class="alert alert-success grupo-alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- TARJETAS ESTADÍSTICAS --}}
    <div class="row g-3 mb-4">

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="grupo-stat">
                <div class="grupo-stat-icon" style="background:#eff6ff;color:#2563eb;">
                    <i class="bi bi-people-fill"></i>
                </div>
                <div>
                    <h3>{{ $totalGrupos }}</h3>
                    <p>Total de grupos</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="grupo-stat">
                <div class="grupo-stat-icon" style="background:#ecfdf5;color:#059669;">
                    <i class="bi bi-book-fill"></i>
                </div>
                <div>
                    <h3>{{ $totalCursos }}</h3>
                    <p>Cursos asignados</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="grupo-stat">
                <div class="grupo-stat-icon" style="background:#f5f3ff;color:#7c3aed;">
                    <i class="bi bi-person-video3"></i>
                </div>
                <div>
                    <h3>{{ $totalProfesores }}</h3>
                    <p>Profesores asignados</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="grupo-stat">
                <div class="grupo-stat-icon" style="background:#fff7ed;color:#ea580c;">
                    <i class="bi bi-person-plus-fill"></i>
                </div>
                <div>
                    <h3>{{ $totalCupos }}</h3>
                    <p>Cupos disponibles en total</p>
                </div>
            </div>
        </div>

    </div>

    {{-- TABLA DE GRUPOS --}}
    <div class="grupo-table-card">

        <div class="grupo-table-header">
            <div>
                <h5><i class="bi bi-list-ul me-2"></i>Listado de grupos</h5>
                <p>Consulta, busca y administra los grupos registrados.</p>
            </div>

            <a href="{{ route('grupos.create') }}" class="btn-grupo">
                <i class="bi bi-plus-circle-fill"></i>
                Nuevo grupo
            </a>
        </div>

        <div class="grupo-table-wrapper">
            <div class="table-responsive">

                <table id="tablaGrupos" class="table table-hover align-middle datatable">
                    <thead>
                        <tr>
                            <th>N.º</th>
                            <th>Nombre</th>
                            <th>Fecha inicio</th>
                            <th>Fecha fin</th>
                            <th>Horario</th>
                            <th>Cupo máximo</th>
                            <th>Curso</th>
                            <th>Profesor</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($grupos as $grupo)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <span class="grupo-nombre">
                                        {{ $grupo->nombre }}
                                    </span>
                                </td>

                                <td>
                                    {{ $grupo->fecha_inicio
                                        ? \Carbon\Carbon::parse($grupo->fecha_inicio)->format('d/m/Y')
                                        : '—' }}
                                </td>

                                <td>
                                    {{ $grupo->fecha_fin
                                        ? \Carbon\Carbon::parse($grupo->fecha_fin)->format('d/m/Y')
                                        : '—' }}
                                </td>

                                <td>
                                    <span class="grupo-badge">
                                        <i class="bi bi-clock me-1"></i>
                                        {{ $grupo->horario }}
                                    </span>
                                </td>

                                <td>
                                    <span class="grupo-badge">
                                        <i class="bi bi-people me-1"></i>
                                        {{ $grupo->cupo_maximo }}
                                    </span>
                                </td>

                                <td>
                                    {{ $grupo->curso?->nombre ?? 'Sin curso' }}
                                </td>

                                <td>
                                    <span class="grupo-profesor">
                                        <i class="bi bi-person-circle"></i>
                                        {{ $grupo->profesor
                                            ? $grupo->profesor->nombres . ' ' . $grupo->profesor->apellidos
                                            : 'Sin profesor' }}
                                    </span>
                                </td>

                                <td>
                                    <div class="grupo-actions">

                                        <a href="{{ route('grupos.show', $grupo->id) }}"
                                           class="grupo-action view"
                                           title="Ver grupo">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>

                                        <a href="{{ route('grupos.edit', $grupo->id) }}"
                                           class="grupo-action edit"
                                           title="Editar grupo">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>

                                        <form action="{{ route('grupos.destroy', $grupo->id) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('¿Estás seguro de eliminar este grupo?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="grupo-action delete"
                                                    title="Eliminar grupo">
                                                <i class="bi bi-trash-fill"></i>
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
