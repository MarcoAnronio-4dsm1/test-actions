<?php $__env->startSection('title', 'Listado de Tareas'); ?>

<?php $__env->startSection('content'); ?>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="h3 mb-0">Tareas</h1>
        <a href="<?php echo e(route('tareas.create')); ?>" class="btn btn-primary">+ Nueva tarea</a>
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
                    <?php $__empty_1 = true; $__currentLoopData = $tareas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tarea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td><?php echo e($tarea->id); ?></td>
                            <td><?php echo e($tarea->titulo); ?></td>
                            <td>
                                <?php
                                    $badge = [
                                        'pendiente' => 'secondary',
                                        'en_progreso' => 'warning',
                                        'completada' => 'success',
                                    ][$tarea->estado];
                                ?>
                                <span class="badge bg-<?php echo e($badge); ?>">
                                    <?php echo e(\App\Models\Tarea::ESTADOS[$tarea->estado]); ?>

                                </span>
                            </td>
                            <td><?php echo e($tarea->created_at->format('d/m/Y H:i')); ?></td>
                            <td class="text-end">
                                <a href="<?php echo e(route('tareas.show', $tarea)); ?>" class="btn btn-sm btn-outline-secondary">Ver</a>
                                <a href="<?php echo e(route('tareas.edit', $tarea)); ?>" class="btn btn-sm btn-outline-primary">Editar</a>
                                <form action="<?php echo e(route('tareas.destroy', $tarea)); ?>" method="POST" class="d-inline" onsubmit="return confirm('¿Eliminar esta tarea?');">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">No hay tareas registradas todavía.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-3">
        <?php echo e($tareas->links()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\marco\Downloads\laravel-crud-demo\resources\views/tareas/index.blade.php ENDPATH**/ ?>