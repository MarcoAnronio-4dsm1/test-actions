<div class="mb-3">
    <label for="titulo" class="form-label">Título</label>
    <input type="text" name="titulo" id="titulo" class="form-control"
           value="{{ old('titulo', $tarea->titulo ?? '') }}" required maxlength="255">
</div>

<div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <textarea name="descripcion" id="descripcion" class="form-control" rows="4">{{ old('descripcion', $tarea->descripcion ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="estado" class="form-label">Estado</label>
    <select name="estado" id="estado" class="form-select">
        @foreach (\App\Models\Tarea::ESTADOS as $value => $label)
            <option value="{{ $value }}" @selected(old('estado', $tarea->estado ?? 'pendiente') === $value)>
                {{ $label }}
            </option>
        @endforeach
    </select>
</div>
