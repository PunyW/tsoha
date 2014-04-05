<?php

class Yllapito extends Controller {

    function __construct() {
        parent::__construct();
        checkLogin('employee');
    }

    public function index() {
        $this->setData("products", Product::getProducts());
        $this->setData("categories", ProductCategories::getCategories());
        $this->render('yllapito');
    }

    protected function indexAction() {
        $this->setData("products", $this->model->getProducts());
        $this->setData("categories", ProductCategories::getCategories());
    }
    
    public function tuoteryhma($category) {
        $this->setData("products", Product::getProductsFromCategory($category));
        $this->setData("categories", ProductCategories::getCategories());
    }

    public function uusiTuote() {
        $product = new Product();
        $this->renderForm(false, $product);
    }

    public function muokkaa($id) {
        $product = Product::getProduct($id);
        $this->setData("categories", ProductCategories::getCategories());
        if ($product !== null) {
            $this->setData('id', $product->getId());
            $this->setData('category', $product->getCategory());
            $this->setData('description', $product->getCategory_Name());
            $this->setData('price', $product->getPrice());
            $this->renderForm(true, $product);
        } else {
            redirect('yllapito/uusiTuote');
        }
    }

    public function updateProduct($id) {
        $product = Product::getProduct($id);
        if($product === null) {
            alert('Tuotetta ei löytynyt');
            redirect('yllapito');
        }
        
        $product->setNewId($_POST['id']);
        $product->setCategory($_POST['category']);
        $product->setDescription($_POST['description']);
        $product->setPrice($_POST['price']);
        
        if($product->save(false)) {
            success('Tuotteen tiedot päivitettiin onnistuneesti');
            redirect('yllapito');
        }
        
        $this->renderForm(true, $product);
    }

    public function poistaTuote($id) {
        $product = Product::getProduct($id);
        if ($product !== null) {
            $product->delete();
            success('Tuote poistettiin onnistuneesti');
        }
        
        redirect('yllapito');
    }

    public function createProduct() {
        $product = new Product();
        $this->setData('id', $product->setId($_POST['id']));
        $this->setData('category', $product->setCategory($_POST['category']));
        $this->setData('description', $product->setDescription($_POST['description']));
        $this->setData('price', $product->setPrice($_POST['price']));
        if ($product->save(true)) {
            success('Tuote luotiin onnistuneesti');
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
