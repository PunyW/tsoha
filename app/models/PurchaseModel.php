<?php

class Purchase {

    private $productId;
    private $productName;
    private $productPrice;
    private $amount;
    

    function __construct($productId, $productName, $productPrice, $amount) {
        $this->productId = $productId;
        $this->productName = $productName;
        $this->productPrice = $productPrice;
        $this->amount = $amount;
    }

    
    public function getProductId() {
        return $this->productId;
    }

    public function getProductName() {
        return $this->productName;
    }

    public function getProductPrice() {
        return $this->productPrice;
    }

    public function getAmount() {
        return $this->amount;
    }

    public function setProductId($productId) {
        $this->productId = $productId;
        return $this;
    }

    public function setProductName($productName) {
        $this->productName = $productName;
        return $this;
    }

    public function setProductPrice($productPrice) {
        $this->productPrice = $productPrice;
        return $this;
    }

    public function setAmount($amount) {
        $this->amount = $amount;
        return $this;
    }

}