<?php
require_once("$BASE_DIR/classes/view/View.php");

class DashboardView extends View {

    protected $vars;

    public function DashboardView() {
        global $SITE_NAME;
        $template = 'dashboard';
        parent::__construct($template);
        $user = null;
        if (isset($_SESSION['user'])) {
	        $user = $_SESSION['user'];
            $id = $user->getId();
            $username = $user->getUsername();
            $this->vars['username'] = $username;
            if ($_SESSION['type'] == 'judges') {
                $complete_name  = $user->getCompleteName();
                $this->vars['questions'] = QuestionDAO::getQuestions();
                $this->vars['is_judge'] = true;
                $this->vars['number_of_teams'] = UserDAO::countTeams();
                $this->vars['teams'] = UserDAO::getUsers('teams');
                $this->vars['submissions'] = TeamAnswerDAO::getAnswers();
                $this->vars['code_reviewer_id'] = $user->getId();
                $this->vars['number_of_submissions'] = TeamAnswerDAO::countSubmissions();
            } else if ($_SESSION['type'] == 'teams') {
                $name       = $user->getTeamName();
                $this->vars['questions'] = QuestionDAO::getQuestions($id);
                $this->vars['number_of_questions'] = QuestionDAO::countQuestions();
                $this->vars['is_team'] = true;
            }
        } else {
            header('Location: index.php?unauthorized');
        }

        $this->vars['page_title'] = $SITE_NAME;
        $this->vars['date_today'] = date("l M. d, Y");
        $this->vars['is_on_dashboard'] = true;

        $this->addVars($this->vars);
    }

}
