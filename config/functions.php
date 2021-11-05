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

function isTenancyAppBySubdomain()
{
	if (SUBDOMAIN) {
		return getSubdominio() . '/';
	} else {
		return '';
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

function getEstados()
{
	ini_set("allow_url_fopen", 1);
	$json = file_get_contents('https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome');
	return json_decode($json, true);
}

function getMunicipios($estado = 'AM')
{
	ini_set("allow_url_fopen", 1);
	$json = file_get_contents('https://servicodados.ibge.gov.br/api/v1/localidades/estados/' . $estado . '/municipios?orderBy=nome');
	return json_decode($json, true);
}
