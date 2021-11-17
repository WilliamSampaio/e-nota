<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?= $title ?></title>

<link href="<?= url('assets/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">

<link href="<?= url('assets/font-awesome/css/all.css') ?>" rel="stylesheet">

<link rel="icon" type="image/png" href="<?= url('assets/img/' . $configuracoes->brasao_nfe) ?>">

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