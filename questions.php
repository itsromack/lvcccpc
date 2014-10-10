<?php
require("base.php");
require_once("$BASE_DIR/lib/common.php");
require_once("$BASE_DIR/classes/view/QuestionView.php");

$page = new QuestionView();
echo $page->generateView();
