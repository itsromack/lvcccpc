<?php

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
