<?php

$config = array(
	'host' => 'localhost',
	'username' => 'root',
	'password' => 'secret123',
	'database' => 'cpc'
);

$db = new mysqli(
			$config['host'],
			$config['username'],
			$config['password'],
			$config['database']
		);

$SITE_DOMAIN = 'localhost';
$ABS_BASE_URL = 'http://cpc.dev';
$SSL_BASE_URL = 'https://cpc.dev';
