<?php

$common = 'Y';

date_default_timezone_set('America/Chicago');

if (isset($_SERVER['HTTPS']) && strip_tags($_SERVER['HTTPS']) == 'on') {
	$protocol = 'https';
} else {
	$protocol = 'http';
}

if (!defined('WWW_ROOT')) {
	if (!empty($_SERVER['HTTP_HOST']) && (strip_tags($_SERVER['HTTP_HOST']) == 'localhost')) {
		define('WWW_ROOT', $protocol.'://localhost/learning/');
	}
}

if (!defined('DIR_ROOT')) {
	if (!empty($_SERVER['HTTP_HOST']) && (strip_tags($_SERVER['HTTP_HOST']) == 'localhost')) {
		define('DIR_ROOT', 'C:/xampp/htdocs/learning/');
	} 
}