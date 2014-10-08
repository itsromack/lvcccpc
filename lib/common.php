<?php
// Load config
require_once("$BASE_DIR/conf/default-conf.php");
require_once("$BASE_DIR/conf/localdev-conf.php");

$IMAGES_DIR = 'images';
$TEMPLATE_DIR = 'html';
$TEMPLATE_EXT = 'html';
$SITE_NAME = 'LVCC CPC';
$SITE_DOMAIN = 'localhost';

$PROTOCOL = 'http';
$IS_SECURE = false;
if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS']) {
    $IS_SECURE = true;
    $PROTOCOL = 'https';
}
$BASE_URL = $PROTOCOL . '://' . $SITE_DOMAIN;

$CDN_URL = $BASE_URL;

$CDN_URL = 'localhost';
$BASE_URL = '';

// Common includes
require_once("$BASE_DIR/lib/common_functions.php");

require_once("$BASE_DIR/classes/user/User.php");
require_once("$BASE_DIR/classes/user/Team.php");
require_once("$BASE_DIR/classes/user/Judge.php");
require_once("$BASE_DIR/classes/user/UserDAO.php");
require_once("$BASE_DIR/classes/question/QuestionDAO.php");
require_once("$BASE_DIR/classes/question/TeamAnswerDAO.php");

session_start();

// Access Log
// if (Auth::isLoggedIn()) {
//     $user = Auth::getUser();
//     Logger::setUserId($user->getId());
// }

