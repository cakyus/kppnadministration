<?php

/**
 * Configuration
 **/

$config['application.name'] = 'administration';
$config['application.title'] = 'Aplikasi Administrasi dan Monitoring';
$config['application.version'] = '1.00';
$config['application.mode'] = 'development';
$config['application.copyright'] = 'Copyleft &copy; 2012. All wrongs reserved.';

$config['database.hostname'] = 'localhost:3306';
$config['database.username'] = 'root';
$config['database.password'] = '';
$config['database.database'] = 'test';

// auto configurations
if ($config['application.mode'] == 'development') {
	// display all error
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
} elseif ($config['application.mode'] == 'production') {
	// no error displayed
	// @todo write error to error.log
	error_reporting(0);
	ini_set('display_errors', 0);
}
