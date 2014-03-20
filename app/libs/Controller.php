<?php

class Controller {

    protected $viewPath;
    protected $data = array();
    protected $template;
    protected $name;
    protected $model;

    function __construct() {
        $this->name = strtolower(get_class($this));
        $this->viewPath = VIEW_PATH . $this->name . DS;
        $this->data = array();
        $this->template = new Template();
    }

    public function render($view) {
        if ($view == 'login') {
            $this->renderPartial($view);
        }
        $view = $view . '.php';
        $this->template->render($this->viewPath . $view, $this->data);
    }

    public function renderPartial($view) {
        $view = $view . '.php';
        $this->template->renderPartial($this->viewPath . $view, $this->data);
    }

    public function loadModel() {
        $path = MODEL_PATH . $this->name . 'Model.php';
        if (file_exists($path)) {
            require $path;
            $path = ucfirst($this->name) . 'Model';
            $this->model = new $path;
        }
    }

    protected function setData($key, $data) {
        $this->data[$key] = $data;
    }

    protected function addData(Array $data) {
        foreach ($data as $key => $value) {
            $this->setData($key, $value);
        }
    }

}
