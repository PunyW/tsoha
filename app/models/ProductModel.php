<?php

class Product {

    private $product_id;
    private $description;
    private $price;
    private $category;
    private $product_name;
    private $category_name;
    private $newId;
    private $errors;

    function __construct() {
        $this->errors = array();
    }

    public function getId() {
        return $this->product_id;
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

    public function getName() {
        return $this->product_name;
    }

    public function getCategory_name() {
        return $this->category_name;
    }

    public function setName($name) {
        if ($this->product_name == $name) {
            return $name;
        }
        $this->product_name = $name;

        trim($this->product_name);

        $this->checkName($this->product_name);

        return $this->product_name;
    }

    public function setId($id) {
        if ($this->product_id == $id) {
            return $id;
        }
        $this->product_id = $id;

        trim($this->product_id);

        $this->checkId($this->product_id);

        return $id;
    }

    public function setNewId($id) {
        if ($this->product_id == $id) {
            $this->newId = $id;
            return $id;
        }
        $this->newId = $id;

        trim($this->newId);

        $this->checkId($this->newId);

        return $id;
    }
    

    private function checkId($id) {
        if (strlen($id) != 5) {
            $this->errors['id'] = 'Tuotetunnuksen on oltava 5 merkkiä.';
        } else if (Product::productIdExists($id)) {
            $this->errors['id'] = 'Valitsemasi tuotetunnus on jo käytössä.';
        } else {
            unset($this->errors['id']);
        }
    }

    private function checkName($name) {
        if (strlen($name) < 3) {
            $this->errors['name'] = 'Tuotteen nimi on oltava vähintään 3 merkkiä pitkä';
        } else if (strlen($name) > 50) {
            $this->errors['name'] = 'Tuotteen nimi ei voi olla yli 55 merkkiä pitkä';
        } else {
            unset($this->errors['name']);
        }
    }

    public function setDescription($description) {
        $this->description = $description;
        return $this->description;
    }

    public function setPrice($price) {
        if ($this->price == $price) {
            return $this->price;
        }
        $this->price = $price;

        if ($this->price > 99999999.99) {
            $this->errors['price'] = 'Tuotteen hinta ei voi olla yli 99 999 999.99 €';
        } else if ($this->price < 0) {
            $this->errors['price'] = 'Tuotteen hinta täytyy olla positiivinen';
        }

        $this->price = $price;
        return $this->price;
    }

    public function setCategory($category) {
        $this->category = $category;
        return $this->category;
    }

    public static function getProducts() {
        $query = Database::select("SELECT * FROM products, product_categories "
                        . "WHERE products.category = product_categories.category_id");

        return $query->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public static function getProduct($id) {
        $query = Database::select("SELECT * FROM products WHERE product_id ILIKE :id", array(':id' => $id));
        $query->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $query->fetch();
    }

    public static function searchProduct($search) {
        $search = '%' . $search . '%';
        $data = array(
            ':search' => $search,
            ':search2' => $search
        );

        $query = Database::select("SELECT * FROM products WHERE lower(product_name) "
                        . "LIKE :search OR lower(description) LIKE :search2", $data);

        return $query->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public static function getProductsFromCategory($category) {
        $data = array(':id' => $category);
        $query = Database::select("SELECT * FROM products, product_categories "
                        . "WHERE products.category = product_categories.category_id "
                        . "AND product_categories.category_id = :id", $data);

        return $query->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public static function productIdExists($id) {
        $sql = "SELECT 1 FROM products WHERE product_id ILIKE :id";
        $query = Database::getDB()->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();

        return $query->rowCount() === 1;
    }

    private function insert() {
        return Database::insert('products', array(
                    'product_id' => $this->product_id,
                    'description' => $this->description,
                    'price' => $this->price,
                    'category' => $this->category,
                    'product_name' => $this->product_name
        ));
    }

    private function updateProductId() {
        $sql = "UPDATE products SET product_id = :new_id WHERE product_id ILIKE :id";
        $query = Database::getDB()->prepare($sql);
        $query->bindParam(':new_id', $this->newId);
        $query->bindParam(':id', $this->product_id);
        $query->execute();
    }

    private function update() {
        if ($this->product_id != $this->newId) {
            $this->updateProductId();
        }

        $postData = array(
            'description' => $this->description,
            'price' => $this->price,
            'category' => $this->category,
            'product_name' => $this->product_name
        );

        return Database::update('products', $postData, 'product_id ILIKE :id', $this->
                        product_id);
    }

    public function delete() {
        if ($this->product_id === null) {
            return;
        }

        $sql = "DELETE FROM products WHERE product_id ILIKE :id";
        $query = Database::getDB()->prepare($sql);
        $query->bindParam(':id', $this->product_id);
        $query->execute();
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
