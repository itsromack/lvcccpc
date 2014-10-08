<?php
class TeamAnswerDAO {
    public static function getAnswer($answer_id) {
        global $db;
        $sql = "SELECT *
            FROM team_answers
            WHERE
                id = {$answer_id}";
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
                ta.id, ta.status, q.title AS question_title, t.name AS team_name,
                (ta.status='Code Accepted') AS is_accepted,
                (ta.status='Code Rejected') AS is_rejected,
                (ta.status='For Code Review') AS is_new
                FROM team_answers ta
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
        $answer = sanitize($answer);
        $sql = "INSERT INTO team_answers (question_id, team_id, answer) ";
        $sql .= "VALUES ({$question_id}, {$team_id}, '{$answer}')";
        $db->query($sql);
        if ($db->affected_rows > 0) {
            return true;
        } else {
            return false;
        }
    }

    public static function updateAnswerStatus($answer_id, $status) {
        global $db;
        $status = sanitize($status);
        $sql = "UPDATE team_answers SET status='{$status}' WHERE id={$answer_id}";
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
}
