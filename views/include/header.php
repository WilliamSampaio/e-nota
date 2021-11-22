<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title><?= $title ?></title>

<link href="<?= url('assets/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">

<link href="<?= url('assets/font-awesome/css/all.css') ?>" rel="stylesheet">

<!-- folha de estilo que se aplica a todas as prefeituras -->
<link href="<?= url('assets/css/main-style.css') ?>" rel="stylesheet">

<!-- folha de estilo referente a prefeitura -->
<link href="<?= url('assets/pref_' . strtolower(str_replace(' ', '_', $configuracoes->cidade)) . '/style.css') ?>" rel="stylesheet">

<link rel="icon" type="image/png" href="<?= url('assets/pref_' . strtolower(str_replace(' ', '_', $configuracoes->cidade)) . "/img/{$configuracoes->brasao_nfe}") ?>">