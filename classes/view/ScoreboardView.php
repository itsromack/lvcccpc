<?php
require_once("$BASE_DIR/classes/view/View.php");

class ScoreboardView extends View {

    protected $vars;

    public function ScoreboardView() {
        $template = 'scoreboard';
        parent::__construct($template);
        if (isset($_SESSION['user'])) {
            $this->vars['username'] = $_SESSION['user']['username'];
	        if ($_SESSION['type'] == 'judges') {
                $this->vars['is_judge'] = true;
	        } else if ($_SESSION['type'] == 'teams') {
                $this->vars['is_team'] = true;
	        }
        } else {
            header('Location: index.php');
        }

        // $this->vars['teams'] = UserDAO::getUsers('teams');
        $this->vars['teams'] = ScoreDAO::getScores();

        $this->addVars($this->vars);
    }

}
