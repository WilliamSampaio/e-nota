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
        <li class="breadcrumb-item active" aria-current="page">Legislação</li>
    </ol>
</nav>

<br>
<h1>Legislação</h1>
<h5 class="card-title">Conheça o embasamento legal e jurídico</h5>
<hr><br>

<!-- ITENS -->
<div class="row">
    <div class="col-12">
        <div class="alert alert-success" role="alert">
            <p>Você pode visualizar os manuais fazendo o download dos arquivos em formato PDF.</p>
        </div>
    </div>
</div>

<div class="row">

    <?php if ($legislacao > 0) : ?>

        <div class="accordion" id="accordionExample">

            <?php

            foreach ($legislacao as $leg) :

            ?>

                <div class="accordion-item" style="text-align: justify;">
                    <h2 class="accordion-header" id="headingOne-<?= $leg->id ?>">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne-<?= $leg->id ?>" aria-expanded="true" aria-controls="collapseOne-<?= $leg->id ?>">
                            <?= date("d-m-Y", strtotime($leg->data_criacao)) . ' - ' . $leg->titulo;
                            ?>
                        </button>
                    </h2>
                    <div id="collapseOne-<?= $leg->id ?>" class="accordion-collapse collapse" aria-labelledby="headingOne-<?= $leg->id ?>" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            <h4><?= $leg->titulo ?></h4>
                            <p><?= $leg->texto ?></p>
                            <p>
                                <i class="fas fa-file-pdf fa-2x" style="color: darkred;"></i>
                                <?= date("d-m-Y", strtotime($leg->data_criacao)) . ' | ' ?>
                                <a href="<?= url('assets/pref_' . strtolower(str_replace(' ', '_', $configuracoes->cidade)) . "/doc/{$leg->arquivo}") ?>" target="_blank"> [Download] </a>
                            </p>
                        </div>
                    </div>
                </div>

            <?php

            /*
                $count++;
            } // fim while*/

            endforeach

            ?>

        </div>

    <?php else : ?>

        <div class="col-12">
            <div class="alert alert-danger" role="alert">
                <p>Não há nenhuma lei cadastrada.</p>
            </div>
        </div>

    <?php endif ?>

</div>