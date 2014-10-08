<?php
class Question {
    private $id;
    private $question;

    public function __construct($id, $question) {
        $this->id = $id;
        $this->question = $question;
    }

    public function getId() {
        return $this->id;
    }

    public function getQuestion() {
        return $this->question;
    }
}
