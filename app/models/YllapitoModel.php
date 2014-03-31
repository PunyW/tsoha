<?php

class YllapitoModel extends Model {

    function __construct() {
        parent::__construct();
    }

    public function getProducts() {
        return Product::getProducts();
    }

}
