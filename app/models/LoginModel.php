<?php

class LoginModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function checkLogin($surname, $resId) {
        $sql = "SELECT surname, reservation_id FROM PASSENGERS WHERE "
                . "surname = :surname AND reservation_id = MD5(:resId)";
        $query = getDB()->prepare($sql);
        $query->execute(array(
            ':surname' => $surname,
            ':resId' => $resId
        ));

        return $query->rowCount() > 0;
    }

}
