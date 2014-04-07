<?php

class OrderModel extends Model {

    function __construct() {
        parent::__construct();
    }

    public static function getOrders() {
        $sql = "SELECT * FROM orders";
        $query = Database::getDB()->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

}
