<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= $title ?></title>

    <link href="../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../vendor/components/font-awesome/css/all.css" rel="stylesheet">

    <link rel="icon" type="image/png" href="<?php echo url('/assets/img/' . $configuracoes->brasao_nfe) ?>">

    <style>
        body {
            background-color: lightgray;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        footer {
            margin-top: auto;
        }
    </style>

    <script src="../vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</head>

<body>
    <?= $this->section('navbar') ?>
    <?= $this->section('content') ?>
    <?= $this->section('footer') ?>
</body>

</html>