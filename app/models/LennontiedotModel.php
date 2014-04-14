<?php

class LennontiedotModel {

    function __construct() {
        
    }

    public function confirmWishes($data, $passengerId) {
        $passenger = Passenger::getPassenger($passengerId);
        $flightId = $passenger->getFlight_id();
        $flightDepTime = $passenger->getDepartureTime();

        foreach ($data as $wish => $value) {
            $result = Wish::checkWish($passengerId, $wish);
            if(!$result) {
                $result = Wish::getWish($wish);
                $this->insert($result->getId(), $flightDepTime, $flightId, $passengerId);
            }
        }
    }

    private function insert($wishId, $flightDepTime, $flightId, $passengerId) {
        Database::insert('wishes', array(
            'wish_id' => $wishId,
            'flight_dep_time' => $flightDepTime,
            'flight_id' => $flightId,
            'passenger_id' => $passengerId
        ));
    }

}
