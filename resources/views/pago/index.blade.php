
@extends('layouts.app')

@section('template_title')
    Pagos
@endsection

@section('content')

@php
    $totalPagos = $pagos->count();

    $montoTotal = $pagos->sum('monto');

    $montoPromedio = $totalPagos > 0
        ? $montoTotal / $totalPagos
        : 0;

    $metodosPago = $pagos->pluck('metodo_pago')
        ->filter()
        ->unique()
        ->count();

    $metodoMasUsado = $pagos->pluck('metodo_pago')
        ->filter()
        ->countBy()
        ->sortDesc()
        ->keys()
        ->first() ?? 'Sin registros';
@endphp

<style>
    .pago-page {
        padding: 10px 5px 25px;
    }

    .pago-hero {
        background: linear-gradient(120deg, #172554, #1d4ed8, #2563eb);
        color: white;
        padding: 30px;
        border-radius: 20px;
        margin-bottom: 25px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 10px 25px rgba(37, 99, 235, .16);
    }

    .pago-hero::after {
        content: "\f4c0";
        font-family: "bootstrap-icons";
        position: absolute;
        right: 35px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 105px;
        opacity: .10;
    }

    .pago-hero h2 {
        font-weight: 800;
        margin-bottom: 8px;
        font-size: clamp(22px, 3vw, 30px);
    }

    .pago-hero p {
        margin: 0;
        color: #dbeafe;
        max-width: 600px;
    }

    .pago-stat {
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

    .pago-stat:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 22px rgba(15, 23, 42, .08);
    }

    .pago-stat-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 23px;
        flex-shrink: 0;
    }

    .pago-stat h3 {
        font-size: 23px;
        font-weight: 800;
        margin: 0;
        color: #172554;
    }

    .pago-stat p {
        margin: 3px 0 0;
        color: #64748b;
        font-size: 13px;
    }

    .pago-table-card {
        background: white;
        border: 1px solid #edf0f5;
        border-radius: 18px;
        overflow: hidden;
        box-shadow: 0 5px 20px rgba(15, 23, 42, .04);
    }

    .pago-table-header {
        padding: 22px 24px;
        border-bottom: 1px solid #edf0f5;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .pago-table-header h5 {
        color: #172554;
        font-weight: 800;
        margin: 0;
    }

    .pago-table-header p {
        color: #64748b;
        font-size: 13px;
        margin: 4px 0 0;
    }

    .btn-pago {
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

    .btn-pago:hover {
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 5px 14px rgba(37, 99, 235, .25);
    }

    .pago-table-wrapper {
        padding: 20px;
    }

    #tablaPagos {
        width: 100% !important;
        border-collapse: separate !important;
        border-spacing: 0;
    }

    #tablaPagos thead th {
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

    #tablaPagos tbody td {
        padding: 14px 12px;
        vertical-align: middle;
        color: #475569;
        font-size: 13px;
        border-bottom: 1px solid #f1f5f9;
    }

    #tablaPagos tbody tr:hover {
        background: #f8fafc;
    }

    .pago-monto {
        color: #059669;
        font-weight: 800;
        white-space: nowrap;
    }

    .pago-fecha {
        white-space: nowrap;
    }

    .pago-metodo {
        display: inline-block;
        background: #eff6ff;
        color: #1d4ed8;
        border-radius: 7px;
        padding: 6px 9px;
        font-size: 12px;
        font-weight: 700;
    }

    .pago-concepto {
        color: #475569;
        font-weight: 600;
    }

    .pago-alumno {
        color: #172554;
        font-weight: 800;
    }

    .pago-grupo {
        display: inline-block;
        background: #f5f3ff;
        color: #7c3aed;
        border-radius: 7px;
        padding: 6px 9px;
        font-size: 12px;
        font-weight: 700;
    }

    .pago-actions {
        display: flex;
        align-items: center;
        gap: 5px;
        white-space: nowrap;
    }

    .pago-action {
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

    .pago-action:hover {
        transform: translateY(-2px);
    }

    .pago-action.view {
        background: #eff6ff;
        color: #2563eb;
    }

    .pago-action.edit {
        background: #ecfdf5;
        color: #059669;
    }

    .pago-action.delete {
        background: #fef2f2;
        color: #dc2626;
    }

    .pago-alert {
        border: none;
        border-radius: 12px;
        padding: 14px 18px;
        margin: 20px 24px 0;
    }

    @media (max-width: 768px) {
        .pago-hero {
            padding: 23px 20px;
        }

        .pago-hero::after {
            font-size: 65px;
            right: 15px;
        }

        .pago-table-header {
            padding: 18px;
        }

        .pago-table-wrapper {
            padding: 12px;
        }

        .pago-stat {
            padding: 15px;
        }
    }
</style>

<div class="container-fluid pago-page">

    {{-- ENCABEZADO --}}
    <div class="pago-hero">
        <h2>
            <i class="bi bi-cash-stack me-2"></i>
            Gestión de Pagos
        </h2>

        <p>
            Administra los pagos de los alumnos, consulta los importes
            registrados y lleva un control organizado de las operaciones.
        </p>
    </div>

    {{-- MENSAJE DE ÉXITO --}}
    @if (session('success'))
        <div class="alert alert-success pago-alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
        </div>
    @endif

    {{-- TARJETAS ESTADÍSTICAS --}}
    <div class="row g-3 mb-4">

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="pago-stat">
                <div class="pago-stat-icon" style="background:#eff6ff;color:#2563eb;">
                    <i class="bi bi-receipt"></i>
                </div>
                <div>
                    <h3>{{ $totalPagos }}</h3>
                    <p>Pagos registrados</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="pago-stat">
                <div class="pago-stat-icon" style="background:#ecfdf5;color:#059669;">
                    <i class="bi bi-cash-coin"></i>
                </div>
                <div>
                    <h3>S/ {{ number_format($montoTotal, 2) }}</h3>
                    <p>Recaudación total</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="pago-stat">
                <div class="pago-stat-icon" style="background:#f5f3ff;color:#7c3aed;">
                    <i class="bi bi-calculator"></i>
                </div>
                <div>
                    <h3>S/ {{ number_format($montoPromedio, 2) }}</h3>
                    <p>Promedio por pago</p>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-3">
            <div class="pago-stat">
                <div class="pago-stat-icon" style="background:#fff7ed;color:#ea580c;">
                    <i class="bi bi-credit-card"></i>
                </div>
                <div>
                    <h3>{{ $metodosPago }}</h3>
                    <p>Métodos de pago utilizados</p>
                </div>
            </div>
        </div>

    </div>

    {{-- MÉTODO MÁS UTILIZADO --}}
    <div class="mb-4">
        <div class="pago-stat">
            <div class="pago-stat-icon" style="background:#f0fdfa;color:#0f766e;">
                <i class="bi bi-trophy-fill"></i>
            </div>
            <div>
                <h3 style="font-size:17px;">
                    {{ $metodoMasUsado }}
                </h3>
                <p>Método de pago más utilizado</p>
            </div>
        </div>
    </div>

    {{-- TABLA DE PAGOS --}}
    <div class="pago-table-card">

        <div class="pago-table-header">
            <div>
                <h5>
                    <i class="bi bi-list-ul me-2"></i>
                    Listado de pagos
                </h5>
                <p>Consulta, busca y administra todos los pagos registrados.</p>
            </div>

            <a href="{{ route('pagos.create') }}" class="btn-pago">
                <i class="bi bi-plus-circle-fill"></i>
                Nuevo pago
            </a>
        </div>

        <div class="pago-table-wrapper">
            <div class="table-responsive">

                <table id="tablaPagos"
                       class="table table-hover align-middle datatable">

                    <thead>
                        <tr>
                            <th>N.º</th>
                            <th>Monto</th>
                            <th>Fecha de pago</th>
                            <th>Método de pago</th>
                            <th>Concepto</th>
                            <th>Alumno</th>
                            <th>Grupo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($pagos as $pago)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    <span class="pago-monto">
                                        S/ {{ number_format((float) $pago->monto, 2) }}
                                    </span>
                                </td>

                                <td class="pago-fecha">
                                    {{ $pago->fecha_pago
                                        ? \Carbon\Carbon::parse($pago->fecha_pago)->format('d/m/Y')
                                        : '—' }}
                                </td>

                                <td>
                                    <span class="pago-metodo">
                                        <i class="bi bi-credit-card me-1"></i>
                                        {{ $pago->metodo_pago ?? 'No especificado' }}
                                    </span>
                                </td>

                                <td>
                                    <span class="pago-concepto">
                                        {{ $pago->concepto ?? 'Sin concepto' }}
                                    </span>
                                </td>

                                <td>
                                    <span class="pago-alumno">
                                        {{ $pago->matricula?->alumno
                                            ? $pago->matricula->alumno->nombres . ' ' . $pago->matricula->alumno->apellidos
                                            : 'Sin alumno' }}
                                    </span>
                                </td>

                                <td>
                                    <span class="pago-grupo">
                                        {{ $pago->matricula?->grupo?->nombre ?? 'Sin grupo' }}
                                    </span>
                                </td>

                                <td>
                                    <div class="pago-actions">

                                        <a href="{{ route('pagos.show', $pago->id) }}"
                                           class="pago-action view"
                                           title="Ver pago">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>

                                        <a href="{{ route('pagos.edit', $pago->id) }}"
                                           class="pago-action edit"
                                           title="Editar pago">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>

                                        <form action="{{ route('pagos.destroy', $pago->id) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('¿Estás seguro de eliminar este pago?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="pago-action delete"
                                                    title="Eliminar pago">
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
