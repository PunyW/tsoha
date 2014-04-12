<?php

class Yllapito extends Controller {

    function __construct() {
        parent::__construct();
        checkLogin('employee');
    }

    public function index() {
        $this->indexAction();
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
        $this->setData("categories", ProductCategories::getCategories());
        $this->renderForm(false, $product);
    }

    public function muokkaa($id) {
        $product = Product::getProduct($id);
        $this->setData("categories", ProductCategories::getCategories());
        if ($product !== null) {
            $this->setData('id', $product->getId());
            $this->setData('name', $product->getName());
            $this->setData('category', $product->getCategory());
            $this->setData('description', $product->getDescription());
            $this->setData('price', $product->getPrice());
            $this->renderForm(true, $product);
        } else {
            redirect('yllapito/uusiTuote');
        }
    }

    public function search() {
        if (isset($_GET['product_search'])) {
            $data = $_GET['product_search'];
            $data = strtolower($data);
            $this->setData("products", Product::searchProduct($data));
            $this->setData("categories", ProductCategories::getCategories());
        }
    }

    public function updateProduct($id) {
        $product = Product::getProduct($id);
        
        if ($product === null) {
            alert('Tuotetta ei löytynyt');
            redirect('yllapito');
        }
        
        $this->setData('id', $product->setNewId(getPost('id')));
        $this->setData('category', $product->setCategory(getPost('category')));
        $this->setData('description', $product->setDescription(getPost('description')));
        $this->setData('price', $product->setPrice(getPost('price')));
        $this->setData('name', $product->setName(getPost('name')));
        
        if ($product->save(false)) {
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
        $this->setData("categories", ProductCategories::getCategories());
        $product = new Product();
        
        $this->setData('id', $product->setId(getPost('id')));
        $this->setData('category', $product->setCategory(getPost('category')));
        $this->setData('description', $product->setDescription(getPost('description')));
        $this->setData('price', $product->setPrice(getPost('price')));
        $this->setData('name', $product->setName(getPost('name')));
        
        if ($product->save(true)) {
            success('Tuote luotiin onnistuneesti');
            redirect('yllapito');
        }
        
        $this->renderForm(false, $product);
    }

    private function renderForm($edit, $product) {
        $this->setData("categories", ProductCategories::getCategories());
        $this->setData('edit', $edit);
        $this->setData('errors', $product->getErrors());

        $this->render('productForm');
    }
    
    public function testing() {
        $this->setData("categories", ProductCategories::getCategories());
        $this->render('testProductForm');
    }

}
