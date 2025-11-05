<?php

namespace App\Http\Controllers;

use App\Http\Requests\MedicamentoRequest;
use App\Models\Medicamento;
use Illuminate\Http\Request;

class MedicamentoController extends Controller
{
    public function index(Request $request)
    {
       
    $query = Medicamento::query();

  
    if ($request->filled('search')) {
        $search = $request->input('search');
        $query->where('nombre', 'like', "%{$search}%")
              ->orWhere('descripcion', 'like', "%{$search}%")
              ->orWhere('laboratorio', 'like', "%{$search}%");
    }


    if ($request->filled('order')) {
        $order = $request->input('order');

        $allowedColumns = ['nombre', 'precio', 'fecha_caducidad', 'created_at'];
        if (in_array($order, $allowedColumns)) {
            $query->orderBy($order, 'asc');
        }
    } else {
        $query->orderBy('created_at', 'desc'); 
    }

    $medicamentos = $query->paginate(12)->appends($request->query());

    return view('medicamentos.index', compact('medicamentos'));
    }

    public function create()
    {
        return view('medicamentos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(MedicamentoRequest $request)
    {
        $med = Medicamento::create($request->validated());
        return redirect()->route('medicamentos.index')
                     ->with('success', 'Medicamento creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Medicamento $medicamento)
    {
        return view('medicamentos.show', compact('medicamento'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Medicamento $medicamento)
    {
        return view('medicamentos.edit', compact('medicamento'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(MedicamentoRequest $request, Medicamento $medicamento)
    {
        $medicamento->update($request->validated());
        return redirect()->route('medicamentos.show', $medicamento)->with('success', 'Medicamento actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Medicamento $medicamento)
    {
        $medicamento->delete();
        return redirect()->route('medicamentos.index')->with('success', 'Medicamento eliminado.');
    }
}
