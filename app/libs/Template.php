<?php

class Template {

    private $template;
    private $title;

    function __construct() {
        $this->template = DEFAULT_TEMPLATE;
        $this->title = 'Ostoskassi';
    }

    public function render($view, $data) {
        $data = (object) $data;
        require_once TEMPLATE_PATH . $this->template . '.php';
    }

    public function renderPartial($view, $data) {
        $data = (object) $data;
        require_once TEMPLATE_PATH . 'empty.php';
    }

}
