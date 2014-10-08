<?php
require_once("$BASE_DIR/classes/view/View.php");

class LoginView extends View {

    protected $vars;

    public function LoginView() {
        $template = 'login';
        parent::__construct($template);

        $this->vars['error'] = (isset($_GET['error'])) ? 'Access Denied' : null;

        $this->addVars($this->vars);
    }

}
