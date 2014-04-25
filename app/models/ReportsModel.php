<?php

class Reports {

    private $flight_id;
    private $passenger_id;
    private $departure_time;
    private $firstname;
    private $surname;
    private $flight_number;

    function __construct() {
        
    }
    
    public function getPassengerName() {
        return $this->firstname . ' ' . $this->surname;
    }
    
    public function getFlightNumber() {
        return $this->flight_number;
    }
    
    public function getFlightId() {
        return $this->flight_id;
    }

    public function getPassengerId() {
        return $this->passenger_id;
    }

    public function getFlightTime() {
        return $this->departure_time;
    }
    
    public static function getReports() {
        $query = Database::select("SELECT * FROM reservations, passengers, flights "
                        . "WHERE reservations.flight_id = flights.flight_id AND "
                        . "reservations.reservation_id = passengers.reservation_id");
        
        return $query->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }

}
