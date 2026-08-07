<?php $__env->startSection('title', 'Detalle de Tarea'); ?>

<?php $__env->startSection('content'); ?>
    <h1 class="h3 mb-3">Tarea #<?php echo e($tarea->id); ?></h1>

    <div class="card">
        <div class="card-body">
            <dl class="row mb-0">
                <dt class="col-sm-3">Título</dt>
                <dd class="col-sm-9"><?php echo e($tarea->titulo); ?></dd>

                <dt class="col-sm-3">Descripción</dt>
                <dd class="col-sm-9"><?php echo e($tarea->descripcion ?: '—'); ?></dd>

                <dt class="col-sm-3">Estado</dt>
                <dd class="col-sm-9"><?php echo e(\App\Models\Tarea::ESTADOS[$tarea->estado]); ?></dd>

                <dt class="col-sm-3">Creada</dt>
                <dd class="col-sm-9"><?php echo e($tarea->created_at->format('d/m/Y H:i')); ?></dd>

                <dt class="col-sm-3">Actualizada</dt>
                <dd class="col-sm-9"><?php echo e($tarea->updated_at->format('d/m/Y H:i')); ?></dd>
            </dl>
        </div>
    </div>

    <div class="mt-3">
        <a href="<?php echo e(route('tareas.edit', $tarea)); ?>" class="btn btn-primary">Editar</a>
        <a href="<?php echo e(route('tareas.index')); ?>" class="btn btn-outline-secondary">Volver al listado</a>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\marco\Downloads\laravel-crud-demo\resources\views/tareas/show.blade.php ENDPATH**/ ?>