<?php

class View {

    function __construct() {
        
    }

    public function render($name) {
        require VIEW_PATH . $name . '.php';
    }

}
