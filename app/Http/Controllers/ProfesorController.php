<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\ProfesorRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
{
    $profesores = Profesor::all();

    return view('profesor.index', compact('profesores'))
        ->with('i', 0);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $profesor = new Profesor();

        return view('profesor.create', compact('profesor'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProfesorRequest $request): RedirectResponse
    {
        Profesor::create($request->validated());

        return Redirect::route('profesores.index')
            ->with('success', 'Profesor registrado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $profesor = Profesor::findOrFail($id);

        return view('profesor.show', compact('profesor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $profesor = Profesor::findOrFail($id);

        return view('profesor.edit', compact('profesor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProfesorRequest $request, Profesor $profesor): RedirectResponse
    {
        $profesor->update($request->validated());

        return Redirect::route('profesores.index')
            ->with('success', 'Profesor actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $profesor = Profesor::findOrFail($id);

        $profesor->delete();

        return Redirect::route('profesores.index')
            ->with('success', 'Profesor eliminado correctamente.');
    }
}
