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

        return $id;
    }

    private function checkNewId() {
        if (strlen($this->id) != 5) {
            $this->errors['id'] = 'Tuotetunnuksen on oltava 5 merkkiä.';
        } else if (Product::productIdExists($this->id)) {
            $this->errors['id'] = 'Valitsemasi tuotetunnus on jo käytössä.';
        } else {
            unset($this->errors['id']);
        }
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this->description;
    }

    public function setPrice($price) {
        if ($this->price == $price) {
            return;
        }
        $this->price = $price;

        if ($this->price > 99999999.99) {
            $this->errors['price'] = 'Tuotteen hinta ei voi olla yli 99 999 999.99 €';
        } else if ($this->price < 0) {
            $this->errors['price'] = 'Tuotteen hinta ei voi olla negativiinen, tai 0';
        }

        $this->price = $price;
        return $this->price;
    }

    public function setCategory($category) {
        $this->category = $category;
        return $this->category;
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

    private function insert() {
        $sql = "INSERT INTO products (id, description, price, category) VALUES (:id, :description, :price, :category)";
        $query = getDB()->prepare($sql);
        $query->bindParam(':id', $this->id);
        $query->bindParam(':description', $this->description);
        $query->bindParam(':price', $this->price);
        $query->bindParam(':category', $this->category);

        return $query->execute();
    }

    private function update() {
        
    }

    public function getErrors() {
        return $this->errors;
    }

    private function validateProduct() {
        return empty($this->errors);
    }

    public function save($new) {
        if (!$this->validateProduct()) {
            return false;
        } else {
            if ($new) {
                return $this->insert();
            } else {
                return $this->update();
            }
        }
    }

}
