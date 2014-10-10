<?php

class UserDAO {
    /**
     * @param String teams or judges
     * @param String username
     * @param String password
     */
    public static function getUser($username, $password) {
        global $db;
        // Search from teams
        $sql_teams = "SELECT * FROM teams WHERE username = '{$username}' AND password = '{$password}'";
        $result = $db->query($sql_teams);
        error_log($sql_teams);
        if ($result->num_rows > 0) {
            error_log('CREATING TEAM OBJECT');
            $user = new Team($result->fetch_assoc());
            $user->setType('teams');
            return $user;
        } else {
            error_log('NOT A TEAM');
            // Search from judges
            $sql_judges = "SELECT * FROM judges WHERE username = '{$username}' AND password = '{$password}'";
            //bug
            $result = $db->query($sql_judges);
            error_log($sql_judges);
            //bug
            if ($result->num_rows > 0) {
                error_log('CREATING JUDGE OBJECT');
                $user = new Judge($result->fetch_assoc());
                $user->setType('judges');
                return $user;
            }
        }
        return false;
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
