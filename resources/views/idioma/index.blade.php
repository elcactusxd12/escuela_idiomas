 @extends('layouts.app')

@section('template_title')
    Idiomas
@endsection

@push('styles')
<style>
    .idiomas-page {
        color: #243247;
    }

    .idiomas-header {
        background: linear-gradient(135deg, #123b70, #1769aa);
        color: white;
        border-radius: 18px;
        padding: 28px;
        margin-bottom: 25px;
        box-shadow: 0 8px 22px rgba(18, 59, 112, .15);
    }

    .idiomas-header h2 {
        font-weight: 800;
        margin-bottom: 7px;
    }

    .idiomas-header p {
        margin-bottom: 0;
        opacity: .85;
    }

    .idiomas-header-icon {
        width: 65px;
        height: 65px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255,255,255,.15);
        border-radius: 18px;
        font-size: 30px;
    }

    .idiomas-stat {
        background: white;
        border: 1px solid #edf0f5;
        border-radius: 16px;
        padding: 20px;
        height: 100%;
        box-shadow: 0 4px 14px rgba(20, 40, 70, .04);
    }

    .idiomas-stat small {
        color: #778397;
        font-weight: 600;
    }

    .idiomas-stat h3 {
        font-size: 27px;
        font-weight: 800;
        margin: 8px 0 0;
    }

    .idiomas-stat-icon {
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

    .idiomas-card {
        border: 1px solid #edf0f5;
        border-radius: 17px;
        overflow: hidden;
        background: white;
        box-shadow: 0 5px 20px rgba(20, 40, 70, .05);
    }

    .idiomas-card-header {
        padding: 20px 24px;
        border-bottom: 1px solid #edf0f5;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 15px;
        flex-wrap: wrap;
    }

    .idiomas-card-header h5 {
        font-weight: 800;
        margin: 0;
        color: #243247;
    }

    .idiomas-card-header p {
        color: #8994a5;
        font-size: 13px;
        margin: 4px 0 0;
    }

    .btn-idioma-primary {
        background: #1769aa;
        border: none;
        color: white;
        border-radius: 10px;
        padding: 10px 16px;
        font-weight: 600;
        text-decoration: none;
        transition: .2s;
    }

    .btn-idioma-primary:hover {
        background: #12558c;
        color: white;
        transform: translateY(-1px);
    }

    .idiomas-table {
        margin-bottom: 0 !important;
        vertical-align: middle;
    }

    .idiomas-table thead th {
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

    .idiomas-table tbody td {
        padding: 15px 13px;
        color: #455468;
        font-size: 13px;
        border-bottom: 1px solid #f0f2f6;
    }

    .idiomas-table tbody tr:hover {
        background: #f8fbff;
    }

    .idioma-avatar {
        width: 42px;
        height: 42px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        background: #eaf2ff;
        color: #1769aa;
        border-radius: 12px;
        font-size: 20px;
        margin-right: 11px;
        flex-shrink: 0;
    }

    .idioma-nombre {
        font-weight: 700;
        color: #26364c;
        font-size: 14px;
    }

    .idioma-codigo {
        display: inline-block;
        background: #eef5ff;
        color: #1769aa;
        border: 1px solid #dceaff;
        border-radius: 8px;
        padding: 5px 11px;
        font-size: 12px;
        font-weight: 800;
        letter-spacing: 1px;
    }

    .idioma-action {
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

    .idioma-action:hover {
        transform: translateY(-2px);
    }

    .idioma-action.view {
        background: #eaf2ff;
        color: #1769aa;
    }

    .idioma-action.edit {
        background: #e8f7ef;
        color: #198754;
    }

    .idioma-action.delete {
        background: #fff0f0;
        color: #dc3545;
    }

    .idiomas-empty {
        padding: 45px 15px !important;
        text-align: center;
        color: #8994a5 !important;
    }

    .idiomas-empty i {
        font-size: 38px;
        display: block;
        margin-bottom: 12px;
        color: #b7c5d8;
    }

    @media(max-width: 576px) {
        .idiomas-header {
            padding: 20px;
        }

        .idiomas-header-icon {
            display: none;
        }

        .idiomas-card-header {
            padding: 17px;
        }

        .idiomas-card-header .btn-idioma-primary {
            width: 100%;
            text-align: center;
        }
    }
</style>
@endpush

@section('content')
<div class="container-fluid idiomas-page">

    {{-- Encabezado --}}
    <div class="idiomas-header">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <div class="mb-2">
                    <span class="badge bg-light text-primary px-3 py-2">
                        <i class="bi bi-mortarboard-fill me-1"></i>
                        Escuela de Idiomas
                    </span>
                </div>

                <h2>Gestión de idiomas</h2>
                <p>Administra los idiomas disponibles en nuestra institución.</p>
            </div>

            <div class="idiomas-header-icon">
                <i class="bi bi-translate"></i>
            </div>
        </div>
    </div>

    {{-- Estadísticas --}}
    <div class="row g-3 mb-4">

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="idiomas-stat">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small>Total de idiomas registrados</small>
                        <h3>{{ $idiomas->count() }}</h3>
                    </div>
                    <div class="idiomas-stat-icon">
                        <i class="bi bi-globe2"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="idiomas-stat">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small>Códigos disponibles</small>
                        <h3>{{ $idiomas->whereNotNull('codigo')->where('codigo', '!=', '')->count() }}</h3>
                    </div>
                    <div class="idiomas-stat-icon">
                        <i class="bi bi-upc-scan"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-sm-6 col-xl-4">
            <div class="idiomas-stat">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <small>Idiomas diferentes</small>
                        <h3>{{ $idiomas->pluck('nombre')->filter()->unique()->count() }}</h3>
                    </div>
                    <div class="idiomas-stat-icon">
                        <i class="bi bi-chat-square-text-fill"></i>
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

    {{-- Tabla de idiomas --}}
    <div class="idiomas-card">

        <div class="idiomas-card-header">
            <div>
                <h5>
                    <i class="bi bi-translate me-2 text-primary"></i>
                    Listado de idiomas
                </h5>
                <p>Consulta, busca y administra los idiomas registrados.</p>
            </div>

            <a href="{{ route('idiomas.create') }}" class="btn-idioma-primary">
                <i class="bi bi-plus-circle me-1"></i>
                Nuevo idioma
            </a>
        </div>

        <div class="card-body p-3 p-md-4">
            <div class="table-responsive">

                <table class="table table-hover idiomas-table datatable w-100">
                    <thead>
                        <tr>
                            <th>N.º</th>
                            <th>Idioma</th>
                            <th>Código</th>
                            <th class="text-center">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($idiomas as $idioma)
                            <tr>
                                <td>{{ ++$i }}</td>

                                <td>
                                    <div class="d-flex align-items-center">
                                        <span class="idioma-avatar">
                                            <i class="bi bi-translate"></i>
                                        </span>

                                        <span class="idioma-nombre">
                                            {{ $idioma->nombre }}
                                        </span>
                                    </div>
                                </td>

                                <td>
                                    <span class="idioma-codigo">
                                        {{ $idioma->codigo }}
                                    </span>
                                </td>

                                <td class="text-center">
                                    <div class="d-flex justify-content-center align-items-center">

                                        <a href="{{ route('idiomas.show', $idioma->id) }}"
                                           class="idioma-action view"
                                           title="Ver idioma">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>

                                        <a href="{{ route('idiomas.edit', $idioma->id) }}"
                                           class="idioma-action edit"
                                           title="Editar idioma">
                                            <i class="bi bi-pencil-fill"></i>
                                        </a>

                                        <form action="{{ route('idiomas.destroy', $idioma->id) }}"
                                              method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('¿Estás seguro de que deseas eliminar este idioma?');">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit"
                                                    class="idioma-action delete"
                                                    title="Eliminar idioma">
                                                <i class="bi bi-trash-fill"></i>
                                            </button>

                                        </form>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="idiomas-empty">
                                    <i class="bi bi-translate"></i>
                                    <strong>No hay idiomas registrados</strong>
                                    <div class="mt-2">
                                        Puedes agregar un nuevo idioma utilizando el botón superior.
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