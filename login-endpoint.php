<?php
require("base.php");
require_once("$BASE_DIR/lib/common.php");

$type = $_POST['type'];
$username = sanitize($_POST['username']);
$password = sha1($_POST['password']);

$user = UserDAO::getUser($type, $username, $password);
if ($user === NULL) {
	header('Location: login.php?error');
} else {
	$_SESSION['user'] = $user;
	$_SESSION['type'] = $type;
	header('Location: dashboard.php');
}
