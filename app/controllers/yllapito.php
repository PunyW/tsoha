<?php

class Yllapito extends Controller {

    function __construct() {
        parent::__construct();
        checkLogin('employee');
    }

    public function index() {
        $this->render('yllapito');
    }

    protected function indexAction() {
        $this->setData("products", $this->model->getProducts());
    }

    public function uusiTuote() {
//        $product = new Product();
        $this->renderForm(false, $product);
    }

    private function renderForm($edit, $product) {
        $this->setData('edit', $edit);
        $this->render('productForm');
    }

}
