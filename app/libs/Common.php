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

function error($error = "404 - File not found") {
    require CONTROLLER_PATH . 'error.php';
    $controller = new Error();
    $controller->setError($error);
    $controller->render('error');
    return false;
}

function success($notice) {
    Session::set('success', $notice);
}

function alert($alert) {
    Session::set('alert', $alart);
}

function redirect($controller = "", $action = "", $data = "") {
    header("Location: " . URL . "{$controller}/{$action}/{$data}");
    exit;
}

function __autoload($class) {
    if ($class == 'assets') {
        return;
    }

    $classPath = MODEL_PATH . $class . "Model.php";

    if (file_exists($classPath)) {
        require $classPath;
    } else {
        throw new Exception("Unable to load {$class}.");
    }
}

function echoActiveClassIfRequestMatches($requestUri) {
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");

    if ($current_file_name == $requestUri) {
        echo 'class="active"';
    }
}
