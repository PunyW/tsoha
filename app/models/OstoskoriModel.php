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

}
