<?php

namespace App\Http\Controllers;

use App\Models\Curso;
use App\Models\Idioma;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\CursoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CursoController extends Controller
{
    /**
     * Mostrar todos los cursos.
     */
    public function index(Request $request): View
{
    $cursos = Curso::with('idioma')->get();

    return view('curso.index', compact('cursos'))
        ->with('i', 0);
}

    /**
     * Mostrar formulario para registrar.
     */
    public function create(): View
    {
        $curso = new Curso();

        $idioma = Idioma::pluck('nombre', 'id');

        return view('curso.create', compact('curso', 'idioma'));
    }

    /**
     * Guardar curso.
     */
    public function store(CursoRequest $request): RedirectResponse
    {
        Curso::create($request->validated());

        return Redirect::route('cursos.index')
            ->with('success', 'Curso registrado correctamente.');
    }

    /**
     * Mostrar un curso.
     */
    public function show($id): View
    {
        $curso = Curso::with('idioma')->findOrFail($id);

        return view('curso.show', compact('curso'));
    }

    /**
     * Mostrar formulario para editar.
     */
    public function edit($id): View
    {
        $curso = Curso::findOrFail($id);

        $idioma = Idioma::pluck('nombre', 'id');

        return view('curso.edit', compact('curso', 'idioma'));
    }

    /**
     * Actualizar curso.
     */
    public function update(CursoRequest $request, Curso $curso): RedirectResponse
    {
        $curso->update($request->validated());

        return Redirect::route('cursos.index')
            ->with('success', 'Curso actualizado correctamente.');
    }

    /**
     * Eliminar curso.
     */
    public function destroy($id): RedirectResponse
    {
        $curso = Curso::findOrFail($id);

        $curso->delete();

        return Redirect::route('cursos.index')
            ->with('success', 'Curso eliminado correctamente.');
    }
}