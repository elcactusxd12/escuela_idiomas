 @extends('layouts.app')

@section('template_title')
    Profesores
@endsection

@push('styles')
<style>
    .profesores-page {
        color: #243247;
    }

    .profesores-header {
        background: linear-gradient(135deg, #123b70, #1769aa);
        color: white;
        border-radius: 18px;
        padding: 28px;
        margin-bottom: 25px;
        box-shadow: 0 8px 22px rgba(18, 59, 112, .15);
    }

    .profesores-header h2 {
        font-weight: 800;
        margin-bottom: 7px;
    }

    .profesores-header p {
        margin-bottom: 0;
        opacity: .85;
    }

    .profesores-header-icon {
        width: 65px;
        height: 65px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255,255,255,.15);
        border-radius: 18px;
        font-size: 30px;
    }

    .profesores-stat {
        background: white;
        border: 1px solid #edf0f5;
        border-radius: 16px;
        padding: 20px;
        height: 100%;
        box-shadow: 0 4px 14px rgba(20, 40, 70, .04);
    }

    .profesores-stat-icon {
        width: 45px;
        height: 45px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 13px;
        background: #eaf2ff;
        color: #1769aa;
        font-size: 21px;
    }

    .profesores-stat small {
        color: #778397;
        font-weight: 600;
    }

    .profesores-stat h3 {
        font-size: 27px;
        font-weight: 800;
        margin: 8px 0 0;
    }

    .profesores-card {
        border: 1px solid #edf0f5;
        border-radius: 17px;
        overflow: hidden;
        background: white;
        box-shadow: 0 5px 20px rgba(20, 40, 70, .05);
    }

    .profesores-card-header {
        padding: 20px 24px;
        border-bottom: 1px solid #edf0f5;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .profesores-card-header h5 {
        font-weight: 800;
        margin: 0;
        color: #243247;
    }

    .profesores-card-header p {
        color: #8994a5;
        font-size: 13px;
        margin: 4px 0 0;
    }

    .btn-profesor-primary {
        background: #1769aa;
        border: none;
        color: white;
        border-radius: 10px;
        padding: 10px 16px;
        font-weight: 600;
        text-decoration: none;
        transition: .2s;
    }

    .btn-profesor-primary:hover {
        background: #12558c;
        color: white;
        transform: translateY(-1px);
    }

    .profesores-table {
        margin-bottom: 0 !important;
        vertical-align: middle;
    }

    .profesores-table thead th {
        background: #f5f8fc;
        color: #64748b;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: .4px;
        font-weight: 700;
        padding: 15px 13px;
        border-bottom: 1px solid #e9eef5;
        white-space: nowrap;
    }

    .profesores-table tbody td {
        padding: 14px 13px;
        color: #455468;
        font-size: 13px;
        border-bottom: 1px solid #f0f2f6;
    }

    .profesores-table tbody tr:hover {
        background: #f8fbff;
    }

    .profesor-avatar {
        width: 37px;
        height: 37px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #eaf2ff;
        color: #1769aa;
        border-radius: 11px;
        font-weight: 800;
        margin-right: 9px;
    }

    .profesor-nombre {
        font-weight: 700;
        color: #26364c;
    }

    .profesor-especialidad {
        display: inline-block;
        background: #eef5ff;
        color: #1769aa;
        border-radius: 20px;
        padding: 5px 10px;
        font-size: 12px;
        font-weight: 600;
    }

    .profesor-action {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 32px;
        height: 32px;
        border-radius: 8px;
        border: none;
        text-decoration: none;
        margin: 2px;
        transition: .2s;
    }

    .profesor-action:hover {
        transform: translateY(-2px);
    }

    .profesor-action.view {
        background: #eaf2ff;
        color: #1769aa;
    }

    .profesor-action.edit {
        background: #e8f7ef;
        color: #198754;
    }

    .profesor-action.delete {
        background: #fff0f0;
        color: #dc3545;
    }

    .profesores-empty {
        padding: 45px 15px !important;
        text-align: center;
        color: #8994a5 !important;
    }

    .profesores-empty i {
        font-size: 38px;
        display: block;
        margin-bottom: 12px;
        color: #b7c5d8;
    }

    @media(max-width: 576px) {
        .profesores-header {
            padding: 20px;
        }

        .profesores-header-icon {
            display: none;
        }

        .profesores-card-header {
            padding: 17px;
        }

        .profesores-card-header .btn-profesor-primary {
            width: 100%;
            text-align: center;
        }
    }
