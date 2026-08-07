@extends('layouts.app')

@section('title', 'Listado de Tareas')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Tareas</h1>
        <a href="{{ route('tareas.create') }}" class="btn btn-primary">+ Nueva tarea</a>
    </div>

    <div class="card">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Título</th>
                        <th>Estado</th>
                        <th>Creada</th>
                        <th class="text-end">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($tareas as $tarea)
                        <tr>
                            <td>{{ $tarea->id }}</td>
                            <td>{{ $tarea->titulo }}</td>
                            <td>
                                @php
                                    $badge = [
                                        'pendiente' => 'secondary',
                                        'en_progreso' => 'warning',
                                        'completada' => 'success',
                                    ][$tarea->estado];
                                @endphp
                                <span class="badge bg-{{ $badge }}">
                                    {{ \App\Models\Tarea::ESTADOS[$tarea->estado] }}
                                </span>
                            </td>
                            <td>{{ $tarea->created_at->format('d/m/Y H:i') }}</td>
                            <td class="text-end">
                                <a href="{{ route('tareas.show', $tarea) }}" class="btn btn-sm btn-outline-secondary">Ver</a>
                                <a href="{{ route('tareas.edit', $tarea) }}" class="btn btn-sm btn-outline-primary">Editar</a>
                                <form action="{{ route('tareas.destroy', $tarea) }}" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar esta tarea?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">No hay tareas registradas todavía.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        {{ $tareas->links() }}
    </div>
@endsection
