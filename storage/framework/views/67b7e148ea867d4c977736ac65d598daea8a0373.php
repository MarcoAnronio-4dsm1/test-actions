<div class="mb-3">
    <label for="titulo" class="form-label">Título</label>
    <input type="text" name="titulo" id="titulo" class="form-control"
           value="<?php echo e(old('titulo', $tarea->titulo ?? '')); ?>" required maxlength="255">
</div>

<div class="mb-3">
    <label for="descripcion" class="form-label">Descripción</label>
    <textarea name="descripcion" id="descripcion" class="form-control" rows="4"><?php echo e(old('descripcion', $tarea->descripcion ?? '')); ?></textarea>
</div>

<div class="mb-3">
    <label for="estado" class="form-label">Estado</label>
    <select name="estado" id="estado" class="form-select">
        <?php $__currentLoopData = \App\Models\Tarea::ESTADOS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value => $label): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($value); ?>" @selected(old('estado', $tarea->estado ?? 'pendiente') === $value)>
                <?php echo e($label); ?>

            </option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<?php /**PATH C:\Users\marco\Downloads\laravel-crud-demo\resources\views/tareas/_form.blade.php ENDPATH**/ ?>