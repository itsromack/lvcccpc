<?php
class Team extends User {
    private $name;

    public function __construct($config) {
        parent::__construct($config['id'], $config['username']);
        $this->name = $config['name'];
    }

    public function getTeamName() {
        return $this->name;
    }
}
