<?
$SITE_NAME = 'LVCC CPC';

$TEMPLATE_DIR = 'html';
$TEMPLATE_EXT = 'html';

$PRODUCTION = false;

// Database
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

if (mysqli_connect_errno()) {
	echo 'An error occured. Please try again later.';
	exit;
}
// $DB_HOST = 'localhost';
// $DB_USER = 'root';
// $DB_PASS = 'secret123';
// $DB_DB   = 'cpc';
// $DB_SLAVE1 = 'localhost';
// $DB_SLAVES = array($DB_SLAVE1);

// URLs
$SITE_DOMAIN = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : (isset($_SERVER['SERVER_NAME']) ? $_SERVER['SERVER_NAME'] : 'cpc.dev');
$ABS_BASE_URL = 'http://' . $SITE_DOMAIN;
$SSL_BASE_URL = 'https://' . $SITE_DOMAIN;

$PROTOCOL = 'http';
$IS_SECURE = false;
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']) {
    $IS_SECURE = true;
    $PROTOCOL = 'https';
}
$BASE_URL = $PROTOCOL . '://' . $SITE_DOMAIN;

$CDN_URL = $BASE_URL;
