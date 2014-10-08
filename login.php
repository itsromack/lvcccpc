<?php
require("base.php");
require_once("$BASE_DIR/lib/common.php");
require_once("$BASE_DIR/classes/view/LoginView.php");

$page = new LoginView();
echo $page->generateView();
