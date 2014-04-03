<?php

class Bootstrap {

    function __construct() {

        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

//        print_r($url);

        if (empty($url[0])) {
            if (Session::get('user') != 'employee') {
                require CONTROLLER_PATH . 'index.php';
                $controller = new Index();
                $controller->loadModel();
                $controller->index();
                return;
            } else {
                require CONTROLLER_PATH . 'yllapito.php';
                $controller = new Yllapito();
                $controller->loadModel();
                $controller->index();
                return;
            }
        }

        $file = CONTROLLER_PATH . $url[0] . '.php';
        if (file_exists($file)) {
            require $file;
        } else {
            error();
        }

        $controller = new $url[0];
        $controller->loadModel();

        if (isset($url[2])) {
            if (method_exists($controller, $url[1])) {
                $controller->{$url[1]}($url[2]);
            } else {
                error();
            }
        } else if (isset($url[1])) {
            if (method_exists($controller, $url[1])) {
                $controller->{$url[1]}();
            } else {
                error();
            }
        }


        $controller->render($url[0]);
    }

}
