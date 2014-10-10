<?php
class User {
    private $id;
    private $username;
    private $type;

    public function __construct($id, $username) {
        $this->id = $id;
        $this->username = $username;
    }

    public function getId() {
        return $this->id;
    }

    public function getUserName() {
        return $this->username;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getType() {
        return $this->type;
    }
}
