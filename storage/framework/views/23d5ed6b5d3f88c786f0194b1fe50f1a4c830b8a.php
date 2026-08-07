<?php $__env->startSection('title', 'Nueva Tarea'); ?>

<?php $__env->startSection('content'); ?>
    <h1 class="h3 mb-3">Nueva tarea</h1>

    <div class="card">
        <div class="card-body">
            <?php if($errors->any()): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('tareas.store')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo $__env->make('tareas._form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="<?php echo e(route('tareas.index')); ?>" class="btn btn-outline-secondary">Cancelar</a>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\marco\Downloads\laravel-crud-demo\resources\views/tareas/create.blade.php ENDPATH**/ ?>