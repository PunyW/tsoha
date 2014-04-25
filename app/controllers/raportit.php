<?php

class Raportit extends Controller {

    function __construct() {
        parent::__construct();
        checkLogin('employee');
    }

    public function indexAction() {
        $this->setData('reports', Reports::getReports());
    }

    public function view() {
        $form = new Form();
        $form->post('flightId')->post('passengerId')->post('departureTime');
        $this->renderForm($form->fetch());
    }

    private function renderForm($data) {
        $passenger = $data['passengerId'];
        
        $this->setData('passenger', Passenger::getPassenger($passenger));
        $this->setData('orders', Order::getOrder($passenger));
        $this->setData('wishes', Wish::getPassengersWishes($passenger));
        
        $this->render('reportForm');
    }

}
