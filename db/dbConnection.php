	<?php
	if (!function_exists('pdo_connect_radweb')) {
	  function pdo_connect_radweb() {
	  try {
	    $dbname = 'test';
	  	$dbhost = 'localhost';
	  	$dsn = 'mysql:host='.$dbhost.';dbname='.$dbname. ';port=3306';
	  	$username = 'root';
	  	$password = 'born2mysql';
	  	$dbConnection = new PDO($dsn,$username,$password);
	  	$dbConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
	  } catch (PDOException $e) {
	    r_error($e->getMessage(), 'Database error');
	  }
	    return $dbConnection;
	  }
	}
