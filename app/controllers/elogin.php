<?php

class Elogin extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function login() {
        $username = $_POST['username'];
        $pw = $_POST['pw'];

        if ($this->model->checkLogin($username, $pw)) {
            // Succesfull login
            Session::set('user', 'employee');
            Session::set('loggedIn', true);
            Session::set('greeting', true);

            header('Location: ' . URL . 'yllapito/');
        } else {
            $this->setData('error', 'Antamasi tunnus tai salasana on väärin.');
            $this->setData('username', $username);
            $this->renderPartial('elogin');
        }
    }

}
