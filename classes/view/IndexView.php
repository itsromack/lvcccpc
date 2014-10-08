<?php
require_once("$BASE_DIR/classes/view/View.php");

class IndexView extends View {

    protected $vars;

    public function IndexView() {
    	global $SITE_NAME;
        $template = 'index';
        parent::__construct($template);

        $this->addVars($this->vars);
    }

}
