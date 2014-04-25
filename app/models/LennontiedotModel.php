<?php

class LennontiedotModel {

    function __construct() {
        
    }

    public function confirmWishes($data, $passengerId, $wishesToBeRemoved) {
        $passenger = Passenger::getPassenger($passengerId);
        $flightId = $passenger->getFlightId();

        foreach ($data as $wish => $value) {
            $result = Wish::checkWish($passengerId, $wish);
            if (!$result) {
                $result = Wish::getWish($wish);
                $this->insert($result->getId(), $flightId, $passengerId);
            }
        }

        $this->delete($wishesToBeRemoved, $passengerId, $flightId);
    }

    private function insert($wishId, $flightId, $passengerId) {
        Database::insert('wishes', array(
            'wish_id' => $wishId,
            'flight_id' => $flightId,
            'passenger_id' => $passengerId
        ));
    }

    private function delete($wishesToBeRemoved, $passengerId, $flightId) {
        if ($wishesToBeRemoved) {
            $sql = "DELETE FROM wishes WHERE wish_id = :wish_id "
                    . "AND flight_id = :flight_id AND passenger_id = :passenger_id";

            $query = null;
            foreach ($wishesToBeRemoved as $id) {
                $query = Database::getDB()->prepare($sql);

                $query->bindParam(':wish_id', $id);
                $query->bindParam(':flight_id', $flightId);
                $query->bindParam(':passenger_id', $passengerId);

                $query->execute();
            }
        }
    }

}
