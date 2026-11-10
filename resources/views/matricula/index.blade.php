
@extends('layouts.app')

@section('template_title')
    Matrículas
@endsection

@section('content')

@php
    $totalMatriculas = $matriculas->count();

    $matriculasActivas = $matriculas->filter(function ($matricula) {
        return strtolower($matricula->estado ?? '') === 'activo';
    })->count();

    $matriculasInactivas = $matriculas->filter(function ($matricula) {
        return strtolower($matricula->estado ?? '') === 'inactivo';
    })->count();

    $ingresosTotales = $matriculas->sum('precio_total');
@endphp

<style>
    .matricula-page {
        padding: 10px 5px 25px;
    }

    .matricula-hero {
        background: linear-gradient(120deg, #172554, #1d4ed8, #2563eb);
        color: white;
        padding: 30px;
        border-radius: 20px;
        margin-bottom: 25px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(37, 99, 235, .16);
    }

    .matricula-hero::after {
        content: "\f4c0";
        font-family: "bootstrap-icons";
        position: absolute;
        right: 35px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 105px;
        opacity: .10;
    }

    .matricula-hero h2 {
        font-weight: 800;
        margin-bottom: 8px;
        font-size: clamp(22px, 3vw, 30px);
    }

    .matricula-hero p {
        margin: 0;
        color: #dbeafe;
        max-width: 600px;
    }

    .matricula-stat {
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

    .matricula-stat:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 22px rgba(15, 23, 42, .08);
    }

    .matricula-stat-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 23px;
        flex-shrink: 0;
    }

    .matricula-stat h3 {
        font-size: 24px;
        font-weight: 800;
        margin: 0;
        color: #172554;
    }

    .matricula-stat p {
        margin: 3px 0 0;
        color: #64748b;
        font-size: 13px;
    }

    .matricula-table-card {
        background: white;
        border: 1px solid #edf0f5;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(15, 23, 42, .04);
    }

    .matricula-table-header {
        padding: 22px 24px;
        border-bottom: 1px solid #edf0f5;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .matricula-table-header h5 {
        color: #172554;
        font-weight: 800;
        margin: 0;
    }

    .matricula-table-header p {
        color: #64748b;
        font-size: 13px;
        margin: 4px 0 0;
    }

    .btn-matricula {
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

    .btn-matricula:hover {
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 14px rgba(37, 99, 235, .25);
    }

    .matricula-table-wrapper {
        padding: 20px;
    }

    #tablaMatriculas {
        width: 100% !important;
        border-collapse: separate !important;
        border-spacing: 0;
    }

    #tablaMatriculas thead th {
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

    #tablaMatriculas tbody td {
        padding: 14px 12px;
        vertical-align: middle;
        color: #475569;
        font-size: 13px;
        border-bottom: 1px solid #f1f5f9;
    }

    #tablaMatriculas tbody tr:hover {
        background: #f8fafc;
    }

    .matricula-alumno {
        color: #172554;
        font-weight: 800;
    }

    .matricula-grupo {
        display: inline-block;
        background: #eff6ff;
        color: #1d4ed8;
        border-radius: 7px;
        padding: 6px 9px;
        font-size: 12px;
        font-weight: 700;
    }

    .matricula-precio {
        color: #059669;
        font-weight: 800;
        white-space: nowrap;
    }

    .matricula-estado {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        border-radius: 20px;
        padding: 6px 11px;
        font-size: 11px;
        font-weight: 800;
        text-transform: capitalize;
        white-space: nowrap;
    }

    .matricula-estado.activo {
        background: #dcfce7;
        color: #15803d;
    }

    .matricula-estado.inactivo {
        background: #fee2e2;
        color: #b91c1c;
    }

    .matricula-estado.otro {
        background: #f1f5f9;
        color: #475569;
    }

    .matricula-actions {
        display: flex;
        align-items: center;
        gap: 5px;
        white-space: nowrap;
    }

    .matricula-action {
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

    .matricula-action:hover {
        transform: translateY(-2px);
    }

    .matricula-action.view {
        background: #eff6ff;
        color: #2563eb;
    }

    .matricula-action.edit {
        background: #ecfdf5;
        color: #059669;
    }

    .matricula-action.delete {
        background: #fef2f2;
        color: #dc2626;
    }

    .matricula-alert {
        border: none;
        border-radius: 12px;
        padding: 14px 18px;
        margin: 20px 24px 0;
    }

    @media (max-width: 768px) {
        .matricula-hero {
            padding: 23px 20px;
        }

        .matricula-hero::after {
            font-size: 65px;
            right: 15px;
        }

        .matricula-table-header {
            padding: 18px;
        }

        .matricula-table-wrapper {
            padding: 12px;
        }

        .matricula-stat {
            padding: 15px;
        }
    }
</style>

<div class="container-fluid matricula-page">

    {{-- ENCABEZADO --}}
    <div class="matricula-hero">
        <h2>
            <i class="bi bi-journal-check me-2"></i>
            Gestión de Matrículas
        </h2>

        <p>
            Administra las matrículas de los alumnos, consulta sus grupos,
            controla los estados y revisa los importes registrados.
        </p>
    </div>

    {{-- MENSAJE DE ÉXITO --}}
    @if (session('success'))
        <div class="alert alert-success matricula-alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- TARJETAS ESTADÍSTICAS --}}
    <div class="row g-3 mb-4">

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="matricula-stat">
                <div class="matricula-stat-icon" style="background:#eff6ff;color:#2563eb;">
                    <i class="bi bi-journal-text"></i>
                </div>
                <div>
                    <h3>{{ $totalMatriculas }}</h3>
                    <p>Total de matrículas</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="matricula-stat">
                <div class="matricula-stat-icon" style="background:#ecfdf5;color:#059669;">
                    <i class="bi bi-check-circle-fill"></i>
                </div>
                <div>
                    <h3>{{ $matriculasActivas }}</h3>
                    <p>Matrículas activas</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="matricula-stat">
                <div class="matricula-stat-icon" style="background:#fef2f2;color:#dc2626;">
                    <i class="bi bi-x-circle-fill"></i>
                </div>
                <div>
                    <h3>{{ $matriculasInactivas }}</h3>
                    <p>Matrículas inactivas</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="matricula-stat">
                <div class="matricula-stat-icon" style="background:#fff7ed;color:#ea580c;">
                    <i class="bi bi-cash-stack"></i>
                </div>
                <div>
                    <h3>S/ {{ number_format($ingresosTotales, 2) }}</h3>
                    <p>Importe total registrado</p>
                </div>
            </div>
        </div>

    </div>

    {{-- TABLA --}}
    <div class="matricula-table-card">

        <div class="matricula-table-header">
            <div>
                <h5>
                    <i class="bi bi-list-ul me-2"></i>
                    Listado de matrículas
                </h5>
                <p>Consulta, busca y administra las matrículas registradas.</p>
            </div>

            <a href="{{ route('matriculas.create') }}" class="btn-matricula">
                <i class="bi bi-plus-circle-fill"></i>
                Nueva matrícula
            </a>
        </div>

        <div class="matricula-table-wrapper">
            <div class="table-responsive">

                <table id="tablaMatriculas"
                       class="table table-hover align-middle datatable">

                    <thead>
                        <tr>
                            <th>N.º</th>
                            <th>Fecha matrícula</th>
                            <th>Precio total</th>
                            <th>Estado</th>
                            <th>Alumno</th>
                            <th>Grupo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($matriculas as $matricula)
                            @php
                                $estado = strtolower($matricula->estado ?? '');
                                $claseEstado = match ($estado) {
                                    'activo' => 'activo',
                                    'inactivo' => 'inactivo',
                                    default => 'otro',
                                };
                            @endphp

                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    {{ $matricula->fecha_matricula
                                        ? \Carbon\Carbon::parse($matricula->fecha_matricula)->format('d/m/Y')
                                        : '—' }}
                                </td>

                                <td>
                                    <span class="matricula-precio">
                                        S/ {{ number_format((float) $matricula->precio_total, 2) }}
                                    </span>
                                </td>

                                <td>
                                    <span class="matricula-estado {{ $claseEstado }}">
                                        <i class="bi bi-circle-fill" style="font-size:7px;"></i>
                                        {{ $matricula->estado ?? 'Sin estado' }}
                                    </span>
                                </td>

                                <td>
                                    <span class="matricula-alumno">
                                        {{ $matricula->alumno
                                            ? $matricula->alumno->nombres . ' ' . $matricula->alumno->apellidos
                                            : 'Sin alumno' }}
                                    </span>
                                </td>

                                <td>
                                    <span class="matricula-grupo">
                                        {{ $matricula->grupo?->nombre ?? 'Sin grupo' }}
                                    </span>
                                </td>

                                <td>
                                    <div class="matricula-actions">

                                        <a href="{{ route('matriculas.show', $matricula->id) }}"
                                           class="matricula-action view"
                                           title="Ver matrícula">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>

                                        <a href="{{ route('matriculas.edit', $matricula->id) }}"
                                           class="matricula-action edit"
                                           title="Editar matrícula">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>

                                        <form action="{{ route('matriculas.destroy', $matricula->id) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('¿Estás seguro de eliminar esta matrícula?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="matricula-action delete"
                                                    title="Eliminar matrícula">
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
