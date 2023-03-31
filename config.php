<?php



$constants = [
//--------------------------------------------------DB--------------------------------------------------\\
	'D' => 'classy',
	'H' => 'localhost',
	'U' => 'classy',
	'P' => 'password',
];

foreach($constants as $key => $value)
	define("Configuration\\$key", $value);
	
	
spl_autoload_register(function($className){
	$path = dirname(__FILE__).'/'.str_replace('\\', '/', $className).'.php';
	if(is_file($path)){
		include_once($path);
	}
});
