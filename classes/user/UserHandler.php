<?php
require_once("$BASE_DIR/classes/user/User.php");
require_once("$BASE_DIR/classes/user/UserDAO.php");

class UserHandler {
    private $id;
    private $username;
    private $password;

    public function __construct($id, $username, $password) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
    }

    public function getId() {
        return $this->id;
    }

    public function getUserName() {
        return $this->username;
    }
}
