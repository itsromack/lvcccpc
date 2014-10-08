<?php
require("base.php");
require_once("$BASE_DIR/lib/common.php");
require_once("$BASE_DIR/classes/view/DashboardView.php");

$page = new DashboardView();
echo $page->generateView();
