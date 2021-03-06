<?php
require_once("$BASE_DIR/classes/view/View.php");

class ScoreboardView extends View {

    protected $vars;

    public function ScoreboardView() {
        global $SITE_NAME;
        $template = 'scoreboard';
        parent::__construct($template);
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            $this->vars['username'] = $user->getUserName();
	        if ($_SESSION['type'] == 'judges') {
                $this->vars['is_judge'] = true;
	        } else if ($_SESSION['type'] == 'teams') {
                $this->vars['is_team'] = true;
	        }
        } else {
            header('Location: index.php?unauthorized');
        }

        $this->vars['page_title'] = $SITE_NAME;
        $this->vars['date_today'] = date("l M. d, Y");
        $this->vars['teams'] = ScoreDAO::getScores();
        $this->vars['is_on_scoreboard'] = true;

        $this->addVars($this->vars);
    }

}
