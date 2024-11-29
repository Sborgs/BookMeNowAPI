<?php $__env->startSection('conteudo'); ?>
    <div class="d-flex justify-content-between mt-3">
        <h2>Lista de Usuarios</h2>
        <a href="<?php echo e(route('usuario.create')); ?>" class="btn btn-primary">Cadastrar</a>
    </div>
    <hr>

    <?php if(session('sucesso')): ?>
        <div class="alert alert-success">
            <?php echo e(session('sucesso')); ?>

        </div>
    <?php endif; ?>


    <?php if(session('error')): ?>
        <div class="alert alert-danger">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>

                <th>Nome</th>
                <th>E-mail</th>
                <th>Ação</th>
            </tr>
        </thead>
        <tbody>

            <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->id); ?></td>
                    <td><?php echo e($user->nome); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td>
                        <a href="<?php echo e(route('usuario.show', ['id' => $user->id])); ?>" class="btn btn-primary">Visualizar</a>
                        <a href="<?php echo e(route('usuario.edit', ['id' => $user->id])); ?>" class="btn btn-secondary">Editar</a>

                        <form action="<?php echo e(route('usuario.destroy', ['id' => $user->id])); ?>" method="post"
                            style="display: inline-block">

                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>

                            <button type="submit" class="btn btn-danger">Excluir</button>

                        </form>



                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\bookmenowapi\resources\views/admin/usuarios/index.blade.php ENDPATH**/ ?>