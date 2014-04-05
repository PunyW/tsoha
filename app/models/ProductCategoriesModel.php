<?php

class ProductCategories {

    private $id;
    private $description;
    private $errors;
    
    function __construct() {
        $this->errors = array();
    }

    public function getId() {
        return $this->id;
    }

    public function getDescription() {
        return $this->description;
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

