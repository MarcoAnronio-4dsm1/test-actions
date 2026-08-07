<?php

namespace App\Http\Controllers;

use App\Models\Tarea;
use Illuminate\Http\Request;

class TareaController extends Controller
{
    /**
     * Mostrar listado de tareas.
     */
    public function index()
    {
        $tareas = Tarea::latest()->paginate(10);

        return view('tareas.index', compact('tareas'));
    }

    /**
     * Mostrar formulario de creación.
     */
    public function create()
    {
        return view('tareas.create');
    }

    /**
     * Guardar una nueva tarea.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'estado' => 'required|in:pendiente,en_progreso,completada',
        ]);

        Tarea::create($validated);

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea creada correctamente.');
    }

    /**
     * Mostrar el detalle de una tarea.
     */
    public function show(Tarea $tarea)
    {
        return view('tareas.show', compact('tarea'));
    }

    /**
     * Mostrar formulario de edición.
     */
    public function edit(Tarea $tarea)
    {
        return view('tareas.edit', compact('tarea'));
    }

    /**
     * Actualizar una tarea existente.
     */
    public function update(Request $request, Tarea $tarea)
    {
        $validated = $request->validate([
            'titulo' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'estado' => 'required|in:pendiente,en_progreso,completada',
        ]);

        $tarea->update($validated);

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea actualizada correctamente.');
    }

    /**
     * Eliminar una tarea.
     */
    public function destroy(Tarea $tarea)
    {
        $tarea->delete();

        return redirect()->route('tareas.index')
            ->with('success', 'Tarea eliminada correctamente.');
    }
}
