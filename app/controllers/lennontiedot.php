<?php

class Lennontiedot extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function indexAction() {
        $this->setData('passenger', Passenger::getPassenger(Session::get('passenger')));
        $this->setData('orders', Order::getOrder(Session::get('passenger')));
    }

}
