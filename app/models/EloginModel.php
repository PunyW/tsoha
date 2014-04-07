<?php

class EloginModel extends Model {

    public function __construct() {
        parent::__construct();
    }

    public function checkLogin($username, $pw) {
        $sql = "SELECT username, password FROM employee WHERE "
                . "username = :username AND password = :pw";
        $query = Database::getDB()->prepare($sql);
        $query->execute(array(
            ':username' => $username,
            ':pw' => Hash::create('sha512', $pw)
        ));

        $query->fetchAll();

        return $query->rowCount() > 0;
    }

}
