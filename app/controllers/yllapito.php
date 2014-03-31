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
        $product = new Product();
        $this->renderForm(false, $product);
    }

    public function createProduct() {
        $product = new Product();
        $this->setData('id', $product->setId($_POST['id']));
        $this->setData('category', $product->setCategory($_POST['category']));
        $this->setData('description', $product->setDescription($_POST['description']));
        $this->setData('price', $product->setPrice($_POST['price']));
        if ($product->save(true)) {
            redirect('yllapito');
        }
        $this->renderForm(false, $product);
    }

    private function renderForm($edit, $product) {
        $this->setData('edit', $edit);
        $this->setData('errors', $product->getErrors());
        $this->render('productForm');
    }

}
