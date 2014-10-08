<?php
class Team extends User {
    private $name;

    public function __construct($id, $name, $username) {
        parent::__construct($id, $username);
        $this->name = $name;
    }

    public function getTeamName() {
        return $this->name;
    }
}
