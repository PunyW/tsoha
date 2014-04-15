<?php

class LennontiedotModel {

    function __construct() {
        
    }

    public function confirmWishes($data, $passengerId) {
        $passenger = Passenger::getPassenger($passengerId);
        $flightId = $passenger->getFlightId();

        foreach ($data as $wish => $value) {
            $result = Wish::checkWish($passengerId, $wish);
            if(!$result) {
                $result = Wish::getWish($wish);
                $this->insert($result->getId(), $flightId, $passengerId);
            }
        }
    }

    private function insert($wishId, $flightId, $passengerId) {
        Database::insert('wishes', array(
            'wish_id' => $wishId,
            'flight_id' => $flightId,
            'passenger_id' => $passengerId
        ));
    }

}
