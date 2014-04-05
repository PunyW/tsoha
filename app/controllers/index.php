<?php

class Index extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
        $this->setData("products", Product::getProducts());
        $this->setData("categories", ProductCategories::getCategories());
        $this->render('index');
    }

    protected function indexAction() {
        $this->setData("products", Product::getProducts());
        $this->setData("categories", ProductCategories::getCategories());
    }
    
    public function tuoteryhma($category) {
        $this->setData("products", Product::getProductsFromCategory($category));
        $this->setData("categories", ProductCategories::getCategories());
    }
    
    public function search() {
        if(isset($_GET['product_search'])) {
            $data = $_GET['product_search'];
            $data = strtolower($data);
            $this->setData("products", Product::searchProduct($data));
            $this->setData("categories", ProductCategories::getCategories());
        }
    }

}
