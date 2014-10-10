<?php
class Judge extends User {
    private $complete_name;

    public function __construct($config) {
        parent::__construct($config['id'], $config['username']);
        $this->complete_name = $config['complete_name'];
    }

    public function getCompleteName() {
        return $this->complete_name;
    }
}
