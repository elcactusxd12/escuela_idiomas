<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Matricula;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\PagoRequest;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class PagoController extends Controller
{
    /**
     * Mostrar todos los pagos.
     */
 public function index(Request $request): View
{
    $pagos = Pago::with([
        'matricula.alumno',
        'matricula.grupo'
    ])->get();

    return view('pago.index', compact('pagos'))
        ->with('i', 0);
}
    /**
     * Mostrar formulario para registrar.
     */
    public function create(): View
    {
        $pago = new Pago();

        $matricula = Matricula::with(['alumno', 'grupo'])->get();

        return view('pago.create', compact('pago', 'matricula'));
    }

    /**
     * Guardar pago.
     */
    public function store(PagoRequest $request): RedirectResponse
    {
        Pago::create($request->validated());

        return Redirect::route('pagos.index')
            ->with('success', 'Pago registrado correctamente.');
    }

    /**
     * Mostrar un pago.
     */
    public function show($id): View
    {
        $pago = Pago::with([
            'matricula.alumno',
            'matricula.grupo'
        ])->findOrFail($id);

        return view('pago.show', compact('pago'));
    }

    /**
     * Mostrar formulario para editar.
     */
    public function edit($id): View
    {
        $pago = Pago::findOrFail($id);

        $matricula = Matricula::with(['alumno', 'grupo'])->get();

        return view('pago.edit', compact('pago', 'matricula'));
    }

    /**
     * Actualizar pago.
     */
    public function update(PagoRequest $request, Pago $pago): RedirectResponse
    {
        $pago->update($request->validated());

        return Redirect::route('pagos.index')
            ->with('success', 'Pago actualizado correctamente.');
    }

    /**
     * Eliminar pago.
     */
    public function destroy($id): RedirectResponse
    {
        $pago = Pago::findOrFail($id);

        $pago->delete();

        return Redirect::route('pagos.index')
            ->with('success', 'Pago eliminado correctamente.');
    }
}