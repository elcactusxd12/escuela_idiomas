<?php

namespace App\Http\Controllers;

use App\Models\Asistencia;
use App\Models\Matricula;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\AsistenciaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class AsistenciaController extends Controller
{
    /**
     * Mostrar todas las asistencias con alumno y grupo.
     */
 public function index(Request $request): View
{
    $asistencias = Asistencia::with([
        'matricula.alumno',
        'matricula.grupo'
    ])->get();

    return view('asistencia.index', compact('asistencias'))
        ->with('i', 0);
}

    /**
     * Mostrar formulario para registrar.
     */
    public function create(): View
    {
        $asistencia = new Asistencia();

        $matricula = Matricula::with(['alumno', 'grupo'])->get();

        return view('asistencia.create', compact('asistencia', 'matricula'));
    }

    /**
     * Guardar asistencia.
     */
    public function store(AsistenciaRequest $request): RedirectResponse
    {
        Asistencia::create($request->validated());

        return Redirect::route('asistencias.index')
            ->with('success', 'Asistencia registrada correctamente.');
    }

    /**
     * Mostrar una asistencia con sus relaciones.
     */
    public function show($id): View
    {
        $asistencia = Asistencia::with([
            'matricula.alumno',
            'matricula.grupo'
        ])->findOrFail($id);

        return view('asistencia.show', compact('asistencia'));
    }

    /**
     * Mostrar formulario para editar.
     */
    public function edit($id): View
    {
        $asistencia = Asistencia::findOrFail($id);

        $matricula = Matricula::with(['alumno', 'grupo'])->get();

        return view('asistencia.edit', compact('asistencia', 'matricula'));
    }

    /**
     * Actualizar asistencia.
     */
    public function update(AsistenciaRequest $request, Asistencia $asistencia): RedirectResponse
    {
        $asistencia->update($request->validated());

        return Redirect::route('asistencias.index')
            ->with('success', 'Asistencia actualizada correctamente.');
    }

    /**
     * Eliminar asistencia.
     */
    public function destroy($id): RedirectResponse
    {
        $asistencia = Asistencia::findOrFail($id);

        $asistencia->delete();

        return Redirect::route('asistencias.index')
            ->with('success', 'Asistencia eliminada correctamente.');
    }
}