<?php

class LoginModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function checkLogin($surname, $resId) {
        $query = Database::select("SELECT * FROM passengers WHERE "
                        . "surname = :surname AND reservation_id = :resId", array(
                    ':surname' => $surname,
                    ':resId' => Hash::create('sha512', $resId)));
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $result = $query->fetch();


        if (empty($result)) {
            return false;
        }

        Session::set('passenger', $result['passenger_id']);
        success('Tervetuloa ' . $result['firstname'] . ' ' . $result['surname']);
        return true;
    }

}
