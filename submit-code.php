<?php
require("base.php");
require_once("$BASE_DIR/lib/common.php");
require_once("$BASE_DIR/classes/view/SubmitCodeView.php");

$id = $_GET['qid'];

$page = new SubmitCodeView($id);
echo $page->generateView();
