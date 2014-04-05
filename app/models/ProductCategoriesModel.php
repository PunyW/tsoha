<?php

class ProductCategories {

    private $category_id;
    private $category_name;
    private $errors;
    
    function __construct() {
        $this->errors = array();
    }

    public function getId() {
        return $this->category_id;
    }

    public function getCategory_Name() {
        return $this->category_name;
    }

    public function getErrors() {
        return $this->errors;
    }

    public static function getCategories() {
        $sql = "SELECT * FROM product_categories";
        $query = getDB()->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }
    
    
}

