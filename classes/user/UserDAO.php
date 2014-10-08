<?php

class UserDAO {
    /**
     * @param String teams or judges
     * @param String username
     * @param String password
     */
    public static function getUser($type, $username, $password) {
        global $db;
        $sql = "SELECT *
            FROM {$type}
            WHERE
                username = '{$username}'
                AND password = '{$password}'";
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
    public static function getUsers($type) {
        global $db;
        $users = array();

        $sql = "SELECT * FROM {$type} ORDER BY id";
        $result = $db->query($sql);
        if ($result->num_rows > 0) {
            for ($i = 0; $i < $result->num_rows; $i++) {
                $row = $result->fetch_object();
                $users[] = $row;
            }
            $result->free();
        } else {
            return false;
        }
        return $users;
    }

    public static function countTeamAnswers($team_id) {
        global $db;
        $sql = "SELECT COUNT(id) AS answers_count
                FROM team_answers
                WHERE team_id={$team_id}";
        $result = $db->query($sql);
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['answers_count'];
        } else {
            return false;
        }
    }

    public static function countTeams() {
        global $db;
        $sql = "SELECT COUNT(id) AS number_of_teams FROM teams";
        $result = $db->query($sql);
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['number_of_teams'];
        } else {
            return false;
        }
    }

    public static function countJudges() {
        global $db;
        $sql = "SELECT COUNT(id) AS number_of_judges FROM judges";
        $result = $db->query($sql);
        if ($result) {
            $row = $result->fetch_assoc();
            return $row['number_of_judges'];
        } else {
            return false;
        }
    }
}
