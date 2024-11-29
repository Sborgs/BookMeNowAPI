<?php $__env->startSection('conteudo'); ?>
    <section id="secaoCategorias">
        <div class="secao-titulo">
            <div class="titulo">
                <h2>Categorias</h2>
                <a href="#">Ver mais ></a>
            </div>
            <p>Encontre Profissionais na Categoria Desejada</p>
        </div>

        <div class="lista-card-categorias owl-carousel owl-theme">
            <div class="item">
                <img src="<?php echo e(asset('img/categoria-carro.jpg')); ?>" alt="carro">
                <span>Mecânico</span>
            </div>
            <div class="item">
                <img src="<?php echo e(asset('img/categoria-carro.jpg')); ?>" alt="carro">
                <span>Mecânico</span>
            </div>
            <div class="item">
                <img src="<?php echo e(asset('img/categoria-carro.jpg')); ?>" alt="carro">
                <span>Mecânico</span>
            </div>
            <div class="item">
                <img src="<?php echo e(asset('img/categoria-carro.jpg')); ?>" alt="carro">
                <span>Mecânico</span>
            </div>
            <div class="item">
                <img src="<?php echo e(asset('img/categoria-carro.jpg')); ?>" alt="carro">
                <span>Mecânico</span>
            </div>
            <div class="item">
                <img src="<?php echo e(asset('img/categoria-carro.jpg')); ?>" alt="carro">
                <span>Mecânico</span>
            </div>
        </div>

    </section>

    <section id="secaoServicos">
        <div class="secao-titulo">
            <div class="titulo">
                <h2>Serviços Populares</h2>
                <a href="#">Ver mais ></a>
            </div>
            <p>Descubra nossos serviços mais populares</p>
        </div>

        <div class="lista-card-servicos">

            <?php $__currentLoopData = $servicos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servico): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <!-- Inicio Card Serviços -->
                <div class="card-servicos">
                    <div class="card-foto">
                        <img src="<?php echo e(asset('img/categoria-informatica.jpg')); ?>" alt="Informatica">

                        <div class="card-foto-legenda">
                            <div class="card-foto-preco">
                                R$ <?php echo e(number_format($servico->valor, 2, ',')); ?>

                            </div>
                            <div class="card-foto-categoria">
                                Informática
                            </div>
                        </div>

                    </div>


                    <div class="card-descricao">

                        <div class="card-titulo">
                            <h3><?php echo e($servico->titulo); ?></h3>
                        </div>

                        <div class="card-avaliacao">
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            <i class="fa-solid fa-star"></i>
                            (5)
                        </div>


                        <div class="card-descricao-legenda">
                            <div class="card-descricao-telefone">
                                <i class="fa-solid fa-phone"></i>
                                <?php echo e($servico->telefone); ?>

                            </div>
                            <div class="card-descricao.localizacao">
                                <?php echo e($servico->cidade); ?>

                                <i class="fa-solid fa-location-dot"></i>

                            </div>
                        </div>
                    </div>

                </div>
                <!-- Fim Card Serviços -->
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.site', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\bookmenowapi\resources\views/home.blade.php ENDPATH**/ ?>