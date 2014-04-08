<?php

class Ostoskori extends Controller {

    function __construct() {
        parent::__construct();
    }

    protected function indexAction() {
        $cart = $this->model->getProducts();
        $items = array();
        foreach ($cart as $productId => $amount) {
            $product = Product::getProduct($productId);
            $items[] = new Purchase($productId, $product->getName(), $product->getPrice(), $amount);
        }
        $this->addData($items);
    }

    public function addToCart($productId) {
        addToShoppingCart($productId);
        $product = Product::getProduct($productId);

        success($product->getName() . ' lisättiin ostoskoriin.');
        redirectBack();
    }

    public function removeFromCart($productId) {
        $_SESSION['cart'] = array_diff(getShoppingCart(), array($productId));
        redirectBack();
    }

}
