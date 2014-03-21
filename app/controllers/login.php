<?php

class Login extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function login() {
        $surname = $_POST['surname'];
        $resId = $_POST['resId'];

        if ($this->model->checkLogin($surname, $resId)) {
            // Succesfull login
            Session::set('user', 'passenger');
            Session::set('loggedIn', true);
            Session::set('greeting', true);

            header('Location: ' . URL);
        } else {
            $this->setData('error', 'Antamallasi Sukunimellä ei löytynyt kyseistä varausta.');
            $this->renderPartial('login');
        }
    }
    
    

}
