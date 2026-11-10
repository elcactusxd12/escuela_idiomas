<?php

namespace App\Http\Controllers;

use App\Models\Matricula;
use App\Models\Alumno;
use App\Models\Grupo;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\MatriculaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class MatriculaController extends Controller
{
    /**
     * Mostrar todas las matrículas con sus relaciones.
     */
    public function index(Request $request): View
{
    $matriculas = Matricula::with(['alumno', 'grupo'])->get();

    return view('matricula.index', compact('matriculas'))
        ->with('i', 0);
}

    /**
     * Mostrar formulario para registrar.
     */
    public function create(): View
    {
        $matricula = new Matricula();

        $alumno = Alumno::select('id', 'nombres', 'apellidos')->get();
        $grupo = Grupo::select('id', 'nombre')->get();

        return view('matricula.create', compact('matricula', 'alumno', 'grupo'));
    }

    /**
     * Guardar matrícula.
     */
    public function store(MatriculaRequest $request): RedirectResponse
    {
        Matricula::create($request->validated());

        return Redirect::route('matriculas.index')
            ->with('success', 'Matrícula registrada correctamente.');
    }

    /**
     * Mostrar una matrícula con sus relaciones.
     */
    public function show($id): View
    {
        $matricula = Matricula::with(['alumno', 'grupo'])->findOrFail($id);

        return view('matricula.show', compact('matricula'));
    }

    /**
     * Mostrar formulario para editar.
     */
    public function edit($id): View
    {
        $matricula = Matricula::with(['alumno', 'grupo'])->findOrFail($id);

        $alumno = Alumno::select('id', 'nombres', 'apellidos')->get();
        $grupo = Grupo::select('id', 'nombre')->get();

        return view('matricula.edit', compact('matricula', 'alumno', 'grupo'));
    }

    /**
     * Actualizar matrícula.
     */
    public function update(MatriculaRequest $request, Matricula $matricula): RedirectResponse
    {
        $matricula->update($request->validated());

        return Redirect::route('matriculas.index')
            ->with('success', 'Matrícula actualizada correctamente.');
    }

    /**
     * Eliminar matrícula.
     */
    public function destroy($id): RedirectResponse
    {
        $matricula = Matricula::findOrFail($id);

        $matricula->delete();

        return Redirect::route('matriculas.index')
            ->with('success', 'Matrícula eliminada correctamente.');
    }
}