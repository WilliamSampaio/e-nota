<?php $this->layout('_tema') ?>

<?php //include __DIR__ . '/../include/navbar.php' ?>

<div class="container bg-light content">
    <div class="row align-items-start">
        <!-- MENU -->
        <div class="col-sm-12 col-md-3 col-lg-3">
            <?php //include __DIR__ . '/../include/menu.php' ?>
        </div>

        <!-- CONTEÚDO -->
        <div class="col-sm-12 col-md-9 col-lg-9">

            <br>
            <h1>e-Nota</h1>
            <h5 class="card-title">Documento emitido e armazenado eletronicamente com o objetivo de registrar as operações de prestação de serviços e será utilizada em substituição às notas fiscais de serviços convencionais.</h5>
            <hr><br>

            <!-- ITENS -->
            <div class="row">

                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Como funciona?</h5>
                            <p class="card-text">Clique e veja o funcionamento da NF eletrônica de ISS.</p>
                        </div>
                        <div class="card-footer">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                                Saiba mais!
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Como funciona?</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <img src="../img/como_funciona.jpg" class="img-fluid" alt="...">
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Emita sua NFe</h5>
                            <p class="card-text"> Acessa o sistema e emita suas Notas Fiscais Eletrônicas.</p>
                        </div>
                        <div class="card-footer">
                            <a type="button" href="prestadores.php" class="btn btn-primary">
                                Saiba mais!
                            </a>
                        </div>
                    </div>
                    <br>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Indicativos</h5>
                            <p class="card-text">Acesse e compare os números de aprovação da NFe de ISS.</p>
                        </div>
                        <div class="card-footer">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                Saiba mais!
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Indicativos</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <?php
                                            /*$sql_contribuintes = $PDO->query("SELECT COUNT(codigo) FROM cadastro WHERE estado = 'A'");
                                                list($empresas_ativas) = $sql_contribuintes->fetch();

                                                $sql_nfeemididas = $PDO->query("SELECT COUNT(codigo) FROM notas");
                                                list($notas_emitidas) = $sql_nfeemididas->fetch();*/
                                            ?>

                                            <p>Contribuintes autorizados à emissão de NFe:
                                                <span style="color: red; font-weight: bold;"><?php //echo $empresas_ativas 
                                                                                                ?></span>
                                            </p>

                                            <p>NFe já emitidas:
                                                <span style="color: red; font-weight: bold;"><?php //echo $notas_emitidas 
                                                                                                ?></span>
                                            </p>

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>

                <?php
                /*$sql = $PDO->query("SELECT ativar_creditos FROM configuracoes");
                    if ($sql->rowCount()) {
                        $ativar_creditos = $sql->fetch()[0];
                    } else {
                        $ativar_creditos = 'n';
                    }

                    if ($ativar_creditos == 's') {*/
                ?>

                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Autenticade de NF</h5>
                            <p class="card-text">Verifique a autenticidade da sua nota fiscal eletrônica.</p>
                        </div>
                        <div class="card-footer">
                            <a type="button" href="tomadores.php" class="btn btn-primary">
                                Saiba mais!
                            </a>
                        </div>
                    </div>
                    <br>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Publicidade</h5>
                            <p class="card-text">Veja o vídeo da campanha da NFeletrônica de ISS.</p>
                        </div>
                        <div class="card-footer">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal3">
                                Saiba mais!
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Publicidade</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Em breve!</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>

                <div class="col-sm-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Seus Créditos</h5>
                            <p class="card-text">Consulte seus créditos obtidos até o momento.</p>
                        </div>
                        <div class="card-footer">
                            <a type="button" href="tomadores.php" class="btn btn-primary">
                                Saiba mais!
                            </a>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
            <?php //} //fom if ativar_creditos 
            ?>
        </div>
    </div>
    <br>
    <br>
    <br>
</div>
<?php //include __DIR__ . '/../include/footer.php'; ?>