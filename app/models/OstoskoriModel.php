<?php

class OstoskoriModel {

    function __construct() {
        
    }

    public function getShoppingCart() {
        return $_SESSION['cart'];
    }

    public function addToShoppingCart($productId, $productQuantity) {
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] += $productQuantity;
        } else {
            $_SESSION['cart'][$productId] = $productQuantity;
        }
    }

    public function removeFromShoppingCart($productId) {
        if (isset($_SESSION['cart'][$productId])) {
            unset($_SESSION['cart'][$productId]);
            success('Tuote poistettiin ostoskorista onnistuneesti.');
        } 
    }

    public function emptyShoppingCart() {
        unset($_SESSION['cart']);
        initShoppingCart();
    }

    public function confirmCart() {
        $passengerId = Session::get('passenger');
        $passenger = Passenger::getPassenger($passengerId);
        $flightId = $passenger->getFlightId();

        foreach ($this->getShoppingCart() as $productId => $amount) {
            $result = Order::checkOrder($passengerId, $productId);
            if (empty($result)) {
                $this->insert($productId, $amount, $flightId, $passengerId);
            } else {
                $amount += $result['quantity'];
                $this->update($productId, $amount, $flightId, $passengerId);
            }
        }
    }

    private function update($productId, $amount, $flightId, $passengerId) {
        $postData = array(
            'quantity' => $amount,
        );

        $whereData = array(
            ':product_id' => $productId,
            ':flight_id' => $flightId,
            ':passenger_id' => $passengerId,
        );

        return Database::updateMul('orders', $postData, 'order_id ILIKE :product_id AND flight_id ILIKE :flight_id'
                        . ' AND passenger_id = :passenger_id  ', $whereData);
    }

    private function insert($productId, $amount, $flightId, $passengerId) {
        Database::insert('orders', array(
            'order_id' => $productId,
            'quantity' => $amount,
            'flight_id' => $flightId,
            'passenger_id' => $passengerId
        ));
    }

}
