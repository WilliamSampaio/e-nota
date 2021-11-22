<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?= $this->section('header') ?>
</head>

<body>
    <?= $this->section('navbar') ?>

    <div class="container bg-light">
        <div class="row align-items-start">

            <!-- MENU -->
            <div class="col-sm-12 col-md-3 col-lg-3">
                <?= $this->section('menu') ?>

            </div>

            <!-- CONTEÚDO -->
            <div class="col-sm-12 col-md-9 col-lg-9">
                <?= $this->section('content') ?>
            </div>
            
        </div>
        <br>
        <br>
        <br>
    </div>

    <?= $this->section('scripts') ?>
</body>

</html>