<?php
require("base.php");
require_once("$BASE_DIR/lib/common.php");

$username = sanitize($_POST['username']);
$password = sha1($_POST['password']);

$user = UserDAO::getUser($username, $password);
if (empty($user)) {
    header('Location: login.php?error');
} else {
    $_SESSION['user'] = $user;
    $_SESSION['type'] = $user->getType();
    header('Location: dashboard.php');
}
