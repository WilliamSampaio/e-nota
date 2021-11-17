<?php $this->layout('site-tema') ?>

<?php $this->start('header') ?>
<?php $this->insert('include/header', ['title' => $title, 'configuracoes' => $configuracoes]) ?>
<?php $this->end() ?>

<?php $this->start('navbar') ?>
<?php $this->insert('include/navbar', ['configuracoes' => $configuracoes]) ?>
<?php $this->end() ?>

<?php $this->start('menu') ?>
<?php $this->insert('include/menu') ?>
<?php $this->end() ?>

<?php $this->start('footer') ?>
<?php $this->insert('include/footer') ?>
<?php $this->end() ?>

<?php $this->start('scripts') ?>
<?php $this->insert('include/scripts') ?>
<?php $this->end() ?>

<nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= url('site') ?>">Início</a></li>
        <li class="breadcrumb-item active" aria-current="page">Notícias</li>
    </ol>
</nav>
<br>
<h1>Notícias</h1>
<h5 class="card-title">Fique por dentro das novidades sobre o e-Nota</h5>
<hr><br>

<!-- ITENS -->
<div class="row text-center">

    <?php if ($noticias > 0) : ?>

        <div class="accordion" id="accordionExample">

            <?php foreach ($noticias as $noticia) : ?>

                <div class="accordion-item" style="text-align: justify;">
                    <h2 class="accordion-header" id="headingOne-<?= $noticia->id ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-<?= $noticia->id ?>" aria-expanded="true" aria-controls="collapseOne-<?= $noticia->id ?>">
                            <?= date("d-m-Y", strtotime($noticia->data_criacao)) . ' - ' . $noticia->titulo ?>
                        </button>
                    </h2>
                    <div id="collapseOne-<?= $noticia->id ?>" class="accordion-collapse collapse" aria-labelledby="headingOne-<?= $noticia->id ?>" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h4><?= $noticia->titulo ?></h4>
                            <p><?= $noticia->texto ?></p>
                            <p>
                                <?= 'Prefeitura Municipal De ' . ucwords(strtolower($configuracoes->cidade)) . ' | ' . date("d-m-Y", strtotime($noticia->data_criacao)) ?>
                            </p>
                        </div>
                    </div>
                </div>

            <?php endforeach ?>

        </div>

    <?php else : ?>

        <div class="col-12">
            <div class="alert alert-danger" role="alert">
                <p>Não há nenhuma notícia publicada.</p>
            </div>
        </div>

    <?php endif ?>

</div>