<?php

class OrderModel extends Model {

    function __construct() {
        parent::__construct();
    }

    public function getOrders() {
        require_once '../app/libs/Common.php';

        $sql = "SELECT * FROM orders";
        $query = getDB()->prepare($sql);
        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);
    }

}
