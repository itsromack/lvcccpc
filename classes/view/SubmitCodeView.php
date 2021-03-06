<?php
require_once("$BASE_DIR/classes/view/View.php");

class SubmitCodeView extends View {

    protected $vars;

    public function SubmitCodeView($question_id) {
        global $SITE_NAME;
        $template = 'submit_code';
        parent::__construct($template);
        if (isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            $this->vars['username'] = $user->getUserName();
            $this->vars['team_id'] = $user->getId();
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
        $this->vars['question'] = QuestionDAO::getQuestion($question_id);

        $this->addVars($this->vars);
    }

}
