<?php

namespace App\Http\Controllers;

use App\Models\Idioma;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\IdiomaRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class IdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request): View
{
    $idiomas = Idioma::all();

    return view('idioma.index', compact('idiomas'))
        ->with('i', 0);
}

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $idioma = new Idioma();

        return view('idioma.create', compact('idioma'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(IdiomaRequest $request): RedirectResponse
    {
        Idioma::create($request->validated());

        return Redirect::route('idiomas.index')
            ->with('success', 'Idioma created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $idioma = Idioma::find($id);

        return view('idioma.show', compact('idioma'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $idioma = Idioma::find($id);

        return view('idioma.edit', compact('idioma'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(IdiomaRequest $request, Idioma $idioma): RedirectResponse
    {
        $idioma->update($request->validated());

        return Redirect::route('idiomas.index')
            ->with('success', 'Idioma updated successfully');
    }

    public function destroy($id): RedirectResponse
    {
        Idioma::find($id)->delete();

        return Redirect::route('idiomas.index')
            ->with('success', 'Idioma deleted successfully');
    }
}
