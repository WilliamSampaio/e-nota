<?php
/*
COPYRIGHT 2008 - 2010 DO PORTAL PUBLICO INFORMATICA LTDA

Este arquivo e parte do programa E-ISS / SEP-ISS

O E-ISS / SEP-ISS e um software livre; voce pode redistribui-lo e/ou modifica-lo
dentro dos termos da Licenca Publica Geral GNU como publicada pela Fundacao do
Software Livre - FSF; na versao 2 da Licenca

Este sistema e distribuido na esperanca de ser util, mas SEM NENHUMA GARANTIA,
sem uma garantia implicita de ADEQUACAO a qualquer MERCADO ou APLICACAO EM PARTICULAR
Veja a Licenca Publica Geral GNU/GPL em portugues para maiores detalhes

Voce deve ter recebido uma copia da Licenca Publica Geral GNU, sob o titulo LICENCA.txt,
junto com este sistema, se nao, acesse o Portal do Software Publico Brasileiro no endereco
www.softwarepublico.gov.br, ou escreva para a Fundacao do Software Livre Inc., 51 Franklin St,
Fith Floor, Boston, MA 02110-1301, USA
*/
?>
<?php

require_once '../autoload.php';
require_once DIR_SITE . 'include/header.php';

?>

<body>

    <?php require_once DIR_SITE . 'include/navbar.php' ?>

    <div class="container bg-light">
        <div class="row align-items-start">
            <!-- MENU -->
            <div class="col-3 col-xl-3">
                <?php require_once DIR_SITE . 'include/menu.php' ?>
            </div>

            <!-- CONTEÚDO -->
            <div class="col-sm-12 col-xl-9">
                <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Início</a></li>
                        <li class="breadcrumb-item"><a href="prestadores.php">Prestadores</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Cadastro</li>
                    </ol>
                </nav>

                <br>
                <h1>Prestadores</h1>
                <h5 class="card-title">Área destinada aos <strong>Prestadores de Serviços</strong> para acesso ao sistema de emissão e cadastro</h5>
                <hr><br>

                <h2>Cadastro de Prestadores</h2>
                <hr><br>

                <?php

                /*$sql = $PDO->query("SELECT cidade, estado FROM configuracoes");
                list($CIDADE, $UF) = $sql->fetch();*/

                ?>

                <!-- Formulário de inserção de empresa -->
                <p><strong>Prezado Contribuinte</strong></p>
                <p>A nossa Prefeitura Municipal vem empreendendo esforços para aprimorar continuamente a qualidade dos serviços oferecidos aos contribuintes. Neste sentido, a internet apresenta-se como um importante instrumento capaz de atende-los com agilidade e segurança.</p>
                <p>E por falar em segurança, o contribuinte deverá cadastrar uma senha individual que permitirá o acesso à área restrita, de seu exclusivo interesse, no endereço eletrônico da Prefeitura.</p>
                <p>A senha cadastrada é intransferível e configura a assinatura eletrônica da pessoa física ou jurídica que a cadastrou.</p>
                <p><strong>ALERTAMOS QUE CABERÁ EXCLUSIVAMENTE AO CONTRIBUINTE TODA RESPONSABILIDADE DECORRENTE DO USO INDEVIDO DA SENHA, QUE DEVERÁ SER GUARDADA EM TOTAL SEGURANÇA.</strong></p>

                <!--action="inc/prestadores/inserir.php"-->
                <form action="inc/prestadores/inserir.php" method="post" name="frmCadastroEmpresa" id="frmCadastroEmpresa">

                    <div class="mb-3">
                        <label for="txtInsNomeEmpresa">Nome<strong style="color: red;">*</strong></label>
                        <input type="text" size="60" maxlength="100" name="txtInsNomeEmpresa" id="txtInsNomeEmpresa" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="txtInsRazaoSocial">Razão Social<strong style="color: red;">*</strong></label>
                        <input type="text" size="60" maxlength="100" name="txtInsRazaoSocial" id="txtInsRazaoSocial" class="form-control" required>
                    </div>

                    <!-- alterna input cpf/cnpj-->
                    <div class="mb-3">
                        <label for="txtCNPJ">CNPJ/CPF<strong style="color: red;">*</strong></label>
                        <input type="text" size="20" maxlength="18" name="txtCNPJ" id="txtCNPJ" class="form-control" onblur="ValidaCNPJ(this,'spanprestador');desabilitaSN(this,'txtSimplesNacional','ftDesc')" required>
                    </div>
                    <!-- alterna input cpf/cnpj FIM-->

                    <div class="mb-3">
                        <label for="txtLogradouro">Logradouro<strong style="color: red;">*</strong></label>
                        <input type="text" size="40" maxlength="100" name="txtLogradouro" id="txtLogradouro" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-2 col-lg-2">
                            <div class="mb-3">
                                <label for="txtNumero">Número<strong style="color: red;">*</strong></label>
                                <input type="text" size="10" maxlength="10" name="txtNumero" id="txtNumero" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-10 col-lg-10">
                            <div class="mb-3">
                                <label for="txtCEP">Complemento<strong style="color: red;">*</strong></label>
                                <input type="text" size="10" maxlength="10" name="txtComplemento" id="txtComplemento" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-9 col-lg-9">
                            <div class="mb-3">
                                <label for="txtBairro">Bairro<strong style="color: red;">*</strong></label>
                                <input type="text" size="30" maxlength="100" name="txtBairro" id="txtBairro" class="form-control" required>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-3 col-lg-3">
                            <div class="mb-3">
                                <label for="txtCEP">CEP<strong style="color: red;">*</strong></label>
                                <input type="text" size="10" maxlength="9" name="txtCEP" id="txtCEP" class="form-control" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="txtFoneComercial">Telefone Comercial<strong style="color: red;">*</strong></label>
                                <input type="text" class="form-control" size="20" maxlength="15" name="txtFoneComercial" id="txtFoneComercial" required>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="txtFoneCelular">Telefone Celular</label>
                                <input type="text" class="form-control" size="20" maxlength="15" name="txtFoneCelular" id="txtFoneCelular">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="txtInsUfEmpresa">Estado<strong style="color: red;">*</strong></label>
                                <select class="form-select" name="txtInsUfEmpresa" id="txtInsUfEmpresa" onchange="buscarMunicipios(this.value, 'txtInsMunicipioEmpresa')" required>
                                    <option value="" selected></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="txtInsMunicipioEmpresa">Município<strong style="color: red;">*</strong></label>
                                <select class="form-select" name="txtInsMunicipioEmpresa" id="txtInsMunicipioEmpresa" required></select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="txtInsInscMunicipalEmpresa">Insc. Municipal<strong style="color: red;">*</strong></label>
                                <input type="text" size="20" maxlength="20" name="txtInsInscMunicipalEmpresa" id="txtInsInscMunicipalEmpresa" class="form-control">
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="txtInsInscEstadualEmpresa">Insc. Estadual<strong style="color: red;">*</strong></label>
                                <input type="text" size="20" maxlength="20" name="txtInsInscEstadualEmpresa" id="txtInsInscEstadualEmpresa" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="txtPispasep">PIS/PASEP</label>
                        <input type="text" size="20" maxlength="20" name="txtPispasep" id="txtPispasep" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="txtInsEmailEmpresa">Email</label>
                        <input type="email" size="30" maxlength="100" name="txtInsEmailEmpresa" id="txtInsEmailEmpresa" class="form-control" required>
                    </div>

                    <div class="row">
                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="txtSenha">Senha<strong style="color: red;">*</strong></label>
                                <input type="password" size="18" maxlength="18" name="txtSenha" id="txtSenha" class="form-control" onkeyup="verificaForca(this)" required>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6 col-lg-6">
                            <div class="mb-3">
                                <label for="txtSenhaConf">Confirmar senha<strong style="color: red;">*</strong></label>
                                <input type="password" size="18" maxlength="18" name="txtSenhaConf" id="txtSenhaConf" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="S" name="txtSimplesNacional" id="txtSimplesNacional">
                        <label class="form-check-label" for="txtSimplesNacional">
                            Esta empresa está enquadrada no Simples Nacional, conforme Lei Complementar n° 123/2006
                        </label>
                    </div>

                    <br>

                    <div class="mb-3">
                        <input type="button" value="Adicionar Responsável/Sócio" name="btAddSocio" class="btn btn-primary" onclick="incluirSocio()" />
                        <strong style="color: red;">*</strong>
                    </div>

                    <div class="table-responsive">
                        <table>
                            <?php require_once 'include/cadastro_socios.php' ?>
                        </table>
                    </div>

                    <br>

                    <div class="mb-3">
                        <input type="button" value="Adicionar Serviços" name="btAddServicos" class="btn btn-primary" onclick="incluirServico()" />
                        <strong style="color: red;">*</strong>
                    </div>

                    <div class="table-responsive">
                        <table>
                            <?php require_once 'include/cadastro_servicos.php' ?>
                        </table>
                    </div>

                    <br>
                    <hr>
                    <div class="mb-3">
                        <input type="submit" value="Cadastrar" name="btCadastrar" class="btn btn-primary" onclick="return (ConfereCNPJ(this)) && (ValidaSenha('txtSenha','txtSenhaConf') && (ValidaFormulario('txtInsNomeEmpresa|txtInsRazaoSocial|txtCNPJ|txtLogradouro|txtNumero|txtBairro|txtCEP|txtFoneComercial|txtInsUfEmpresa|txtInsMunicipioEmpresa|txtInsEmailEmpresa|cmbCategoria1|txtNomeSocio1|txtCpfSocio1')))">
                    </div>
                    <hr>
                    <div id="help" class="form-text"><span style="font-weight: bold; color: red;">*</span> : Campos com preenchimento obrigatório.</div>
                </form>
            </div>
        </div>
        <br>
        <br>
        <br>
    </div>

    <?php require_once DIR_SITE . 'include/footer.php'; ?>

    <script>
        incluirSocio();
        incluirServico();

        function removeOptions(selectElement) {
            var i, L = selectElement.options.length - 1;
            for (i = L; i >= 0; i--) {
                selectElement.remove(i);
            }
        }

        function buscarEstados(uf) {
            url = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome';
            fetch(url)
                .then(res => res.json())
                .then((out) => {
                    out.forEach(
                        function(item, indice) {
                            opt = document.createElement('option');
                            opt.value = item.sigla;
                            opt.innerHTML = item.nome;
                            uf.appendChild(opt);
                        }
                    )
                })
                .catch(err => {
                    throw err
                });
        }

        function buscarMunicipios(uf, select_municipios_id) {
            municipios_select = document.getElementById(select_municipios_id);
            removeOptions(municipios_select);

            url = 'https://servicodados.ibge.gov.br/api/v1/localidades/estados/' + uf + '/municipios?orderBy=nome';

            fetch(url)
                .then(res => res.json())
                .then((out) => {
                    out.forEach(
                        function(item, indice) {
                            opt = document.createElement('option');
                            opt.value = item.nome;
                            opt.innerHTML = item.nome;
                            municipios_select.appendChild(opt);
                        }
                    )
                })
                .catch(err => {
                    throw err
                });
        }

        buscarEstados(document.getElementById('txtInsUfEmpresa'));
    </script>