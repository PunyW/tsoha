<?php

class Wish {

    private $wish_id;
    private $description;
    private $wish_name;
    
    function __construct() {
        
    }
    
    public function getName() {
        return $this->wish_name;
    }
    
    public function getId() {
        return $this->wish_id;
    }
    
    public function getDescription() {
        return $this->description;
    }

        
    public static function getWishes() {
        $query = Database::select("SELECT * FROM wish");
        return $query->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }
    
    public static function getWish($wishName) {
        $query = Database::select("SELECT * FROM wish WHERE "
                . "wish_name = :wish_name", array(
                    ':wish_name' => $wishName
                ));
        $query->setFetchMode(PDO::FETCH_CLASS, __CLASS__);
        return $query->fetch();
    }
    
    public static function getPassengersWishes($passenger_id) {
        $query = Database::select("SELECT * FROM wishes, wish WHERE "
                        . "passenger_id = :passenger_id AND "
                        . "wishes.wish_id = wish.wish_id", array(':passenger_id' => $passenger_id));
        return $query->fetchAll(PDO::FETCH_CLASS, __CLASS__);
    }
    
    public static function checkWish($passengerId, $wishName) {
        $wish = Wish::getWish($wishName);
        
        if(empty($wish)) {
            return false;
        }
        
        $query = Database::select("SELECT * FROM wishes WHERE "
                    . "passenger_id = :passenger_id AND wish_id = :wish_id", array(
                        ':passenger_id' => $passengerId,
                        ':wish_id' => $wish->getId()
                    ));
        $query->setFetchMode(PDO::FETCH_ASSOC);
        return $query->fetch();
    }
    
    

}
