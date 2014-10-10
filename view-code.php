<?php
require("base.php");
require_once("$BASE_DIR/lib/common.php");
require_once("$BASE_DIR/classes/view/ViewCode.php");

$aid = $_GET['aid'];

$page = new ViewCode($aid);
echo $page->generateView();