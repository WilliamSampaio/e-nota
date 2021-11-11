<?php $this->layout('_tema') ?>

<nav class="navbar navbar-light bg-dark">
    <div class="container" style='height: 96px;'>
        <table width="100%" cellspacing="0" cellpadding="0">
            <tr>
                <td width="15%" valign="middle">
                    <a class="navbar-brand" href="index.php">
                        <img src="<?php echo url('assets/img/' . $configuracoes->brasao_nfe) ?>" alt="" width="64" height="64" class="d-inline-block align-text-top">
                    </a>
                </td>
                <td width="85%">
                    <p class="prefeituraTitulo" style="margin-top: auto; margin-bottom: auto; color: white; font-size: medium;">
                        <b style="font-size: small;"><?php echo strtoupper("Prefeitura Municipal de ") . $configuracoes->cidade ?></b><br>
                        <b style="font-size: medium;"><?php echo $configuracoes->secretaria ?></b>
                    </p>
                </td>
            </tr>
        </table>
    </div>
</nav>