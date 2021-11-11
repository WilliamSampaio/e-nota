<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?= $title ?></title>

    <link href="../../vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="../../vendor/components/font-awesome/css/all.css" rel="stylesheet">

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
</head>