<?php

class OstoskoriModel {

    function __construct() {
        
    }

    public function getProducts() {
        $items = getShoppingCart();
        $cart = array();


        foreach ($items as $productId) {
            if (!empty($cart[$productId])) {
                $cart[$productId] ++;
            } else {
                $cart[$productId] = 1;
            }
        }

        return $cart;
    }

    public function getShoppingCart() {
        return $_SESSION['cart'];
    }

    

    public function addToShoppingCart($productId, $productQuantity) {
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] += $productQuantity;
        } else {
            $_SESSION['cart'][$productId] = $productQuantity;
        }
    }

    public function removeFromShoppingCart($productId, $productQuantity) {
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] -= $productQuantity;
            if ($_SESSION['cart'][$productId] < 0) {
                unset($_SESSION['cart'][$productId]);
            }
            success('Tuote poistettiin ostoskorista');
        } else {
            alert('Kyseistä tuotetta ei löytynyt ostoskorista');
        }
    }

    public function emptyShoppingCart() {
        unset($_SESSION['cart']);
    }

}
