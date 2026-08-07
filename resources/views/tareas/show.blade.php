@extends('layouts.app')

@section('title', 'Detalle de Tarea')

@section('content')
    <h1 class="h3 mb-3">Tarea #{{ $tarea->id }}</h1>

    <div class="card">
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-3">Título</dt>
                <dd class="col-sm-9">{{ $tarea->titulo }}</dd>

                <dt class="col-sm-3">Descripción</dt>
                <dd class="col-sm-9">{{ $tarea->descripcion ?: '—' }}</dd>

                <dt class="col-sm-3">Estado</dt>
                <dd class="col-sm-9">{{ \App\Models\Tarea::ESTADOS[$tarea->estado] }}</dd>

                <dt class="col-sm-3">Creada</dt>
                <dd class="col-sm-9">{{ $tarea->created_at->format('d/m/Y H:i') }}</dd>

                <dt class="col-sm-3">Actualizada</dt>
                <dd class="col-sm-9">{{ $tarea->updated_at->format('d/m/Y H:i') }}</dd>
            </dl>
        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('tareas.edit', $tarea) }}" class="btn btn-primary">Editar</a>
        <a href="{{ route('tareas.index') }}" class="btn btn-outline-secondary">Volver al listado</a>
    </div>
@endsection
