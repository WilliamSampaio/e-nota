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
		return getSubdominio();
	}
}