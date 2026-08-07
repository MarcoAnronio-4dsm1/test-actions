@extends('layouts.app')

@section('title', 'Editar Tarea')

@section('content')
    <h1 class="h3 mb-3">Editar tarea #{{ $tarea->id }}</h1>

    <div class="card">
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('tareas.update', $tarea) }}" method="POST">
                @csrf
                @method('PUT')
                @include('tareas._form')

                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('tareas.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            </form>
        </div>
    </div>
@endsection
