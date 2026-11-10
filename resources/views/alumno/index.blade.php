 @extends('layouts.app')

@section('template_title')
    Alumnos
@endsection

@push('styles')
<style>
    .alumnos-page {
        color: #243247;
    }

    .alumnos-header {
        background: linear-gradient(135deg, #123b70, #1769aa);
        color: white;
        border-radius: 18px;
        padding: 28px;
        margin-bottom: 25px;
        box-shadow: 0 8px 22px rgba(18, 59, 112, .15);
    }

    .alumnos-header h2 {
        font-weight: 800;
        margin-bottom: 7px;
    }

    .alumnos-header p {
        margin-bottom: 0;
        opacity: .85;
    }

    .alumnos-header-icon {
        width: 65px;
        height: 65px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255,255,255,.15);
        border-radius: 18px;
        font-size: 30px;
    }

    .alumnos-stat {
        background: white;
        border: 1px solid #edf0f5;
        border-radius: 16px;
        padding: 20px;
        height: 100%;
        box-shadow: 0 4px 14px rgba(20, 40, 70, .04);
    }

    .alumnos-stat small {
        color: #778397;
        font-weight: 600;
    }

    .alumnos-stat h3 {
        font-size: 27px;
        font-weight: 800;
        margin: 8px 0 0;
    }

    .alumnos-stat-icon {
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

    .alumnos-card {
        border: 1px solid #edf0f5;
        border-radius: 17px;
        overflow: hidden;
        background: white;
        box-shadow: 0 5px 20px rgba(20, 40, 70, .05);
    }

    .alumnos-card-header {
        padding: 20px 24px;
        border-bottom: 1px solid #edf0f5;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .alumnos-card-header h5 {
        font-weight: 800;
        margin: 0;
        color: #243247;
    }

    .alumnos-card-header p {
        color: #8994a5;
        font-size: 13px;
        margin: 4px 0 0;
    }

    .btn-alumno-primary {
        background: #1769aa;
        border: none;
        color: white;
        border-radius: 10px;
        padding: 10px 16px;
        font-weight: 600;
        text-decoration: none;
        transition: .2s;
    }

    .btn-alumno-primary:hover {
        background: #12558c;
        color: white;
        transform: translateY(-1px);
    }

    .alumnos-table {
        margin-bottom: 0 !important;
        vertical-align: middle;
    }

    .alumnos-table thead th {
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

    .alumnos-table tbody td {
        padding: 14px 13px;
        color: #455468;
        font-size: 13px;
        border-bottom: 1px solid #f0f2f6;
    }

    .alumnos-table tbody tr:hover {
        background: #f8fbff;
    }

    .alumno-avatar {
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
        flex-shrink: 0;
    }

    .alumno-nombre {
        font-weight: 700;
        color: #26364c;
    }

    .alumno-action {
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

    .alumno-action:hover {
        transform: translateY(-2px);
    }

    .alumno-action.view {
        background: #eaf2ff;
        color: #1769aa;
    }

    .alumno-action.edit {
        background: #e8f7ef;
        color: #198754;
    }

    .alumno-action.delete {
        background: #fff0f0;
        color: #dc3545;
    }

    .alumnos-empty {
        padding: 45px 15px !important;
        text-align: center;
        color: #8994a5 !important;
    }

    .alumnos-empty i {
        font-size: 38px;
        display: block;
        margin-bottom: 12px;
        color: #b7c5d8;
    }

    @media(max-width: 576px) {
        .alumnos-header {
            padding: 20px;
        }

        .alumnos-header-icon {
            display: none;
        }

        .alumnos-card-header {
            padding: 17px;
        }

        .alumnos-card-header .btn-alumno-primary {
            width: 100%;
            text-align: center;
        }
    }
</style>
@endpush

@section('content')
<div class="container-fluid alumnos-page">

    {{-- Encabezado --}}
    <div class="alumnos-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <div class="mb-2">
                    <span class="badge bg-light text-primary px-3 py-2">
                        <i class="bi bi-mortarboard-fill me-1"></i>
                        Escuela de Idiomas
                    </span>
                </div>

                <h2>Gestión de alumnos</h2>
                <p>Administra y consulta la información de tus estudiantes.</p>
            </div>

            <div class="alumnos-header-icon">
                <i class="bi bi-backpack-fill"></i>
            </div>
        </div>
    </div>

    {{-- Estadísticas --}}
    <div class="row g-3 mb-4">

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="alumnos-stat">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small>Total de alumnos registrados</small>
                        <h3>{{ $alumnos->count() }}</h3>
                    </div>
                    <div class="alumnos-stat-icon">
                        <i class="bi bi-people-fill"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="alumnos-stat">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small>Alumnos con correo registrado</small>
                        <h3>{{ $alumnos->whereNotNull('email')->where('email', '!=', '')->count() }}</h3>
                    </div>
                    <div class="alumnos-stat-icon">
                        <i class="bi bi-envelope-check-fill"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="alumnos-stat">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small>Alumnos con teléfono registrado</small>
                        <h3>{{ $alumnos->whereNotNull('telefono')->where('telefono', '!=', '')->count() }}</h3>
                    </div>
                    <div class="alumnos-stat-icon">
                        <i class="bi bi-telephone-fill"></i>
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

    {{-- Tabla de alumnos --}}
    <div class="alumnos-card">

        <div class="alumnos-card-header">
            <div>
                <h5>
                    <i class="bi bi-person-lines-fill me-2 text-primary"></i>
                    Listado de alumnos
                </h5>
                <p>Consulta, busca y administra los estudiantes registrados.</p>
            </div>

            <a href="{{ route('alumnos.create') }}" class="btn-alumno-primary">
                <i class="bi bi-plus-circle me-1"></i>
                Nuevo alumno
            </a>
        </div>

        <div class="card-body p-3 p-md-4">
            <div class="table-responsive">

                <table class="table table-hover alumnos-table datatable w-100">

                    <thead>
                        <tr>
                            <th>N.º</th>
                            <th>Alumno</th>
                            <th>DNI</th>
                            <th>Correo electrónico</th>
                            <th>Teléfono</th>
                            <th>Dirección</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($alumnos as $alumno)
                            <tr>
                                <td>{{ ++$i }}</td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="alumno-avatar">
                                            {{ strtoupper(substr($alumno->nombres ?? '?', 0, 1)) }}
                                        </span>

                                        <span class="alumno-nombre">
                                            {{ $alumno->nombres }} {{ $alumno->apellidos }}
                                        </span>
                                    </div>
                                </td>

                                <td>{{ $alumno->dni }}</td>

                                <td>{{ $alumno->email }}</td>

                                <td>{{ $alumno->telefono }}</td>

                                <td>{{ $alumno->direccion }}</td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center">

                                        <a href="{{ route('alumnos.show', $alumno->id) }}"
                                           class="alumno-action view"
                                           title="Ver alumno">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>

                                        <a href="{{ route('alumnos.edit', $alumno->id) }}"
                                           class="alumno-action edit"
                                           title="Editar alumno">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>

                                        <form action="{{ route('alumnos.destroy', $alumno->id) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('¿Estás seguro de que deseas eliminar este alumno?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="alumno-action delete"
                                                    title="Eliminar alumno">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>

                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="alumnos-empty">
                                    <i class="bi bi-person-x"></i>
                                    <strong>No hay alumnos registrados</strong>
                                    <div class="mt-2">
                                        Puedes agregar un nuevo alumno utilizando el botón superior.
                                    </div>
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