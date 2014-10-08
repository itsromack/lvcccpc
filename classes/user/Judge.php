<?php
class Judge extends User {
    private $complete_name;

    public function __construct($id, $complete_name, $username) {
        parent::__construct($id, $username);
        $this->complete_name = $complete_name;
    }

    public function getCompleteName() {
        return $this->complete_name;
    }
}
