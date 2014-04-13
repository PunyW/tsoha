<?php

class Passenger {

    private $firstname;
    private $surname;
    private $flight_id;
    private $departure_airport;
    private $departure_time;
    private $destination_airport;
    private $estimated_arrival;
    private $seats;
    
    private $errors;

    function __construct() {
        $this->errors = array();
    }

    public function getFirstname() {
        return $this->firstname;
    }

    public function getSurname() {
        return $this->surname;
    }

    public function getName() {
        return $this->firstname . " " . $this->surname;
    }

    public function getFlight_id() {
        return $this->flight_id;
    }

    public function getErrors() {
        return $this->errors;
    }
    
    public function getDestination() {
        return $this->destination_airport;
    }
    
    public function getDepartureAirport() {
        return $this->departure_airport;
    }
    
    public function getDepartureTime() {
        return $this->departure_time;
    }

    public function getEstimatedArrival() {
        return $this->estimated_arrival;
    }
    
    public function getSeats() {
        return $this->seats;
    }
    
    public function getBoardingTime() {
        return '30 minuuttia ennen lähtöä';
    }

    public static function getPassengers() {
        $query = Database::select("SELECT * FROM passengers, reservations WHERE "
                        . "passengers.reservation_id = reservations.reservation_id");


        return $query->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

    public static function getPassenger($passenger_id) {
        $query = Database::select("SELECT * FROM passengers, reservations, flights WHERE "
                        . "passengers.reservation_id = reservations.reservation_id AND "
                        . "flights.flight_id ILIKE reservations.flight_id AND "
                        . "passenger_id = :passenger_id", array(':passenger_id' => $passenger_id));
        $query->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $query->fetch();
    }

}
