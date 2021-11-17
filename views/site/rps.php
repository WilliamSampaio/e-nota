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
        <li class="breadcrumb-item active" aria-current="page">Recibo Provisório de serviço (RPS)</li>
    </ol>
</nav>

<br>
<h1>Recibo Provisório de serviço (RPS)</h1>
<h5 class="card-title">RPS é o documento que deverá ser usado por emitentes da NF-e no eventual impedimento da emissão "online da NFe"</h5>
<hr><br>

<h3>Como funciona?</h3>
<hr>

<p>Também poderá ser utilizado pelos prestadores sujeitos à emissão de grande quantidade de NF-e (exemplo: estacionamentos). Nesse caso, o prestador emitirá o RPS para cada transação e providenciará sua conversão em NF-e mediante o envio de arquivos (processamento em lote).</p>
<p>Para maior esclarecimento ou solucionar possíveis dúvidas acesse o link Perguntas e Respostas, <a href="<?= url('site/faq') ?>">clique aqui</a>.
</p>

<h3>Modelo de RPS</h3>
<hr>

<p>Se você, ou sua empresa, não possui sistema que emita documento que possa ser utilizado como RPS, é possível baixar o modelo e utilizar como RPS da sua prestação de serviços.</p>
<p>
    <!-- <a href="rps/modelo.pdf" target="_blank"><img src="../img/pdf.jpg" title="Download do pdf" /></a> -->Basta aces sar o perfil do prestador de serviço e o menu "RPS".
</p>