<?php

require_once 'constants.php';

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

function isTenancyAppBySubdomain()
{
	if(SUBDOMAIN)
	{
		return getSubdominio() . '/';
	}
}

function generateCodVerification($string)
{
    $cont = 0;
    $cont1 = 0;
    $COD_VARIFICACAO = '';

    for ($cont = 0; $cont < 5; $cont++) {
        $aux = substr($string, $cont, 1);
        for ($cont1 = 0; $cont1 <= 9; $cont1++) {
            if ($aux == $cont1) {
                $COD_VARIFICACAO .= $cont1;
            }
        }
    }

    return $COD_VARIFICACAO;
}