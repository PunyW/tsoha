<?php

class Order extends Model {

    private $product_name;
    private $quantity;
    private $price;

    function __construct() {
        parent::__construct();
    }

    public function getProduct_name() {
        return $this->product_name;
    }

    public function getQuantity() {
        return $this->quantity;
    }

    public function getPrice() {
        return $this->price * $this->quantity;
    }

    public static function getOrders() {
        $sql = "SELECT * FROM orders";
        $query = Database::getDB()->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public static function getOrder($passenger_id) {
        $query = Database::select("SELECT * FROM orders, products WHERE "
                        . "passenger_id = :passenger_id AND "
                        . "orders.order_id = products.product_id", array(':passenger_id' => $passenger_id));
        return $query->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public static function checkOrder($passengerId, $productId) {
        $query = Database::select("SELECT * FROM orders WHERE "
                        . "passenger_id = :passenger_id AND order_id = :product_id", array(
                    ':passenger_id' => $passengerId,
                    ':product_id' => $productId
        ));
        $query->setFetchMode(PDO::FETCH_ASSOC);
        return $query->fetch();
    }

}
