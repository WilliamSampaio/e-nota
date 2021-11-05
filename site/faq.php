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

require_once __DIR__.'/../autoload.php';
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
                        <li class="breadcrumb-item active" aria-current="page">Perguntas e Respostas</li>
                    </ol>
                </nav>

                <br>
                <h1>Perguntas e Respostas</h1>
                <h5 class="card-title">Tire suas dúvidas dentro das questões mais frequentes</h5>
                <hr><br>

                <div class="accordion" id="accordionExample">
                    <h2>01 – CONCEITOS</h2>
                    <hr>
                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-1">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-1" aria-expanded="true" aria-controls="c-1">
                                <strong>1.01. O que é Nota Fiscal Eletrônica de Serviços (NFS-e)?</strong>
                            </button>
                        </h3>
                        <div id="c-1" class="accordion-collapse collapse" aria-labelledby="h-1" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Nota Fiscal Eletrônica de Serviços (NFS-e) é o documento emitido e armazenado eletronicamente em sistema próprio da Prefeitura Municipal, com o objetivo de registrar as operações relativas à prestação de serviços. A NFS-e não deve ser confundida com a Nota Fiscal de ICMS, de responsabilidade do Governo Estadual, que registra operações relativas à circulação de mercadorias: supermercados, lojas, restaurantes etc.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-2">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-2" aria-expanded="true" aria-controls="c-2">
                                <strong>1.02. O que é Nota Fiscal Convencional?</strong>
                            </button>
                        </h3>
                        <div id="c-2" class="accordion-collapse collapse" aria-labelledby="h-2" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>É qualquer uma das notas fiscais de serviços emitidas na conformidade do que dispõem as leis já envigor. A nota fiscal convencional só poderá ser emitida por prestadores de serviços desobrigados a emissão de NFS-e até o dia 31 de dezembro de 2011. Veja no item 3.01 quais são os prestadores obrigados a emitir NFS-e.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-3">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-3" aria-expanded="true" aria-controls="c-3">
                                <strong>1.03. O que é Recibo Provisório de Serviços (RPS)?</strong>
                            </button>
                        </h3>
                        <div id="c-3" class="accordion-collapse collapse" aria-labelledby="h-3" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    É o documento que deverá ser usado por emitentes da NFS-e no eventual impedimento da emissão "online" da Nota. Nesse caso, o prestador emitirá o RPS para cada transação e providenciará sua conversão em NFS-e até o dia 20 do mês seguinte a sua emissão.</p>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="accordion" id="accordionExample">
                    <br>
                    <h2>02 - RECIBO PROVISÓRIO DE SERVIÇOS (RPS)</h2>
                    <hr>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-4">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-4" aria-expanded="true" aria-controls="c-4">
                                <strong>2.01. Como gerar o RPS?</strong>
                            </button>
                        </h3>
                        <div id="c-4" class="accordion-collapse collapse" aria-labelledby="h-4" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>
                                    Há modelo padrão para o RPS, ele deverá ser confeccionado ou impresso de acordo com o modelo disposto no perfil do prestador de serviço.
                                </p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-5">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-5" aria-expanded="true" aria-controls="c-5">
                                <strong>2.02. O RPS deve ser confeccionado por gráfica credenciada pela Prefeitura?</strong>
                            </button>
                        </h3>
                        <div id="c-5" class="accordion-collapse collapse" aria-labelledby="h-5" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Não há essa necessidade. O RPS poderá ser impresso no Sistema da NFS-e, sem a necessidade de solicitação da Autorização de Impressão de Documento Fiscal (AIDF). Porém, caso o contribuinte, opte pela impressão do RPS num estabelecimento gráfico, deverá solicitar AIDF.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-6">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-6" aria-expanded="true" aria-controls="c-6">
                                <strong>2.03. O RPS deve ter numeração seqüencial específica?</strong>
                            </button>
                        </h3>
                        <div id="c-6" class="accordion-collapse collapse" aria-labelledby="h-6" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Sim. O RPS deve ser numerado obrigatoriamente em ordem crescente seqüencial, a partir do número 1 (um). Para quem já é emitente de nota fiscal convencional, o RPS deverá manter a seqüência numérica do último documento fiscal emitido.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-7">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-7" aria-expanded="true" aria-controls="c-7">
                                <strong>2.04. O que fazer com as notas fiscais convencionais já confeccionadas?</strong>
                            </button>
                        </h3>
                        <div id="c-7" class="accordion-collapse collapse" aria-labelledby="h-7" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>As notas fiscais convencionais já confeccionadas poderão ser utilizadas até o dia 31 de dezembro de 2011. Após esta data os talonários utilizados durante o exercício de 2011 e os não utilizados deverão ser apresentados no Setor de Fiscalização de Tributos, da Secretaria Municipal de Planejamento e Finanças, que inutilizará as notas fiscais convencionais não utilizadas. Leia também o item 2.07. Se a opção for pela emissão "online" de NFS-e.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-8">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-8" aria-expanded="true" aria-controls="c-8">
                                <strong>2.04. O que fazer com as notas fiscais convencionais já confeccionadas?</strong>
                            </button>
                        </h3>
                        <div id="c-8" class="accordion-collapse collapse" aria-labelledby="h-8" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>As notas fiscais convencionais já confeccionadas poderão ser utilizadas até o dia 31 de dezembro de 2011. Após esta data os talonários utilizados durante o exercício de 2011 e os não utilizados deverão ser apresentados no Setor de Fiscalização de Tributos, da Secretaria Municipal de Planejamento e Finanças, que inutilizará as notas fiscais convencionais não utilizadas. Leia também o item 2.07. Se a opção for pela emissão "online" de NFS-e.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-9">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-9" aria-expanded="true" aria-controls="c-9">
                                <strong>2.05. Em quantas vias deve-se emitir o RPS?</strong>
                            </button>
                        </h3>
                        <div id="c-9" class="accordion-collapse collapse" aria-labelledby="h-9" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>O RPS deve ser emitido em duas vias. A 1ª será entregue ao tomador de serviços, ficando a 2ª em poder do prestador dos serviços. Os RPS convertidos, não convertidos ou cancelados devem ser guardados por cinco anos contados do dia 1º de janeiro do ano seguinte ao da emissão.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-10">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-10" aria-expanded="true" aria-controls="c-10">
                                <strong>2.06. É necessário converter o RPS ou a nota fiscal convencional por NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-10" class="accordion-collapse collapse" aria-labelledby="h-10" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Sim. Os RPS ou as notas fiscais convencionais emitidas perderão a validade, para todos os fins de direito, depois de transcorrido o prazo de conversão em NFS-e.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-11">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-11" aria-expanded="true" aria-controls="c-11">
                                <strong>2.07. Qual o prazo para converter o RPS ou a nota fiscal convencional por NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-11" class="accordion-collapse collapse" aria-labelledby="h-11" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Os RPS ou as notas fiscais convencionais deverão ser convertidas em NFS-e até o dia 20 do mês subsequente ao de sua emissão.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-12">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-12" aria-expanded="true" aria-controls="c-12">
                                <strong>2.08. O que acontece no caso de não conversão do RPS ou da nota fiscal convencional em NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-12" class="accordion-collapse collapse" aria-labelledby="h-12" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>A não-conversão do RPS ou da nota fiscal convencional em NFS-e equipara-se a não-emissão de documento fiscal e sujeitará o prestador de serviços às penalidades previstas na legislação.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-13">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-13" aria-expanded="true" aria-controls="c-13">
                                <strong>2.09. O que acontece no caso de conversão fora do prazo do RPS ou da nota fiscal convencional em NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-13" class="accordion-collapse collapse" aria-labelledby="h-13" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>A conversão fora do prazo do RPS ou da nota fiscal convencional em NFS-e sujeitará o prestador de serviços às penalidades previstas na legislação.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-14">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-14" aria-expanded="true" aria-controls="c-14">
                                <strong>2.10. É permitido o uso de notas fiscais convencionais conjugadas (mercadorias e serviços) no lugar do RPS?</strong>
                            </button>
                        </h3>
                        <div id="c-14" class="accordion-collapse collapse" aria-labelledby="h-14" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Não.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-15">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-15" aria-expanded="true" aria-controls="c-15">
                                <strong>2.11. É permitido o uso de cupons fiscais no lugar do RPS?</strong>
                            </button>
                        </h3>
                        <div id="c-15" class="accordion-collapse collapse" aria-labelledby="h-15" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Não.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-16">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-16" aria-expanded="true" aria-controls="c-16">
                                <strong>2.12. Qual o procedimento a ser adotado no caso de cancelamento de RPS antes da conversão em NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-16" class="accordion-collapse collapse" aria-labelledby="h-16" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>O contribuinte poderá:<br>
                                    1) Converter o RPS cancelado e cancelar a respectiva NFS-e; ou<br>
                                    2) Optar pela não conversão do RPS cancelado. Nesse caso, deverá manter em arquivo, por cinco anos, todas as vias do RPS com a indicação de "cancelado". Caso contrário, seu cancelamento não será considerado. O sistema da NFS-e controla a sequência numérica dos RPS convertidos.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-17">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-17" aria-expanded="true" aria-controls="c-17">
                                <strong>2.13. Como proceder no caso do prestador não converter o RPS em NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-17" class="accordion-collapse collapse" aria-labelledby="h-17" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Se o seu prestador não efetuar a conversão do Recibo Provisório de Serviços (RPS) em NFS-e informe o fato à Prefeitura Municipal da Cidade no campo "Reclamações" disponível no website da NFe da Cidade.</p>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="accordion" id="accordionExample">
                    <br>
                    <h2>03 - OBRIGATORIEDADE DE EMISSÃO DE NFS-e</h2>
                    <hr>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-18">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-18" aria-expanded="true" aria-controls="c-18">
                                <strong>3.01. Quem está obrigado à emissão da NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-18" class="accordion-collapse collapse" aria-labelledby="h-18" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p><strong>I - a contar do dia 1º de outubro de 2011:</strong> <br />
                                    a) as empresas enquadradas na categoria geral, ou que não são optantes pelo Simples Nacional; <br />
                                    b) as empresas mesmo que optantes do simples nacional que desenvolvam serviços dos itens da Lista de serviços:<br />
                                    1- no item 1 - Serviços de informática e congêneres;<br />
                                    2- no item 2 - Serviços de Pesquisa e Desenvolvimento de Qualquer Natureza; - <br />
                                    3- no item 17 - Serviço de apoio técnico, administrativo, jurídico, contábil, comercial e congêneres;<br />
                                    <br />
                                    <strong>II - a contar do dia 1º de janeiro de 2012, para os demais prestadores de serviços.</strong><br />
                                    <strong>III - O prestadores desobrigados também podem optar pela utilização de NFS-e. Leia o item 3.09.</strong></strong>
                                </p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-19">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-19" aria-expanded="true" aria-controls="c-19">
                                <strong>3.02. A partir de quando a emissão de NFS-e é obrigatória?</strong>
                            </button>
                        </h3>
                        <div id="c-19" class="accordion-collapse collapse" aria-labelledby="h-19" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Todos os contribuintes deverão obrigatoriamente emitir A NFS-e ou o RPS a partir de 1º de janeiro de 2012.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-20">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-20" aria-expanded="true" aria-controls="c-20">
                                <strong>3.03. Como devo apurar meu faturamento para saber se devo emitir a NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-20" class="accordion-collapse collapse" aria-labelledby="h-20" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="alert alert-danger">Não se aplica ao município de <?php echo $CONF_CIDADE . '.' ?></p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-21">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-21" aria-expanded="true" aria-controls="c-21">
                                <strong>3.04. Quem iniciou a atividade de prestação de serviços durante um determinado exercício (a partir de 2005) está obrigado à emissão de NFS-e no exercício seguinte?</strong>
                            </button>
                        </h3>
                        <div id="c-21" class="accordion-collapse collapse" aria-labelledby="h-21" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="alert alert-danger">Não se aplica ao município de <?php echo $CONF_CIDADE . '.' ?></p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-22">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-22" aria-expanded="true" aria-controls="c-22">
                                <strong>3.05. Como fica a obrigatoriedade de emissão de NFS-e, considerando a data de início de atividade de prestação de serviço?</strong>
                            </button>
                        </h3>
                        <div id="c-22" class="accordion-collapse collapse" aria-labelledby="h-22" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="alert alert-danger">Não se aplica ao município de <?php echo $CONF_CIDADE . '.' ?></p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-23">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-23" aria-expanded="true" aria-controls="c-23">
                                <strong>3.06. Se o prestador de serviços obrigado à emissão de NFS-e auferir, em determinado exercício, receita bruta de serviços inferior ao valor deteminado poderá voltar a emitir nota fiscal convencional?</strong>
                            </button>
                        </h3>
                        <div id="c-23" class="accordion-collapse collapse" aria-labelledby="h-23" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="alert alert-danger">Não se aplica ao município de <?php echo $CONF_CIDADE . '.' ?></p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-24">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-24" aria-expanded="true" aria-controls="c-24">
                                <strong>3.07. O contribuinte enquadrado em mais de um código de prestação de serviços deverá emitir NFS-e para todos os serviços?</strong>
                            </button>
                        </h3>
                        <div id="c-24" class="accordion-collapse collapse" aria-labelledby="h-24" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Sim. O contribuinte que emitir NFS-e deverá fazê-lo para todos os serviços prestados.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-25">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-25" aria-expanded="true" aria-controls="c-25">
                                <strong>3.08. O contribuinte enquadrado em mais de um código de prestação de serviços deverá obedecer ao cronograma de emissão de NFS-e para cada código de serviço?</strong>
                            </button>
                        </h3>
                        <div id="c-25" class="accordion-collapse collapse" aria-labelledby="h-25" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Não. Na hipótese do contribuinte se enquadrar em mais de um código de prestação de serviços, deverá adotar, para todos os códigos, a mesma data de início da NFS-e</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-26">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-26" aria-expanded="true" aria-controls="c-26">
                                <strong>3.09. Somente quem está obrigado poderá emitir NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-26" class="accordion-collapse collapse" aria-labelledby="h-26" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Não. Todos os prestadores de serviços inscritos no Cadastro de Emissor da NFS-e, desobrigados da emissão de NFS-e, poderão optar por sua emissão.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-27">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-27" aria-expanded="true" aria-controls="c-27">
                                <strong>3.10. A opção pela emissão de NFS-e depende de requerimento do interessado?</strong>
                            </button>
                        </h3>
                        <div id="c-27" class="accordion-collapse collapse" aria-labelledby="h-27" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Sim. A autorização para emissão de NFS-e deve ser solicitada através de requerimento conforme modelo estabelecido no Decreto de Regulamentação da NFS-e. A Secretaria Municipal de Planejamento e Finanças comunicará aos interessados, por "e-mail", a deliberação do pedido de autorização.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-28">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-28" aria-expanded="true" aria-controls="c-28">
                                <strong>3.11. A opção pela emissão de NFS-e, uma vez deferida, vigora a partir de quando?</strong>
                            </button>
                        </h3>
                        <div id="c-28" class="accordion-collapse collapse" aria-labelledby="h-28" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Os prestadores de serviços que optarem pela NFS-e iniciarão sua emissão no dia seguinte ao do deferimento da autorização, devendo converter em NFS-e todas as notas fiscais convencionais emitidas no respectivo mês.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-29">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-29" aria-expanded="true" aria-controls="c-29">
                                <strong>3.12. A partir de quando uma empresa recém-aberta, que opte pela utilização de NFS-e, pode emitir RPS ou utilizar NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-29" class="accordion-collapse collapse" aria-labelledby="h-29" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Uma empresa recém-aberta, que não disponha de blocos de notas fiscais convencionais, só poderá prestar serviços depois de obter a autorização para utilização de NFS-e. Não é possível a emissão de NFS-e, ou a substituição de RPS por NFS-e, com data anterior à data de autorização para utilizar NFS-e.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-30">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-30" aria-expanded="true" aria-controls="c-30">
                                <strong>3.13. O prestador de serviços, desobrigado da emissão de NFS-e, que optar pela NFS-e, poderá voltar a emitir nota fiscal convencional?</strong>
                            </button>
                        </h3>
                        <div id="c-30" class="accordion-collapse collapse" aria-labelledby="h-30" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Não. A opção pela emissão de NFS-e, uma vez deferida, é irretratável.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-31">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-31" aria-expanded="true" aria-controls="c-31">
                                <strong>3.14. Uma vez deferida a autorização para emissão de NFS-e, qual o prazo para substituir as notas fiscais convencionais emitidas até a data do deferimento da autorização?</strong>
                            </button>
                        </h3>
                        <div id="c-31" class="accordion-collapse collapse" aria-labelledby="h-31" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>As notas fiscais convencionais, emitidas a partir do primeiro dia do mês da autorização para utilização de NFS-e até a data do deferimento dessa autorização, devem ser substituídas até o dia 20 do mês subsequente ao deferimento. Consulte, também, o item 3.11.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-32">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-32" aria-expanded="true" aria-controls="c-32">
                                <strong>3.15. As entidades imunes ao ISS estão obrigadas à emissão da NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-32" class="accordion-collapse collapse" aria-labelledby="h-32" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>As entidades imunes ao ISS, enumeradas pelo art. 150, VI, da Constituição Federal, estão dispensadas da emissão de documento fiscal. No entanto, se optarem pela emissão de documento fiscal e se enquadrarem nas disposições lei, deverão se adequar às exigências da NFS-e. O sistema da NFS-e permite a seleção do tipo de tributação do serviço, que, no caso em questão, seria "imune". Nesse caso, não será gerado crédito para o tomador dos serviços.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-33">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-33" aria-expanded="true" aria-controls="c-33">
                                <strong>3.16. As entidades isentas do ISS estão obrigadas à emissão da NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-33" class="accordion-collapse collapse" aria-labelledby="h-33" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>As entidades isentas do ISS estão obrigadas à emissão de documento fiscal. Portanto, caso se enquadrem nas disposições da Lei, deverão se adequar às exigências da NFS-e. O sistema da NFS-e permite a seleção do tipo de tributação do serviço, que, no caso, seria "isento".</p>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="accordion" id="accordionExample">
                    <br>
                    <h2>04 - BENEFÍCIOS</h2>
                    <hr>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-34">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-34" aria-expanded="true" aria-controls="c-34">
                                <strong>4.01. Quais os benefícios para quem emite NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-34" class="accordion-collapse collapse" aria-labelledby="h-34" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Redução de custos de impressão e de armazenagem de documentos fiscais (a NFS-e é um documento emitido e armazenado eletronicamente em sistema próprio da Prefeitura); Dispensa de Autorização para Impressão de Documentos Fiscais (AIDF) para a NFS-e; Emissão de NFS-e por meio da internet; Geração automática da guia de recolhimento por meio da internet; Possibilidade de envio de NFS-e por e-mail; Maior eficiência no controle gerencial de emissão de NFS-e; Dispensa de lançamento das NFS-e na Declaração Eletrônica de Serviços (DES).</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-35">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-35" aria-expanded="true" aria-controls="c-35">
                                <strong>4.02. Quais os benefícios para quem recebe NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-35" class="accordion-collapse collapse" aria-labelledby="h-35" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p></strong>1. Geração automática da guia de recolhimento por meio da internet, no caso de responsável tributário; <br />
                                    2. Possibilidade de recebimento de NFS-e por e-mail; <br />
                                    3. Maior eficiência no controle gerencial de recebimento de NFS-e; <br />
                                    4. Dispensa de lançamento das NFS-e na Declaração Eletrônica de Serviços (DES).</p>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="accordion" id="accordionExample">
                    <br>
                    <h2>05 - EMISSÃO, CANCELAMENTO E RETIFICAÇÃO DE NFS-e</h2>
                    <hr>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-36">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-36" aria-expanded="true" aria-controls="c-36">
                                <strong>5.01. Como deve ser emitida a NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-36" class="accordion-collapse collapse" aria-labelledby="h-36" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>A NFS-e deve ser emitida "online", por meio da internet, no endereço eletrônico da Prefeitura Municipal, somente pelos prestadores de serviços estabelecidos no município, ou prestadores com sede em outros municípios que devam recolher ISSQN em Vera Cruz, mediante a utilização de senha.</p>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-37">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-37" aria-expanded="true" aria-controls="c-37">
                                <strong>5.02. O que fazer em caso de eventual impedimento da emissão "on line" da NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-37" class="accordion-collapse collapse" aria-labelledby="h-37" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>No caso de eventual impedimento da emissão "online" da NFS-e, o prestador de serviços emitirá RPS, registrando todos os dados que permitam sua substituição por NFS-e.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-38">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-38" aria-expanded="true" aria-controls="c-38">
                                <strong>5.03. É obrigatória a emissão de NFS-e "on line"?</strong>
                            </button>
                        </h3>
                        <div id="c-38" class="accordion-collapse collapse" aria-labelledby="h-38" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Não. Desde que o prestador não tenha equipamento ou acesso a internet. Assim, o prestador de serviços poderá emitir RPS a cada prestação de serviços, devendo, nesse caso, efetuar a sua conversão em NFS-e.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-39">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-39" aria-expanded="true" aria-controls="c-39">
                                <strong>5.04. Em quantas vias deve-se imprimir a NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-39" class="accordion-collapse collapse" aria-labelledby="h-39" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>A NFS-e deverá ser impressa por ocasião da prestação de serviços em via única. Sua impressão poderá ser dispensada na hipótese do tomador solicitar seu envio por "e-mail".</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-40">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-40" aria-expanded="true" aria-controls="c-40">
                                <strong>5.05. Pode-se enviar a NFS-e por e-mail para o tomador de serviços?</strong>
                            </button>
                        </h3>
                        <div id="c-40" class="accordion-collapse collapse" aria-labelledby="h-40" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Sim. A NFS-e poderá ser enviada por "e-mail" ao tomador de serviços, desde que por sua solicitação. Nesse caso, o tomador pode dispensar a emissão da NFS-e. O prestador de serviços poderá, inclusive, adicionar comentários ao e-mail.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-41">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-41" aria-expanded="true" aria-controls="c-41">
                                <strong>5.06. A NFS-e poderá ser impressa em modelo diverso do estabelecido em regulamento?</strong>
                            </button>
                        </h3>
                        <div id="c-41" class="accordion-collapse collapse" aria-labelledby="h-41" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Não.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-42">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-42" aria-expanded="true" aria-controls="c-42">
                                <strong>5.07. A NFS-e terá numeração sequencial específica?</strong>
                            </button>
                        </h3>
                        <div id="c-42" class="accordion-collapse collapse" aria-labelledby="h-42" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Sim. O número da NFS-e será gerado pelo sistema, em ordem sequencial, sendo único para cada estabelecimento da empresa prestadora de serviços.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-43">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-43" aria-expanded="true" aria-controls="c-43">
                                <strong>5.08. Até quando é possível consultar a NFS-e, após sua emissão?</strong>
                            </button>
                        </h3>
                        <div id="c-43" class="accordion-collapse collapse" aria-labelledby="h-43" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>As NFS-e emitidas poderão ser consultadas e impressas "online" por 5 anos. Depois de transcorrido tal prazo, a consulta às NFS-e emitidas somente poderá ser realizada mediante a solicitação de envio de arquivo em meio magnético.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-44">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-44" aria-expanded="true" aria-controls="c-44">
                                <strong>5.09. Pode-se utilizar uma NFS-e para registrar mais de um tipo de serviço prestado?</strong>
                            </button>
                        </h3>
                        <div id="c-44" class="accordion-collapse collapse" aria-labelledby="h-44" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Não. Para cada tipo de serviço prestado (código de serviço) deverá ser emitida uma NFS-e. Ou seja, uma NFS-e registra apenas um tipo de serviço.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-45">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-45" aria-expanded="true" aria-controls="c-45">
                                <strong>5.10. Pode-se cancelar uma NFS-e emitida? Em quais situações?</strong>
                            </button>
                        </h3>
                        <div id="c-45" class="accordion-collapse collapse" aria-labelledby="h-45" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>A NFS-e poderá ser cancelada pelo emitente, até o dia 5 do mês seguinte a sua emissão, por meio do sistema, nas seguintes situações:<br />
                                    1. Cancelamento da NFS-e quando o ISS ainda não foi recolhido:<br />
                                    1.1. Cancelamento de NFS-e por não ter sido prestado o serviço Lembramos que o fato gerador do ISS é a prestação do serviço. Dessa forma, não havendo prestação de serviço, não há ISS a recolher e a NFS-e pode ser cancelada. Entretanto, caso tenha havido prestação de serviço, o ISS correspondente deve ser recolhido independentemente de ter ou não sido efetuado o pagamento pelo serviço prestado. Nesse caso a NFS-e não poderá ser cancelada. <br />
                                    1.2. Cancelamento de NFS-e emitida com dados incorretos. Dados incorretos do tomador dos serviços, quando este for pessoa jurídica estabelecida no município, não podem ser retificados pelo prestador dos serviços. Para corrigir dados da NFS-e, inclusive os dados de tomador pessoa física ou pessoa jurídica não estabelecida no município, o prestador de serviços deverá cancelar a NFS-e e emitir outra, via RPS, em substituição à NFS-e incorreta, conforme instruções a seguir. Observar que a data de emissão do RPS deverá observar a data da ocorrência do fato gerador, ou seja, a data da efetiva prestação do serviço. NFS-e com data retroativa: Caso típico: uma NFS-e foi emitida no dia 20/09. No dia 04/10, constatou-se que essa NFS-e foi emitida incorretamente, sendo necessário o seu cancelamento e posterior substituição por outra NFS-e. O contribuinte, nesse caso, deverá: <br />
                                    a) Verificar se a NFS-e emitida incorretamente consta de guia de recolhimento e, se for o caso, cancelar essa guia; <br />
                                    b) Cancelar a NFS-e; <br />
                                    c) Emitir um RPS com a data de 20/09, com os dados corretos; <br />
                                    d) Efetuar a substituição do RPS com os dados corretos em NFS-e. No formulário da NFS-e, preencha o campo "nº do RPS", "Série do RPS" e "Data de Emissão do RPS" com os dados desse RPS. <br />
                                    e) Emitir uma nova guia de recolhimento, se for o caso. <br />
                                    Observações:<br />
                                    - Para mais informações sobre o cancelamento de NFS-e, consulte o manual de acesso ao sistema da NFS-e (versão para download); <br />
                                    - Se a NFS-e já tiver sido incluída em uma guia de recolhimento emitida, o status da NFS-e aparecerá como "Normal". Nesse caso, efetue o cancelamento da referida guia para que seja possível o cancelamento da NFS-e. <br />
                                    2. Cancelamento de NFS-e com ISS já recolhido: Após o recolhimento do imposto, a NFS-e somente poderá ser cancelada por meio de processo administrativo. <br />
                                    2.1. Cancelamento de NFS-e por não ter sido prestado o serviço Lembramos que o fato gerador do ISS é a prestação do serviço. Dessa forma, não havendo prestação de serviço, não há ISS a recolher e a NFS-e pode ser cancelada. Entretanto, caso tenha havido prestação de serviço, o ISS correspondente deve ser recolhido independentemente de ter ou não sido efetuado o pagamento pelo serviço prestado. Nesse caso, a NFS-e não poderá ser cancelada. A NFS-e deverá ser cancelada e o ISS recolhido restituído mediante processo administrativo, ao qual deverão ser juntados os seguintes documentos: <br />
                                    - requerimento do interessado, em que conste o nome ou razão social, número de inscrição no CCM, número de inscrição no CNPJ ou CPF, endereço completo, telefone para contato, exposição clara do pedido e todos os elementos necessários à sua prova; <br />
                                    - contrato social; <br />
                                    - RG e CPF do signatário; <br />
                                    - identificação da NFS-e a ser cancelada. <br />
                                    2.2. Cancelamento de NFS-e emitida com dados incorretos. Dados incorretos do tomador dos serviços, quando este for pessoa jurídica estabelecida no município, não podem ser retificados pelo prestador dos serviços. Nesse caso, antes de emitir NFS-e em substituição à cancelada, o prestador deve solicitar ao tomador dos serviços que verifique seus dados. O prestador de serviços deverá emitir outra NFS-e, via RPS, em substituição à cancelada. Note-se que a data de emissão do RPS deverá ser a data da ocorrência do fato gerador, ou seja, a data da efetiva prestação do serviço. A NFS-e deverá ser cancelada mediante processo administrativo, ao qual deverão ser juntados os seguintes documentos: <br />
                                    - requerimento do interessado, constando o nome ou razão social, número de inscrição no CNPJ ou CPF, endereço completo, telefone para contato, exposição clara do pedido e todos os elementos necessários à sua prova; <br />
                                    - contrato social; <br />
                                    - RG e CPF do signatário; <br />
                                    - identificação da NFS-e a ser cancelada bem como da NFS-e que a substituiu. <br />
                                    O prestador de serviços poderá solicitar que o pagamento do ISS da NFS-e cancelada seja realocado para o da NFS-e que a substituiu ou solicitar a restituição do valor recolhido. <br />
                                    Observação: o prestador dos serviços que solicitar restituição de ISS que tenha sido recolhido pelo tomador dos serviços, deverá obter deste a autorização para recebê-la e juntar essa autorização ao requerimento. <strong>Verificar com a Prefeitura Municipal o local de entrega do requerimento bem como horários</strong>. <br />
                                    Observações: <br />
                                    - a NFS-e que foi cancelada aparecerá com situação <em>"cancelada"</em> tanto para o prestador quanto para o tomador dos serviços; <br />
                                    - o tomador dos serviços, desde que tenha cadastrado seu "e-mail" para recebimento da NFS-e, receberá um aviso informando que a NFS-e foi cancelada.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-46">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-46" aria-expanded="true" aria-controls="c-46">
                                <strong>5.11. Após a emissão da NFS-e, pode-se alterá-la?</strong>
                            </button>
                        </h3>
                        <div id="c-46" class="accordion-collapse collapse" aria-labelledby="h-46" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Não. Se houver necessidade de retificar dados incorretos da NFS-e, leia o item 5.10.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-47">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-47" aria-expanded="true" aria-controls="c-47">
                                <strong>5.12. A emissão de NFS-e permite o registro de operações conjugadas (mercadorias e serviços)?</strong>
                            </button>
                        </h3>
                        <div id="c-47" class="accordion-collapse collapse" aria-labelledby="h-47" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Não. A NFS-e destina-se exclusivamente ao registro de prestação de serviços. Consulte, também, o item 2.11.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-48">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-48" aria-expanded="true" aria-controls="c-48">
                                <strong>5.13. A emissão de NFS-e permite o registro dos dados referentes aos tributos federais?</strong>
                            </button>
                        </h3>
                        <div id="c-48" class="accordion-collapse collapse" aria-labelledby="h-48" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Sim. O campo destinado à discriminação dos serviços é de livre preenchimento e pode ser utilizado para o registro de impostos e contribuições federais. Lembramos que a base de cálculo do ISS é o preço do serviço, que inclui os impostos e contribuições federais. Dessa forma, tais impostos e contribuições não podem ser considerados como redução da base de cálculo do ISS.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-49">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-49" aria-expanded="true" aria-controls="c-49">
                                <strong>5.14. Considerado o cronograma constante em lei, quem estiver obrigado à utilização de NFS-e deverá requerer autorização para sua emissão?</strong>
                            </button>
                        </h3>
                        <div id="c-49" class="accordion-collapse collapse" aria-labelledby="h-49" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Sim. Tanto as empresas obrigadas como as que optem pela utilização de NFS-e devem solicitar a correspondente autorização.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-50">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-50" aria-expanded="true" aria-controls="c-50">
                                <strong>5.15. Como obter a autorização para emissão de NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-50" class="accordion-collapse collapse" aria-labelledby="h-50" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>No Portal da Prefeitura utilize o link "Prestadores" para solicitar uma senha que permite o acesso a áreas restritas desse "site".</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-51">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-51" aria-expanded="true" aria-controls="c-51">
                                <strong>5.16. A NFS-e poderá ser emitida englobando vários tipos de serviços?</strong>
                            </button>
                        </h3>
                        <div id="c-51" class="accordion-collapse collapse" aria-labelledby="h-51" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Não. O prestador de serviços deverá emitir uma NFS-e para cada serviço prestado, sendo vedada a emissão de uma mesma NFS-e que englobe serviços enquadrados em mais de um código de serviço.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-52">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-52" aria-expanded="true" aria-controls="c-52">
                                <strong>5.17. Como alterar a data de emissão da NFS-e quando esta for emitida em data posterior a da prestação dos serviços?</strong>
                            </button>
                        </h3>
                        <div id="c-52" class="accordion-collapse collapse" aria-labelledby="h-52" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>De acordo com a legislação, por ocasião da prestação de cada serviço (fato gerador) deverá ser emitida Nota Fiscal, Nota Fiscal-Fatura de Serviços, Cupom Fiscal ou outro documento exigido pela Administração. Portanto, não deve ocorrer emissão de NFS-e em data posterior a da ocorrência do fato gerador do ISS. Mesmo no caso de conversão de RPS em NFS-e, embora a NFS-e possa ser emitida em data posterior, o sistema considera a data de emissão do RPS como a data do fato gerador para efeito de cálculo do imposto.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-53">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-53" aria-expanded="true" aria-controls="c-53">
                                <strong>5.18. Como emitir NFS-e para tomador de serviços (PJ) estabelecido em outro país?</strong>
                            </button>
                        </h3>
                        <div id="c-53" class="accordion-collapse collapse" aria-labelledby="h-53" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>No caso de exportação de serviços, ou seja, serviços cujos resultados se verifiquem no exterior: <br />
                                    - Não informe o nº do CNPJ, Inscrição Municipal, CEP e UF; <br />
                                    - No campo Endereços deverão ser colocados os dados referentes ao Estado e no campo Município o País; <br />
                                    - Nos demais campos deverão ser preenchidos normalmente. No caso de os resultados dos serviços se verificarem no Brasil, mesmo que o pagamento seja feito no exterior, os serviços serão tributados no nosso município.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-54">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-54" aria-expanded="true" aria-controls="c-54">
                                <strong>5.19. Emiti uma NFS-e com dados incorretos. Posso corrigi-la por meio de carta de correção?</strong>
                            </button>
                        </h3>
                        <div id="c-54" class="accordion-collapse collapse" aria-labelledby="h-54" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Não é permitida a utilização de carta de correção para retificar a "Discriminação dos Serviços". Para mais informações, consulte o manual de acesso ao sistema da NFS-e para pessoas jurídicas.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-55">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-55" aria-expanded="true" aria-controls="c-55">
                                <strong>5.20. Onde pode ser incluído o campo de aceite dos serviços na NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-55" class="accordion-collapse collapse" aria-labelledby="h-55" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>O "canhoto" para aceite dos serviços prestados não é previsto nos documentos fiscais emitidos "online". Caso a formalidade de aceite seja necessária, redija os termos do "aceite" no campo "Discriminação de Serviços", depois da descrição dos serviços prestados. Impressa a NFS-e, o tomador dos serviços poderá aceitá-los apondo sua assinatura no local indicado no corpo da nota fiscal.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-56">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-56" aria-expanded="true" aria-controls="c-56">
                                <strong>5.21. Estou enquadrado no Simples Nacional, instituído pela Lei Complementar nº 123/2006. Por que minhas NFS-e não apresentam alíquota e valor do ISS?</strong>
                            </button>
                        </h3>
                        <div id="c-56" class="accordion-collapse collapse" aria-labelledby="h-56" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Para contribuinte enquadrado no Simples Nacional, quando a responsabilidade pelo recolhimento do ISS é do prestador dos serviços, os campos referentes à base de cálculo, alíquota e valor do ISS não são utilizados na NFS-e. Nessa situação, o recolhimento dos tributos deverá ser feito mensalmente, mediante Documento de Arrecadação do Simples Nacional (DAS), conforme orientação disponível em http://www.receita.fazenda.gov.br/SimplesNacional.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-57">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-57" aria-expanded="true" aria-controls="c-57">
                                <strong>5.22. Estou enquadrado no Simples Nacional e emito Nota Fiscal Eletrônica (NFS-e). Como será a emissão das NFS-e, quando o tomador dos serviços for responsável pelo recolhimento do ISS?</strong>
                            </button>
                        </h3>
                        <div id="c-57" class="accordion-collapse collapse" aria-labelledby="h-57" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Quando o tomador dos serviços for responsável pelo recolhimento do ISS, a nota fiscal será emitida com tributação normal e o tomador deverá emitir a guia de recolhimento pelo sistema da NFS-e.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-58">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-58" aria-expanded="true" aria-controls="c-58">
                                <strong>5.23. Estou enquadrado em regime de tributação diferente do que consta no sistema da NFS-e (Simples Nacional ou tributação normal), e quero corrigir a situação para as próximas NFS-e e para as existentes. O que devo fazer?</strong>
                            </button>
                        </h3>
                        <div id="c-58" class="accordion-collapse collapse" aria-labelledby="h-58" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>As NFS-e emitidas com regime de tributação incorreto não poderão ser retificadas. Porém as próximas NFS-e emitidas poderão ser corrigidas mediante contado com a Prefeitura Municipal e solicitando alteração do cadastro da empresa emissora de NFS-e.</p>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="accordion" id="accordionExample">
                    <br>
                    <h2>06 - EMISSÃO DE GUIA DE RECOLHIMENTO</h2>
                    <hr>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-59">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-59" aria-expanded="true" aria-controls="c-59">
                                <strong>6.01. Existe uma guia de recolhimento de ISS específica para a NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-59" class="accordion-collapse collapse" aria-labelledby="h-59" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Sim. O recolhimento do ISS, referente às NFS-e, deverá ser feito exclusivamente por meio de documento de arrecadação emitido pelo aplicativo da NFS-e no menu "Guia de Pagamento" para os prestadores de serviços.<br>
                                    Os tomadores de serviços não emitentes de NFS-e devem acessar o menu "Tomadores", item "Guia de Pagamento" no sistema para poder emitir guia de recolhimento quando o ISS deve ser retido e recolhido pelo tomador.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-60">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-60" aria-expanded="true" aria-controls="c-60">
                                <strong>6.02. Quando a guia de recolhimento de ISS fica disponível para emissão?</strong>
                            </button>
                        </h3>
                        <div id="c-60" class="accordion-collapse collapse" aria-labelledby="h-60" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>A partir da emissão da primeira NFS-e dentro do mês.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-61">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-61" aria-expanded="true" aria-controls="c-61">
                                <strong>6.03. Quem fica dispensado da emissão da guia de recolhimento pelo sistema da NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-61" class="accordion-collapse collapse" aria-labelledby="h-61" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>1) Os órgãos da administração pública direta da União, dos Estados e do Município, bem como suas autarquias, fundações, empresas públicas, sociedades de economia mista e demais entidades controladas direta ou indiretamente pela União, pelos Estados ou pelo Município, que recolherem o ISS retido na fonte por meio dos sistemas orçamentário e financeiro dos governos federal, estadual e municipal.<br>
                                    2) As empresas estabelecidas no Município e enquadradas no Simples Nacional, os autônomos e os que recolhem o ISS por quota fixa mensal.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-62">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-62" aria-expanded="true" aria-controls="c-62">
                                <strong>6.04. Qual é a data de vencimento do ISS referente às NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-62" class="accordion-collapse collapse" aria-labelledby="h-62" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>O ISS vence no último dia útil do mês subsequente. A guia deverá ser impressa a partir do dia 21 de cada mês.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-63">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-63" aria-expanded="true" aria-controls="c-63">
                                <strong>6.05. É possível emitir a guia de recolhimento após o vencimento do ISS?</strong>
                            </button>
                        </h3>
                        <div id="c-63" class="accordion-collapse collapse" aria-labelledby="h-63" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Sim. Cancele a guia vencida e emita nova guia com valor e vencimento atualizados. A nova guia será emitida com os acréscimos legais.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-64">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-64" aria-expanded="true" aria-controls="c-64">
                                <strong>6.06. É possível cancelar guia de recolhimento emitida?</strong>
                            </button>
                        </h3>
                        <div id="c-64" class="accordion-collapse collapse" aria-labelledby="h-64" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Sim, desde que o ISS não tenha sido recolhido.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-65">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-65" aria-expanded="true" aria-controls="c-65">
                                <strong>6.07. Os contribuintes sujeitos ao regime de recolhimento do ISS por estimativa deverão emitir a guia de recolhimento no aplicativo da NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-65" class="accordion-collapse collapse" aria-labelledby="h-65" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Não.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-66">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-66" aria-expanded="true" aria-controls="c-66">
                                <strong>6.08. Os contribuintes que possuem regime especial de recolhimento do ISS, individual ou coletivo, deverão emitir a guia de recolhimento no aplicativo da NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-66" class="accordion-collapse collapse" aria-labelledby="h-66" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Não.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-67">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-67" aria-expanded="true" aria-controls="c-67">
                                <strong>6.09. As empresas estabelecidas no Município, não enquadradas no Simples Nacional, deverão emitir a guia de recolhimento no aplicativo da NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-67" class="accordion-collapse collapse" aria-labelledby="h-67" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Sim. As empresas estabelecidas no Município, não enquadradas no Simples Nacional, que optarem pela emissão de NFS-e deverão emitir a guia de recolhimento no aplicativo da NFS-e.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-68">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-68" aria-expanded="true" aria-controls="c-68">
                                <strong>6.10. As empresas enquadradas no Simples Nacional deverão emitir a guia de recolhimento no aplicativo da NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-68" class="accordion-collapse collapse" aria-labelledby="h-68" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Não. As empresas enquadradas no Simples Nacional deverão recolher tributos utilizando o Documento de Arrecadação do Simples Nacional (DAS), conforme orientação disponível em: http://www.receita.fazenda.gov.br/SimplesNacional.</p>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="accordion" id="accordionExample">
                    <br>
                    <h2>07 - GERAÇÃO DE CRÉDITO</h2>
                    <hr>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-69">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-69" aria-expanded="true" aria-controls="c-69">
                                <strong>7.01. Quem fará jus ao crédito gerado pela NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-69" class="accordion-collapse collapse" aria-labelledby="h-69" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="alert alert-danger">Não se aplica ao município de <?php echo $CONF_CIDADE . '.' ?></p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-70">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-70" aria-expanded="true" aria-controls="c-70">
                                <strong>7.02. Quanto é gerado de crédito por NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-70" class="accordion-collapse collapse" aria-labelledby="h-70" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="alert alert-danger">Não se aplica ao município de <?php echo $CONF_CIDADE . '.' ?></p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-71">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-71" aria-expanded="true" aria-controls="c-71">
                                <strong>7.03. Como o tomador de serviços será informado sobre os créditos gerados?</strong>
                            </button>
                        </h3>
                        <div id="c-71" class="accordion-collapse collapse" aria-labelledby="h-71" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="alert alert-danger">Não se aplica ao município de <?php echo $CONF_CIDADE . '.' ?></p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-72">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-72" aria-expanded="true" aria-controls="c-72">
                                <strong>7.04. Quando o crédito fica disponível para utilização?</strong>
                            </button>
                        </h3>
                        <div id="c-72" class="accordion-collapse collapse" aria-labelledby="h-72" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="alert alert-danger">Não se aplica ao município de <?php echo $CONF_CIDADE . '.' ?></p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-73">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-73" aria-expanded="true" aria-controls="c-73">
                                <strong>7.05. Quem não fará jus ao crédito gerado?</strong>
                            </button>
                        </h3>
                        <div id="c-73" class="accordion-collapse collapse" aria-labelledby="h-73" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="alert alert-danger">Não se aplica ao município de <?php echo $CONF_CIDADE . '.' ?></p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-74">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-74" aria-expanded="true" aria-controls="c-74">
                                <strong>7.06. Quais os procedimentos para se obter o crédito?</strong>
                            </button>
                        </h3>
                        <div id="c-74" class="accordion-collapse collapse" aria-labelledby="h-74" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="alert alert-danger">Não se aplica ao município de <?php echo $CONF_CIDADE . '.' ?></p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-75">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-75" aria-expanded="true" aria-controls="c-75">
                                <strong>7.07. Emito Nota Fiscal Eletrônica (NFS-e) e estou enquadrado no Simples Nacional. NFS-e emitidas por mim darão ao tomador do serviço direito a crédito de parcela do ISS?</strong>
                            </button>
                        </h3>
                        <div id="c-75" class="accordion-collapse collapse" aria-labelledby="h-75" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="alert alert-danger">Não se aplica ao município de <?php echo $CONF_CIDADE . '.' ?></p>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="accordion" id="accordionExample">
                    <br>
                    <h2>08 - UTILIZAÇÃO DE CRÉDITO</h2>
                    <hr>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-76">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-76" aria-expanded="true" aria-controls="c-76">
                                <strong>8.01. Quando o tomador de serviços deverá indicar os imóveis que aproveitarão os créditos gerados?</strong>
                            </button>
                        </h3>
                        <div id="c-76" class="accordion-collapse collapse" aria-labelledby="h-76" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="alert alert-danger">Não se aplica ao município de <?php echo $CONF_CIDADE . '.' ?></p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-77">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-77" aria-expanded="true" aria-controls="c-77">
                                <strong>8.02. Pode-se indicar imóvel em nome de terceiros?</strong>
                            </button>
                        </h3>
                        <div id="c-77" class="accordion-collapse collapse" aria-labelledby="h-77" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="alert alert-danger">Não se aplica ao município de <?php echo $CONF_CIDADE . '.' ?></p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-78">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-78" aria-expanded="true" aria-controls="c-78">
                                <strong>8.03. Pode-se indicar imóvel com débito de IPTU?</strong>
                            </button>
                        </h3>
                        <div id="c-78" class="accordion-collapse collapse" aria-labelledby="h-78" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="alert alert-danger">Não se aplica ao município de <?php echo $CONF_CIDADE . '.' ?></p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-79">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-79" aria-expanded="true" aria-controls="c-79">
                                <strong>8.04. Como o crédito gerado poderá ser utilizado?</strong>
                            </button>
                        </h3>
                        <div id="c-79" class="accordion-collapse collapse" aria-labelledby="h-79" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="alert alert-danger">Não se aplica ao município de <?php echo $CONF_CIDADE . '.' ?></p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-80">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-80" aria-expanded="true" aria-controls="c-80">
                                <strong>8.05. Como é calculado o valor do abatimento do IPTU?</strong>
                            </button>
                        </h3>
                        <div id="c-80" class="accordion-collapse collapse" aria-labelledby="h-80" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="alert alert-danger">Não se aplica ao município de <?php echo $CONF_CIDADE . '.' ?></p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-81">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-81" aria-expanded="true" aria-controls="c-81">
                                <strong>8.06. Após a utilização do crédito, como será pago o saldo do IPTU?</strong>
                            </button>
                        </h3>
                        <div id="c-81" class="accordion-collapse collapse" aria-labelledby="h-81" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="alert alert-danger">Não se aplica ao município de <?php echo $CONF_CIDADE . '.' ?></p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-82">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-82" aria-expanded="true" aria-controls="c-82">
                                <strong>8.07. O que acontece no caso de não pagamento do saldo restante do IPTU?</strong>
                            </button>
                        </h3>
                        <div id="c-82" class="accordion-collapse collapse" aria-labelledby="h-82" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="alert alert-danger">Não se aplica ao município de <?php echo $CONF_CIDADE . '.' ?></p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-83">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-83" aria-expanded="true" aria-controls="c-83">
                                <strong>8.08. Qual é a validade dos créditos?</strong>
                            </button>
                        </h3>
                        <div id="c-83" class="accordion-collapse collapse" aria-labelledby="h-83" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="alert alert-danger">Não se aplica ao município de <?php echo $CONF_CIDADE . '.' ?></p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-84">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-84" aria-expanded="true" aria-controls="c-84">
                                <strong>8.09. Quem não poderá utilizar o crédito gerado?</strong>
                            </button>
                        </h3>
                        <div id="c-84" class="accordion-collapse collapse" aria-labelledby="h-84" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="alert alert-danger">Não se aplica ao município de <?php echo $CONF_CIDADE . '.' ?></p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-85">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-85" aria-expanded="true" aria-controls="c-85">
                                <strong>8.10. O tomador de serviços que estiver com pendências quanto ao imposto junto à Prefeitura Municipal perderá os créditos gerados?</strong>
                            </button>
                        </h3>
                        <div id="c-85" class="accordion-collapse collapse" aria-labelledby="h-85" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p class="alert alert-danger">Não se aplica ao município de <?php echo $CONF_CIDADE . '.' ?></p>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="accordion" id="accordionExample">
                    <br>
                    <h2>09 - ASPECTOS GERAIS</h2>
                    <hr>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-86">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-86" aria-expanded="true" aria-controls="c-86">
                                <strong>9.01. Qual a garantia de que a NFS-e recebida é autêntica?</strong>
                            </button>
                        </h3>
                        <div id="c-86" class="accordion-collapse collapse" aria-labelledby="h-86" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Na opção "Verifique a Autenticidade", dentro do menu "Tomadores", disponível no site da NFS-e, basta digitar o número da NFS-e, o número da inscrição no CNPJ do emitente e o código de verificação existente na NFS-e. Se a NFS-e for autêntica, sua imagem será visualizada na tela do computador, podendo, inclusive, ser imprimida.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-87">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-87" aria-expanded="true" aria-controls="c-87">
                                <strong>9.02. O programa da NFS-e permite a importação de arquivo?</strong>
                            </button>
                        </h3>
                        <div id="c-87" class="accordion-collapse collapse" aria-labelledby="h-87" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Consulte o item 10.2.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-88">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-88" aria-expanded="true" aria-controls="c-88">
                                <strong>9.03. O programa da NFS-e permite a exportação de arquivo?</strong>
                            </button>
                        </h3>
                        <div id="c-88" class="accordion-collapse collapse" aria-labelledby="h-88" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Consulte o item 10.4.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-89">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-89" aria-expanded="true" aria-controls="c-89">
                                <strong>9.04. O prestador de serviços poderá cadastrar o contador para acessar o aplicativo NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-89" class="accordion-collapse collapse" aria-labelledby="h-89" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Sim. O prestador de serviços poderá informar no link "Contador" o nº do CPF ou do CNPJ do contador. Ao informar o nº do CPF ou do CNPJ do contador, o sistema preencherá automaticamente o nome ou razão social, se este possuir inscrição junto à Prefeitura Municipal. Caso contrário, o campo ficará em branco e o contador deverá preencher a ficha de cadastro para acesso ao sistema no menu "Contadores".</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-90">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-90" aria-expanded="true" aria-controls="c-90">
                                <strong>9.05. O contador poderá acessar o aplicativo NFS-e de seus clientes?</strong>
                            </button>
                        </h3>
                        <div id="c-90" class="accordion-collapse collapse" aria-labelledby="h-90" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Sim, o contador poderá acessar os dados de todos os contribuintes que o cadastraram como contador responsável, desde que autorizado pelo cliente, através do Sistema NFS-e.</p>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="accordion" id="accordionExample">
                    <br>
                    <h2>10 - SISTEMA DA NFS-e</h2>
                    <hr>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-91">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-91" aria-expanded="true" aria-controls="c-91">
                                <strong>10.01. Quem terá acesso ao sistema NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-91" class="accordion-collapse collapse" aria-labelledby="h-91" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Pessoa Jurídica/Física inscrita poderá acessar todas as funcionalidades do sistema, depois de obter autorização para utilizar NFS-e. Pessoa Jurídica/Física não inscrita (estabelecida em outro Município) poderá consultar as NFS-e recebidas. Contador (PF ou PJ) poderá acessar informações de todos os contribuintes que o cadastraram como contador responsável.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-92">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-92" aria-expanded="true" aria-controls="c-92">
                                <strong>10.02. O programa da NFS-e permite a importação de arquivo?</strong>
                            </button>
                        </h3>
                        <div id="c-92" class="accordion-collapse collapse" aria-labelledby="h-92" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Sim. A NFS-e possui um layout padrão de arquivo que poderá ser gerado pelo sistema do contribuinte e importado no sistema NFS-e, convertendo os dados do arquivo em Notas Fiscais Eletrônicas. O próprio sistema NFS-e valida o arquivo. Após a validação, o sistema solicita a confirmação da gravação.

                                </p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-93">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-93" aria-expanded="true" aria-controls="c-93">
                                <strong>10.03. Quem não possui autorização para emissão de NFS-e poderá testar a validação do arquivo?</strong>
                            </button>
                        </h3>
                        <div id="c-93" class="accordion-collapse collapse" aria-labelledby="h-93" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Não. Nesse caso, o sistema não permitirá acesso a funcionalidade sem cadastramento de usuário. Para testar o arquivo é necessário acessar o sistema com um nº de CNPJ de empresa estabelecida e com permissão de acesso pelo Município.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-94">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-94" aria-expanded="true" aria-controls="c-94">
                                <strong>10.04. O programa da NFS-e permite a exportação de arquivo?</strong>
                            </button>
                        </h3>
                        <div id="c-94" class="accordion-collapse collapse" aria-labelledby="h-94" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Sim. A NFS-e possui um layout padrão de arquivo que poderá ser gerado pelo sistema, permitindo a transferência eletrônica das informações referentes à NFS-e da base de dados da Prefeitura da Cidade para o contribuinte.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-95">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-95" aria-expanded="true" aria-controls="c-95">
                                <strong>10.05. Onde posso obter um documento contendo as instruções e os layouts de importação e exportação de arquivos?</strong>
                            </button>
                        </h3>
                        <div id="c-95" class="accordion-collapse collapse" aria-labelledby="h-95" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Nos menu "Manuais de Ajuda", nos arquivos "<strong>Layout de arquivo para conversão de RPS em NFS-e</strong>" e "<strong>Layout de arquivo de exportação de NFS-e</strong>".</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-96">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-96" aria-expanded="true" aria-controls="c-96">
                                <strong>10.06. Existe um programa específico para transmissão do arquivo?</strong>
                            </button>
                        </h3>
                        <div id="c-96" class="accordion-collapse collapse" aria-labelledby="h-96" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Não há um programa específico para transmissão dos lotes. O arquivo gerado pelo contribuinte poderá ser transmitido diretamente pelo sistema da NFS-e.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-97">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-97" aria-expanded="true" aria-controls="c-97">
                                <strong>10.07. Após a transmissão do arquivo será gerado algum relatório?</strong>
                            </button>
                        </h3>
                        <div id="c-97" class="accordion-collapse collapse" aria-labelledby="h-97" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Sim. Após o envio e validação do arquivo contendo todos os RPS emitidos, será apresentado um relatório resumindo o processo. Se não houver erros no arquivo, este poderá ser gravado e todos os RPS serão convertidos em NFS-e imediatamente após a gravação.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-98">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-98" aria-expanded="true" aria-controls="c-98">
                                <strong>10.08. Após a transmissão do arquivo será disponibilizado algum arquivo de retorno? Neste arquivo posso obter os números das NFS-e geradas?</strong>
                            </button>
                        </h3>
                        <div id="c-98" class="accordion-collapse collapse" aria-labelledby="h-98" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Sim. Após o envio, validação e gravação do arquivo contendo todos os RPS emitidos, basta acessar o menu "Importar RPS", escolher a opção "NFS-e emitidas" e informar o período desejado. Em seguida, o sistema irá gerar um relatório. Esse relatório relaciona o número da NFS-e gerada com o número do RPS enviado. Poderá ser gerado a qualquer momento, acessando o menu "Importar RPS" e escolhendo o período desejado e a opção "NFS-e Emitidas".</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-99">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-99" aria-expanded="true" aria-controls="c-99">
                                <strong>10.09. O que ocorre no caso de transmissão de arquivo contendo RPS já transmitido anteriormente?</strong>
                            </button>
                        </h3>
                        <div id="c-99" class="accordion-collapse collapse" aria-labelledby="h-99" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Caso um RPS já convertido em NFS-e seja novamente transmitido em arquivo, o sistema irá comparar o RPS convertido com o atual. Se não houver alteração, o RPS atual será ignorado e não será processado. Caso contrário, a NFS-e anterior será cancelada automaticamente e o RPS atual será processado e convertido em uma nova NFS-e.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-100">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-100" aria-expanded="true" aria-controls="c-100">
                                <strong>10.10. O que ocorre no caso de transmissão de arquivo contendo RPS já convertido "on line" em NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-100" class="accordion-collapse collapse" aria-labelledby="h-100" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Caso um RPS já convertido "on line" em NFS-e seja enviado em arquivo, o RPS enviado será ignorado e não será processado.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-101">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-101" aria-expanded="true" aria-controls="c-101">
                                <strong>10.11. O que ocorre no caso de conversão "on line" de RPS já convertido em NFS-e por meio de transmissão de arquivo?</strong>
                            </button>
                        </h3>
                        <div id="c-101" class="accordion-collapse collapse" aria-labelledby="h-101" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Neste caso, a conversão "on line" do RPS só será possível após o cancelamento da NFS-e correspondente ao RPS convertido.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-102">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-102" aria-expanded="true" aria-controls="c-102">
                                <strong>10.12. Qual o nome do arquivo de transmissão dos RPS?</strong>
                            </button>
                        </h3>
                        <div id="c-102" class="accordion-collapse collapse" aria-labelledby="h-102" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>O arquivo contendo os RPS enviados para conversão em NFS-e poderá ser "batizado" com qualquer nome.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-103">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-103" aria-expanded="true" aria-controls="c-103">
                                <strong>10.13. O que fazer em caso de erro no arquivo de transmissão dos RPS?</strong>
                            </button>
                        </h3>
                        <div id="c-103" class="accordion-collapse collapse" aria-labelledby="h-103" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Em caso de erro na validação do arquivo, o usuário deverá verificar o relatório gerado e após correção gerar novo arquivo.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-104">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-104" aria-expanded="true" aria-controls="c-104">
                                <strong>10.14. Após o envio do arquivo, em quanto tempo o RPS será convertido em NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-104" class="accordion-collapse collapse" aria-labelledby="h-104" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>A geração de NFS-e, após a importação do arquivo de RPS, é imediata.</p>
                            </div>
                        </div>

                    </div>

                    <div class="accordion-item" style="text-align: justify;">

                        <h3 class="accordion-header" id="h-105">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#c-105" aria-expanded="true" aria-controls="c-105">
                                <strong>10.15. É possível a integração em tempo real do sistema de faturamento da empresa com o sistema da NFS-e?</strong>
                            </button>
                        </h3>
                        <div id="c-105" class="accordion-collapse collapse" aria-labelledby="h-105" data-bs-parent="#accordionExample">
                            <div class="accordion-body">
                                <p>Atualmente, não. Somente após a implantação do aplicativo Web Service, que está em desenvolvimento, será possível integrar em tempo real o sistema de faturamento da empresa com a NFS-e, sem a necessidade de envio de lote.</p>
                            </div>
                        </div>

                    </div>

                </div>

            </div>
        </div>
        <br>
        <br>
        <br>
    </div>

    <?php require_once DIR_SITE . 'include/footer.php'; ?>