<?php
require("base.php");
require_once("$BASE_DIR/lib/common.php");

$team_id = $_POST['team_id'];
$question_id = $_POST['question_id'];
$answer = sanitize($_POST['answer']);	// Source Code

if (TeamAnswerDAO::saveAnswer($question_id, $team_id, $answer)) {
	header('Location: dashboard.php?save_success');
} else {
	header('Location: submit-code.php?qid=' + $question_id + '&error');
}
