<?php

class YllapitoModel extends Model {

    function __construct() {
        parent::__construct();
    }

    public function getProducts() {
        require MODEL_PATH . 'productsModel.php';

        return Product::getProducts();
    }

}
