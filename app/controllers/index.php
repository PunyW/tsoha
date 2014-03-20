<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->render('index');
    }

}
