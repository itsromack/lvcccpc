<?php

class QuestionDAO {
    /**
     * @param String teams or judges
     * @param String username
     * @param String password
     */
    public static function getQuestion($number) {
        global $db;
        $sql = "SELECT *
            FROM questions
            WHERE
            id = {$number}";
        $result = $db->query($sql);
        if ($result) {
            return $result->fetch_assoc();
        } else {
            return false;
        }
    }

    /**
     * @param String teams or judges
     */
    public static function getQuestions() {
        global $db;
        $questions = array();
        $sql = "SELECT id, title FROM questions ORDER BY id";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
            for ($i = 0; $i < $result->num_rows; $i++) {
                $row = $result->fetch_object();
                $questions[] = $row;
            }
            $result->free();
        } else {
            return false;
        }
        return $questions;
    }

    public static function countQuestions() {
        global $db;
        $sql = "SELECT COUNT(id) AS number_of_questions FROM questions";
        $result = $db->query($sql);
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['number_of_questions'];
        } else {
            return false;
        }
    }

}
