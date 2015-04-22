<?php


/***************************************

common.php

Purpose: By including this file, the most common classes and configuration
variables are available

Usage: This file must be included from every file
/**************************************/

// use this to test if have access to this file
$common = 'Y';

// set timezone
date_default_timezone_set('America/Chicago');

// if move this file, these two variables will have to change:

//WWW_ROOT refers to the root of the web when viewed via a web browser
// first check to see loading page is based on https

if (isset($_SERVER['HTTPS']) && strip_tags($_SERVER['HTTPS']) == 'on') {
	$protocol = 'https';
}
else {
	$protocol = 'http';
}
// define WWW_ROOT, DIR_ROOT, iWWW_ROOT, iDIR_ROOT, pWWW_ROOT, pDIR_ROOT
// WWW_ROOT
if (!defined('WWW_ROOT')) {
	if (!empty($_SERVER['HTTP_HOST']) && strip_tags($_SERVER['HTTP_HOST']) == 'r-testweb.uwhis.hosp.wisc.edu') {
		// this is testing server
		define('WWW_ROOT', $protocol.'://r-testweb.uwhis.hosp.wisc.edu/');
	}
	else if (!empty($_SERVER['HTTP_HOST']) && (strip_tags($_SERVER['HTTP_HOST']) == 'localhost')) {
		define('WWW_ROOT', $protocol.'://localhost/learning/');
	}
	else {
		define('WWW_ROOT', $protocol.'://www.radiology.wisc.edu/');
	}
}

//DIR_ROOT refers to the root of the intranet when viewed via the file system
if (!defined('DIR_ROOT')) {
	if (!empty($_SERVER['HTTP_HOST']) && (strip_tags($_SERVER['HTTP_HOST']) == 'localhost')) {
		define('DIR_ROOT', 'C:\xampp\htdocs\radiology-website\\');
	} else {
		define('DIR_ROOT', '/var/www/html/');
	}
}

// iWWW_ROOT
if (!defined('iWWW_ROOT')) {
	if (!empty($_SERVER['HTTP_HOST']) && strip_tags($_SERVER['HTTP_HOST']) == 'r-testweb.uwhis.hosp.wisc.edu') {
		define('iWWW_ROOT', $protocol.'://r-testweb.uwhis.hosp.wisc.edu/protected/intranet/');
	}
	else if (!empty($_SERVER['HTTP_HOST']) && (strip_tags($_SERVER['HTTP_HOST']) == 'localhost')) {
		define('iWWW_ROOT', $protocol . '://localhost/radiology-website/protected/intranet/');
	}
	else {
		define('iWWW_ROOT', $protocol.'://www.radiology.wisc.edu/protected/intranet/');
	}
}