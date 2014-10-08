<?php
require("base.php");
require_once("$BASE_DIR/lib/common.php");
require_once("$BASE_DIR/classes/view/ScoreboardView.php");

$page = new ScoreboardView();
echo $page->generateView();
