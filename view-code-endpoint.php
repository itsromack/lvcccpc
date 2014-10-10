<?php
require("base.php");
require_once("$BASE_DIR/lib/common.php");

$answer_id = $_POST['answer_id'];
$answer = sanitize($_POST['answer']);

if (TeamAnswerDAO::updateAnswer($answer_id, $answer)) {
	error_log('SUCCESS');
	header('Location: dashboard.php?update_success');
} else {
	error_log('FAILED');
	header('Location: view-code.php?aid=' + $answer_id + '&error');
}
