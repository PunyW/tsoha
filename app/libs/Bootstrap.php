<?php

class Bootstrap {

    function __construct() {

        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, '/');
        $url = explode('/', $url);

//        print_r($url);

        if (empty($url[0])) {
            require CONTROLLER_PATH . 'index.php';
            $controller = new Index();
            $controller->index();
            return;
        }

        $file = CONTROLLER_PATH . $url[0] . '.php';
        if (file_exists($file)) {
            require $file;
        } else {
            $this->error();
        }

        $controller = new $url[0];
        $controller->loadModel();

        if (isset($url[2])) {
            if (method_exists($controller, $url[1])) {
                $controller->{$url[1]}($url[2]);
            } else {
                $this->error();
            }
        } else {
            if (isset($url[1])) {
                if (method_exists($controller, $url[1])) {
                    $controller->{$url[1]}();
                } else {
                    $this->error();
                }
            }
        }

        $controller->render($url[0]);
    }

    function error() {
        require CONTROLLER_PATH . 'error.php';
        $controller = new Error();
        $controller->render('error');
        return false;
    }

}
