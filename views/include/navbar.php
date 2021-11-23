<nav class="navbar navbar-light bg-dark">
    <div class="container" style='height: 96px;'>
        <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <td width="15%" valign="middle">
                    <a class="navbar-brand" href="index.php">
                        <img src="<?= url('assets/pref_' . strtolower(str_replace(' ', '_', $configuracoes->cidade)) . "/img/{$configuracoes->brasao_nfe}") ?>" alt="" width="64" height="64" class="d-inline-block align-text-top">
                    </a>
                </td>
                <td width="85%">
                    <p class="prefeituraTitulo" style="margin-top: auto; margin-bottom: auto; color: white; font-size: medium;">
                        <b style="font-size: small;"><?= strtoupper("Prefeitura Municipal de ") . $configuracoes->cidade ?></b><br>
                        <b style="font-size: medium;"><?= $configuracoes->secretaria ?></b>
                    </p>
                </td>
            </tr>
        </table>
    </div>
</nav>