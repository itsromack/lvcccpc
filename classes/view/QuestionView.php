<?php
require_once("$BASE_DIR/classes/view/View.php");

class QuestionView extends View {

    protected $vars;

    public function QuestionView($question_id) {
        $template = 'questions';
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
        $this->vars['questions'] = "QuestionDAO::getQuestions()";

        $this->addVars($this->vars);
    }

}