</style>
@endpush

@section('content')
<div class="container-fluid profesores-page">

    {{-- Encabezado --}}
    <div class="profesores-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <div class="mb-2">
                    <span class="badge bg-light text-primary px-3 py-2">
                        <i class="bi bi-mortarboard-fill me-1"></i>
                        Escuela de Idiomas
                    </span>
                </div>

                <h2>Gestión de profesores</h2>
                <p>Administra y consulta la información de tus docentes.</p>
            </div>

            <div class="profesores-header-icon">
                <i class="bi bi-person-workspace"></i>
            </div>
        </div>
    </div>

    {{-- Estadística --}}
    <div class="row g-3 mb-4">
        <div class="col-12 col-sm-6 col-xl-4">
            <div class="profesores-stat">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small>Profesores registrados</small>
                        <h3>{{ $profesores->count() }}</h3>
                    </div>
                    <div class="profesores-stat-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="profesores-stat">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small>Especialidades disponibles</small>
                        <h3>{{ $profesores->pluck('especialidad')->filter()->unique()->count() }}</h3>
                    </div>
                    <div class="profesores-stat-icon">
                        <i class="bi bi-bookmarks-fill"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="profesores-stat">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small>Registros en pantalla</small>
                        <h3>{{ $profesores->count() }}</h3>
                    </div>
                    <div class="profesores-stat-icon">
                        <i class="bi bi-list-check"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Mensaje de éxito --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
            <i class="bi bi-check-circle-fill me-2"></i>
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
        </div>
    @endif

    {{-- Tabla --}}
    <div class="profesores-card">

        <div class="profesores-card-header">
            <div>
                <h5><i class="bi bi-person-lines-fill me-2 text-primary"></i>Listado de profesores</h5>
                <p>Consulta, busca y administra los docentes registrados.</p>
            </div>

            <a href="{{ route('profesores.create') }}" class="btn-profesor-primary">
                <i class="bi bi-plus-circle me-1"></i>
                Nuevo profesor
            </a>
        </div>

        <div class="card-body p-3 p-md-4">
            <div class="table-responsive">
                <table class="table table-hover profesores-table datatable w-100">
                    <thead>
                        <tr>
                            <th>N.º</th>
                            <th>Profesor</th>
                            <th>DNI</th>
                            <th>Correo electrónico</th>
                            <th>Teléfono</th>
                            <th>Especialidad</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($profesores as $profesor)
                            <tr>
                                <td>{{ ++$i }}</td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="profesor-avatar">
                                            {{ strtoupper(substr($profesor->nombres, 0, 1)) }}
                                        </span>

                                        <span class="profesor-nombre">
                                            {{ $profesor->nombres }} {{ $profesor->apellidos }}
                                        </span>
                                    </div>
                                </td>

                                <td>{{ $profesor->dni }}</td>

                                <td>{{ $profesor->email }}</td>

                                <td>{{ $profesor->telefono }}</td>

                                <td>
                                    <span class="profesor-especialidad">
                                        {{ $profesor->especialidad }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center">

                                        <a href="{{ route('profesores.show', $profesor->id) }}"
                                           class="profesor-action view"
                                           title="Ver profesor">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>

                                        <a href="{{ route('profesores.edit', $profesor->id) }}"
                                           class="profesor-action edit"
                                           title="Editar profesor">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>

                                        <form action="{{ route('profesores.destroy', $profesor->id) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('¿Estás seguro de que deseas eliminar este profesor?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="profesor-action delete"
                                                    title="Eliminar profesor">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>
                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="profesores-empty">
                                    <i class="bi bi-person-x"></i>
                                    <strong>No hay profesores registrados</strong>
                                    <div class="mt-2">Puedes agregar un nuevo profesor utilizando el botón superior.</div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection