<?php

function getDB() {
    static $dbh = null;

    if ($dbh === null) {
        $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->query("SET NAMES 'UTF8'");
    }

    return $dbh;
}

function checkLogin($requiredRole) {
    $logged = Session::get('loggedIn');
    $user = Session::get('user');

    if ($logged == false || $user != $requiredRole) {
        Session::destroy();
        error('401 - Unauthorized access');
        exit;
    }
}

function error($error) {
    require CONTROLLER_PATH . 'error.php';
    $controller = new Error();
    $controller->setError($error);
    $controller->render('error');
    return false;
}
