<?php

class ScoreDAO {
    public static function getScores() {
        global $db;
        $sql = "SELECT t.id, t.name, t.username,
                (SELECT COUNT(id) FROM team_answers WHERE question_id=1 AND status='Code Accepted' AND team_id=t.id) AS q1,
                (SELECT COUNT(id) FROM team_answers WHERE question_id=2 AND status='Code Accepted' AND team_id=t.id) AS q2,
                (SELECT COUNT(id) FROM team_answers WHERE question_id=3 AND status='Code Accepted' AND team_id=t.id) AS q3,
                (SELECT COUNT(id) FROM team_answers WHERE question_id=4 AND status='Code Accepted' AND team_id=t.id) AS q4,
                (SELECT COUNT(id) FROM team_answers WHERE question_id=5 AND status='Code Accepted' AND team_id=t.id) AS q5,
                (SELECT COUNT(id) FROM team_answers WHERE question_id=6 AND status='Code Accepted' AND team_id=t.id) AS q6,
                (SELECT COUNT(id) FROM team_answers WHERE question_id=7 AND status='Code Accepted' AND team_id=t.id) AS q7,
                (SELECT COUNT(id) FROM team_answers WHERE question_id=8 AND status='Code Accepted' AND team_id=t.id) AS q8,
                (SELECT COUNT(id) FROM team_answers WHERE question_id=9 AND status='Code Accepted' AND team_id=t.id) AS q9,
                (SELECT COUNT(id) FROM team_answers WHERE question_id=10 AND status='Code Accepted' AND team_id=t.id) AS q10,
                (SELECT COUNT(id) FROM team_answers WHERE status='Code Accepted' AND team_id=t.id) AS score_total
                FROM teams t
                ORDER BY score_total DESC";
        $result = $db->query($sql);
        $teams = array();
        if ($result->num_rows > 0) {
            for ($i = 0; $i < $result->num_rows; $i++) {
                $row = $result->fetch_object();
                $teams[] = $row;
            }
            $result->free();
        } else {
            return false;
        }
        return $teams;
    }

}
