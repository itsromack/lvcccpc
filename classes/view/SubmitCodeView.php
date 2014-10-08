<?php
require_once("$BASE_DIR/classes/view/View.php");

class SubmitCodeView extends View {

    protected $vars;

    public function SubmitCodeView($question_id) {
        $template = 'submit_code';
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

        $this->vars['page_title'] = $SITE_NAME;
        $this->vars['date_today'] = date("l M. d, Y");
        $this->vars['team_id'] = $_SESSION['user']['id'];
        $this->vars['question'] = QuestionDAO::getQuestion($question_id);

        $this->addVars($this->vars);
    }

}
