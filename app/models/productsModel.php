<?php

class Products extends Model {

    private $id;
    private $description;
    private $price;
    private $category;

    function __construct() {
        parent::__construct();
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
        $this->id = $id;
        return $this;
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

}
