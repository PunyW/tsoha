<?php

class Ostoskori extends Controller {

    function __construct() {
        parent::__construct();
        
    }

    protected function indexAction() {
        $cart = $this->model->getShoppingCart();
        $items = array();
        foreach ($cart as $productId => $amount) {
            $product = Product::getProduct($productId);
            $items[] = new Purchase($productId, $product->getName(), $product->getPrice(), $amount);
        }
        $this->addData($items);
    }

    public function addToCart() {
        $productId = $_POST['productId'];
        $productName = $_POST['productName'];
        $productQuantity = $_POST['productQuantity'];

        $this->model->addToShoppingCart($productId, $productQuantity);

        success($productQuantity . ' kpl ' . $productName . ' lisättiin ostoskoriin.');
        redirect('index');
    }

    public function removeFromCart() {
        $this->model->removeFromShoppingCart($productId, $productQuantity);
        redirectBack();
    }

    public function emptyCart() {
        $this->model->emptyShoppingCart();
        redirect('index');
    }

    public function confirmCart() {
        checkLogin('passenger');
        $this->model->confirmCart();
        success('Tuotteet tilattu lennolle onnistuneesti!');
        $this->emptyCart();
    }

}