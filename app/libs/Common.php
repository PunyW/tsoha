<?php

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
    Session::set('success', $notice)

    ;
}

function printNotices() {
    if (Session::get('success')) {
        echo

        '<div class="alert alert-success">';
        echo Session::get('success');
        unset($_SESSION['success']);
        echo '</div>';
    }
    if (Session::get('alert')) {
        echo '<div class="alert alert-danger">';
        echo Session::get('alert');
        unset($_SESSION['alert']);
        echo '</div>';
    }
}

function alert($alert) {
    Session::set('alert', $alert);
}

function redirectBack() {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}

function redirect($controller = "", $action = "", $data = "") {
    $url = URL . "{$controller}/{$action}/{$data}";
    $url = rtrim($url, '/');
    header("

Location: $url");
    exit;
}

function __autoload($class) {
    if ($class == 'assets') {
        return;
    }
    $modelPath = MODEL_PATH . $class . "Model.php";
    $libPath = LIB_PATH . $class . '.php';

    if (
            file_exists($modelPath)) {
        require $modelPath;
    } else if (file_exists($libPath)) {
        require $libPath;
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

function initShoppingCart() {
    if (empty(
                    $_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
}

function addToShoppingCart($productId) {
    array_push($_SESSION['cart'], $productId);
}

function clearShoppingCart() {
    unset($_SESSION['cart']);
}

function

getShoppingCart() {
    return $_SESSION['cart'];
}

function sizeOfShoppingCart() {
    return count($_SESSION['cart'])

    ;
}
