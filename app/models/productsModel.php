<?php

class Product {

    private $id;
    private $description;
    private $price;
    private $category;
    
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

    public function getPrice() {
        return $this->price;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setId($id) {
        if ($this->id == $id) {
            return;
        }
        $this->id = $id;

        trim($this->id);

        $this->checkNewId();
    }

    private function checkNewId() {
        if (strlen($this->id != 5)) {
            $this->errors['id'] = 'Tuotetunnuksen on oltava 5 merkkiä.';
        } else if (Product::productIdExists($this->id)) {
            $this->errors['id'] = 'Valitsemasi tuotetunnus on jo käytössä.';
        } else {
            unset($this->errors['id']);
        }
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this;
    }

    public function setPrice($price) {
        $this->price = $price;
        return $this;
    }

    public function setCategory($category) {
        $this->category = $category;
        return $this;
    }

    public static function getProducts() {
        $sql = "SELECT * FROM products";
        $query = getDB()->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public static function productIdExists($id) {
        $sql = "SELECT 1 FROM products WHERE id ILIKE :id";
        $query = getDB()->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();

        return $query->rowCount() === 1;
    }
    
    public function getErrors() {
        return $this->errors;
    }

}
