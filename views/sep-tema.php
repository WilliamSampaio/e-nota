<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?= $this->section('header') ?>
</head>

<body>
    <?= $this->section('navbar') ?>

    <div class="container" style="background-color: rgba(255, 255, 255, 0.5);">
        <div class="row align-items-center" style="padding-top: 32px;">

            <!-- CONTEÚDO -->
            <?= $this->section('content') ?>

        </div>
        <br>
        <br>
        <br>
    </div>

    <?= $this->section('scripts') ?>
</body>

</html>