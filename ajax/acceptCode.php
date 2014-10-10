<?php
require("base.php");
require_once("$BASE_DIR/lib/common.php");

$id = $_GET['id'];
$code_reviewer_id = $_GET['rid'];
$retval = array('success' => false);

if (isset($id)) {
	$status = 'Code Accepted';
	$answer = TeamAnswerDAO::updateAnswerStatus($id, $status, $code_reviewer_id);
	if ($answer == true) {
		$retval = array('success' => true, 'code_status' => $status);
	}
}

echo json_encode($retval);