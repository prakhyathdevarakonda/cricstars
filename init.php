<?php

ob_start();
session_start();
define('DB_HOSTNAME', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'cricstars');

spl_autoload_register(function($class_name) {
	require $_SERVER['DOCUMENT_ROOT'] . '/cricstars/' . $class_name . '.php';
});
?>