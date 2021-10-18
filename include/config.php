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

function getSubdominio()
{
    $dominio = $_SERVER['SERVER_NAME'];
    $dominioArray = explode(".", $dominio);
    if ($dominioArray[0] == 'www') {
        //return $dominioArray[1];
    } else {
        //return $dominioArray[0];
    }
    return 'subdominio2';
    // return 'subdominio1';
}

$config = parse_ini_file('../.config.ini');

$DB_HOST = $config[getSubdominio() . '.DB_HOST'];
$DB_DATABASE = $config[getSubdominio() . '.DB_DATABASE'];
$DB_USERNAME = $config[getSubdominio() . '.DB_USERNAME'];
$DB_PASSWORD = $config[getSubdominio() . '.DB_PASSWORD'];

?>