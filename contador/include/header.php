<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>e-Nota</title>

    <link rel="stylesheet" href="../../css/lightbox.css" type="text/css" media="screen" />
    <!-- <link rel="stylesheet" href="../../css/padrao_site.css" type="text/css" /> -->

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="icon" type="image/png" href="../../img/brasoes/<?php echo isTenancyAppBySubdomain() . rawurlencode($CONF_BRASAO) ?>">

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