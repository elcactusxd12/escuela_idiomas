<?php

namespace App\Http\Controllers;

use App\Models\Grupo;
use App\Models\Curso;
use App\Models\Profesor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\GrupoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class GrupoController extends Controller
{
    /**
     * Mostrar todos los grupos.
     */
    public function index(Request $request): View
    {
        $grupos = Grupo::with(['curso', 'profesor'])->get();

        return view('grupo.index', compact('grupos'))
            ->with('i', 0);
    }

    /**
     * Mostrar formulario para registrar.
     */
    public function create(): View
    {
        $grupo = new Grupo();

        $curso = Curso::pluck('nombre', 'id');

        $profesor = Profesor::select('id', 'nombres', 'apellidos')->get();

        return view('grupo.create', compact('grupo', 'curso', 'profesor'));
    }

    /**
     * Guardar grupo.
     */
    public function store(GrupoRequest $request): RedirectResponse
    {
        Grupo::create($request->validated());

        return Redirect::route('grupos.index')
            ->with('success', 'Grupo registrado correctamente.');
    }

    /**
     * Mostrar un grupo.
     */
    public function show($id): View
    {
        $grupo = Grupo::with(['curso', 'profesor'])->findOrFail($id);

        return view('grupo.show', compact('grupo'));
    }

    /**
     * Mostrar formulario para editar.
     */
    public function edit($id): View
    {
        $grupo = Grupo::findOrFail($id);

        $curso = Curso::pluck('nombre', 'id');

        $profesor = Profesor::select('id', 'nombres', 'apellidos')->get();

        return view('grupo.edit', compact('grupo', 'curso', 'profesor'));
    }

    /**
     * Actualizar grupo.
     */
    public function update(GrupoRequest $request, Grupo $grupo): RedirectResponse
    {
        $grupo->update($request->validated());

        return Redirect::route('grupos.index')
            ->with('success', 'Grupo actualizado correctamente.');
    }

    /**
     * Eliminar grupo.
     */
    public function destroy($id): RedirectResponse
    {
        $grupo = Grupo::findOrFail($id);

        $grupo->delete();

        return Redirect::route('grupos.index')
            ->with('success', 'Grupo eliminado correctamente.');
    }
}