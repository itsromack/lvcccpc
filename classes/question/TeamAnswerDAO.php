<?php
class TeamAnswerDAO {
    public static function getAnswer($answer_id, $question_id = false, $team_id = false) {
        global $db;
        $sql = "SELECT * FROM team_answers WHERE";
        if ($answer_id !== false) {
            $sql .= ' id=' . $answer_id;
        }
        if ($question_id !== false) {
            if ($answer_id === false) {
                $sql .= ' question_id=' . $question_id;
            } else {
                $sql .= ' AND question_id=' . $question_id;
            }
        }
        if ($team_id !== false) {
            if ($answer_id === false && $question_id === false) {
                $sql .= ' team_id=' . $team_id;
            } else {
                $sql .= ' AND team_id=' . $team_id;
            }
        }
        error_log($sql);
        $result = $db->query($sql);
        if ($result) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    public static function getAnswers() {
        global $db;
        $answers = array();
        $sql = "SELECT
                ta.id, ta.status, q.title AS question_title,
                t.name AS team_name,
                t.members AS members,
                t.level AS level,
                t.category AS category,
                (ta.status='Code Accepted') AS is_accepted,
                (ta.status='Code Rejected') AS is_rejected,
                (ta.status='For Code Review') AS is_new,
                j.complete_name AS code_reviewer
                FROM team_answers ta
                    LEFT JOIN judges AS j ON(j.id=ta.code_reviewer)
                    JOIN questions q ON (ta.question_id=q.id)
                    JOIN teams t ON (ta.team_id=t.id)
                ORDER BY id DESC";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
            for ($i = 0; $i < $result->num_rows; $i++) {
                $row = $result->fetch_object();
                $answers[] = $row;
            }
            $result->free();
        } else {
            return false;
        }
        return $answers;
    }

    public static function saveAnswer($question_id, $team_id, $answer) {
        global $db;
        $sql = "INSERT INTO team_answers (question_id, team_id, answer) ";
        $sql .= "VALUES ({$question_id}, {$team_id}, '{$answer}')";
        error_log($sql);
        $db->query($sql);
        if ($db->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function updateAnswerStatus($answer_id, $status, $code_reviewer) {
        global $db;
        $status = sanitize($status);
        $sql = "UPDATE team_answers
                SET status='{$status}',
                code_reviewer={$code_reviewer}
                WHERE id={$answer_id}";
        error_log($sql);
        $db->query($sql);
        if ($db->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function countSubmissions() {
        global $db;
        $sql = "SELECT COUNT(id) AS number_of_submissions FROM team_answers";
        $result = $db->query($sql);
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['number_of_submissions'];
        } else {
            return false;
        }
    }

    public static function updateAnswer($answer_id, $answer) {
        global $db;
        $sql = "UPDATE team_answers
                SET answer = '{$answer}',
                status='For Code Review',
                code_reviewer=NULL
                WHERE id = {$answer_id}";
        error_log($sql);
        $db->query($sql);
        if ($db->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
