<?php
require_once("$BASE_DIR/classes/view/View.php");

class ViewCode extends View {

    protected $vars;

    public function ViewCode($answer_id) {
        global $SITE_NAME;
        $template = 'view_code';
        parent::__construct($template);
        $user = null;
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

        $answer = TeamAnswerDAO::getAnswer($answer_id);
        // echo '<pre>';
        // var_dump($answer);
        // exit;
        $this->vars['page_title'] = $SITE_NAME;
        $this->vars['date_today'] = date("l M. d, Y");
        $this->vars['team_id'] = $answer['team_id'];
        $question = QuestionDAO::getQuestion($answer['question_id']);
        $this->vars['question_title'] = $question['title'];
        $this->vars['question_id'] = $answer['question_id'];
        $this->vars['answer_id'] = $answer_id;
        $this->vars['team_answer'] = $answer['answer'];

        $this->addVars($this->vars);
    }

}
?>