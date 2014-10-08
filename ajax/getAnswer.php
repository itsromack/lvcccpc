<?php
require("base.php");
require_once("$BASE_DIR/lib/common.php");

$id = $_GET['id'];

$retval = array('success' => false);

if (isset($id)) {
	$answer = TeamAnswerDAO::getAnswer($id);
	if (isset($answer)) {
		$retval = array(
					'success' => true,
					'data' => $answer
				);
	}
}

echo json_encode($retval);
