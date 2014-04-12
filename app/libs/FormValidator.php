<?php

class FormValidator {

    function __construct() {
        
    }

    public function minLength($data, $arg) {
        if (strlen($data) < $arg) {
            return ' tulisi olla vähintään ' . $arg . ' merkkiä pitkä.';
        }
    }

    public function maxLength($data, $arg) {
        if (strlen($data) > $arg) {
            return ' saa olla korkeintaan ' . $arg . ' merkkiä pitkä.';
        }
    }

    public function exactLength($data, $arg) {
        if (strlen($data) != $arg) {
            return ' täytyy olla tasan ' . $arg . ' merkkiä pitkä.';
        }
    }
    
    public function maxValue($data, $arg) {
        if($data > $arg) {
            return ' ei saa olla yli ' . $arg;
        }
    }

    public function minValue($data, $arg) {
        if($data > $arg) {
            return ' täytyy olla yli ' . $arg;
        }
    }

    public function __call($name, $arguments) {
        throw new Exception("$name does not exist inside of: " . __CLASS__);
    }
    
    public function nonInteger($data) {
        if(ctype_digit($data)) {
           return ' ei saa olla pelkkiä numeroita.';
        }
    }

}
