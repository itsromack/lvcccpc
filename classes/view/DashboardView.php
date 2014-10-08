<?php
require_once("$BASE_DIR/classes/view/View.php");

class DashboardView extends View {

    protected $vars;

    public function DashboardView() {
        $template = 'dashboard';
        parent::__construct($template);
        $user = null;
        if (isset($_SESSION['user'])) {
	        $id			= $_SESSION['user']['id'];
	        $username 	= $_SESSION['user']['username'];
	        if ($_SESSION['type'] == 'judges') {
	        	$complete_name 	= $_SESSION['user']['complete_name'];
	        	$user = new Judge($id, $complete_name, $username);
                $this->vars['is_judge'] = true;
	        } else if ($_SESSION['type'] == 'teams') {
	        	$name 		= $_SESSION['user']['name'];
	        	$user = new Team($id, $name, $username);
                $this->vars['is_team'] = true;
	        }
        }
        
        if (isset($user)) {
            $this->vars['username'] = $user->getUserName();
        } else {
            header('Location: index.php');
        }

        $this->vars['page_title'] = $SITE_NAME;
        $this->vars['date_today'] = date("l M. d, Y");
        $this->vars['number_of_teams'] = UserDAO::countTeams();
        $this->vars['number_of_questions'] = QuestionDAO::countQuestions();
        $this->vars['teams'] = UserDAO::getUsers('teams');
        $this->vars['questions'] = QuestionDAO::getQuestions();
        $this->vars['submittions'] = TeamAnswerDAO::getAnswers();
        $this->vars['number_of_submissions'] = TeamAnswerDAO::countSubmissions();
        
        $this->vars['error'] = (isset($_GET['error'])) ? 'Access Denied' : null;

        $this->addVars($this->vars);
    }

}
