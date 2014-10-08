<?php
require("base.php");
require_once("$BASE_DIR/lib/common.php");

$id = $_GET['id'];

$retval = array('success' => false);

if (isset($id)) {
	$status = 'Code Rejected';
	$answer = TeamAnswerDAO::updateAnswerStatus($id, $status);
	if ($answer == true) {
		$retval = array('success' => true, 'code_status' => $status);
	}
}

echo json_encode($retval);