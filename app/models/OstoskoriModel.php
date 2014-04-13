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

    public function removeFromShoppingCart($productId, $productQuantity) {
        if (isset($_SESSION['cart'][$productId])) {
            $_SESSION['cart'][$productId] -= $productQuantity;
            if ($_SESSION['cart'][$productId] < 0) {
                unset($_SESSION['cart'][$productId]);
            }
            success('Tuote poistettiin ostoskorista');
        } else {
            alert('Kyseistä tuotetta ei löytynyt ostoskorista');
        }
    }

    public function emptyShoppingCart() {
        unset($_SESSION['cart']);
    }

    public function confirmCart() {
        $passengerId = Session::get('passenger');
        $passenger = Passenger::getPassenger($passengerId);
        $flightId = $passenger->getFlight_id();
        $flightDepTime = $passenger->getDepartureTime();


        foreach ($this->getShoppingCart() as $productId => $amount) {
            $result = Order::checkOrder($passengerId, $productId);
            if (empty($result)) {
                $this->insert($productId, $amount, $flightDepTime, $flightId, $passengerId);
            } else {
                $amount += $result['quantity'];
                $this->update($productId, $amount, $flightDepTime, $flightId, $passengerId);
            }
        }
    }

    private function update($productId, $amount, $flightDepTime, $flightId, $passengerId) {
        $postData = array(
            'quantity' => $amount,
        );

        $whereData = array(
            ':product_id' => $productId,
            ':flight_id' => $flightId,
            ':passenger_id' => $passengerId,
            'flight_dep_time' => $flightDepTime
        );

        return Database::updateMul('orders', $postData, 'order_id ILIKE :product_id AND flight_id ILIKE :flight_id'
                        . ' AND passenger_id = :passenger_id AND flight_dep_time = :flight_dep_time ', $whereData);
    }

    private function insert($productId, $amount, $flightDepTime, $flightId, $passengerId) {
        Database::insert('orders', array(
            'order_id' => $productId,
            'quantity' => $amount,
            'flight_dep_time' => $flightDepTime,
            'flight_id' => $flightId,
            'passenger_id' => $passengerId
        ));
    }

}
