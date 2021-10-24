<?php

require_once 'config/functions.php';

spl_autoload_register(
	function($class){
		require_once DIR_CLASS . $class . '.class.php';
	}
);

require_once 'include/util.php';
require_once 'include/conect.php';