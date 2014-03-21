<?php

class Yllapito extends Controller {

    private $products;

    function __construct() {
        parent::__construct();
    }

    protected function indexAction() {
        $this->setData("products", $this->model->getProducts());
    }

}
