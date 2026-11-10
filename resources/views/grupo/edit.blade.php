
@extends('layouts.app')

@section('template_title')
    Editar grupo
@endsection

@section('content')
<style>
    .grupo-page {
        padding: 25px 15px;
        background: #f3f6fc;
        min-height: calc(100vh - 70px);
    }

    .grupo-hero {
        background: linear-gradient(120deg, #102b55, #174b91, #2875cc);
        border-radius: 18px;
        padding: 30px;
        color: white;
        margin-bottom: 25px;
        position: relative;
        overflow: hidden;
    }

    .grupo-hero::after {
        content: "\f4ca";
        font-family: "bootstrap-icons";
        position: absolute;
        right: 35px;
        top: 5px;
        font-size: 115px;
        opacity: .10;
    }

    .grupo-hero h2 {
        font-weight: 800;
        margin-bottom: 8px;
        font-size: 27px;
    }

    .grupo-hero p {
        margin: 0;
        opacity: .85;
        font-size: 14px;
    }

    .grupo-card {
        background: #fff;
        border: none;
        border-radius: 17px;
        box-shadow: 0 5px 22px rgba(20, 50, 90, .07);
        overflow: hidden;
    }

    .grupo-card-header {
        padding: 20px 25px;
        border-bottom: 1px solid #edf0f6;
        display: flex;
        align-items: center;
        gap: 13px;
    }

    .grupo-icon {
        width: 43px;
        height: 43px;
        border-radius: 12px;
        background: #eaf2ff;
        color: #174b91;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 21px;
    }

    .grupo-card-header h5 {
        margin: 0;
        color: #17345f;
        font-weight: 750;
        font-size: 17px;
    }

    .grupo-card-header small {
        color: #8995a8;
        font-size: 12px;
    }

    .grupo-card-body {
        padding: 28px;
    }

    .grupo-card-footer {
        padding: 18px 28px;
        background: #fafbfe;
        border-top: 1px solid #edf0f6;
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
    }

    .btn-grupo {
        border: none;
        border-radius: 10px;
        padding: 11px 21px;
        font-weight: 650;
        font-size: 14px;
        transition: .2s;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-grupo-primary {
        background: linear-gradient(120deg, #174b91, #2875cc);
        color: white;
        box-shadow: 0 4px 12px rgba(23, 75, 145, .2);
    }

    .btn-grupo-primary:hover {
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(23, 75, 145, .3);
    }

    .btn-grupo-secondary {
        background: #edf1f7;
        color: #52627a;
    }

    .btn-grupo-secondary:hover {
        background: #e0e7f1;
        color: #17345f;
    }

    @media (max-width: 576px) {
        .grupo-page {
            padding: 15px 10px;
        }

        .grupo-hero {
            padding: 23px 20px;
        }

        .grupo-hero h2 {
            font-size: 22px;
        }

        .grupo-hero::after {
            right: 15px;
            font-size: 75px;
        }

        .grupo-card-body {
            padding: 20px 16px;
        }

        .grupo-card-footer {
            padding: 16px;
            flex-direction: column-reverse;
        }

        .btn-grupo {
            width: 100%;
        }
    }
</style>

<div class="grupo-page">

    {{-- Encabezado --}}
    <div class="grupo-hero">
        <h2><i class="bi bi-pencil-square me-2"></i> Editar grupo</h2>
        <p>Actualiza la información académica del grupo seleccionado.</p>
    </div>

    {{-- Formulario --}}
    <div class="row justify-content-center">
        <div class="col-12 col-xl-10">

            <div class="grupo-card">

                <div class="grupo-card-header">
                    <div class="grupo-icon">
                        <i class="bi bi-collection"></i>
                    </div>

                    <div>
                        <h5>Actualizar grupo</h5>
                        <small>Modifica los campos que necesites actualizar</small>
                    </div>
                </div>

                <div class="grupo-card-body">

                    <form method="POST"
                          action="{{ route('grupos.update', $grupo->id) }}"
                          role="form"
                          enctype="multipart/form-data">

                        @csrf
                        @method('PATCH')

                        @include('grupo.form')

                        <div class="grupo-card-footer">
                            <a href="{{ route('grupos.index') }}"
                               class="btn-grupo btn-grupo-secondary">
                                <i class="bi bi-arrow-left"></i>
                                Volver al listado
                            </a>

                            <button type="submit"
                                    class="btn-grupo btn-grupo-primary">
                                <i class="bi bi-save"></i>
                                Guardar cambios
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>
@endsection
