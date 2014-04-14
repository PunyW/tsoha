<?php

class Lennontiedot extends Controller {

    function __construct() {
        parent::__construct();
        checkLogin('passenger');
    }

    public function indexAction() {
        $passenger = Session::get('passenger');
        $this->setData('passenger', Passenger::getPassenger($passenger));
        $this->setData('orders', Order::getOrder($passenger));
        $this->setData('wishes', Wish::getWishes());
    }
    
    public function testing() {
        $form = new Form();
        
        $form->post('kasvisruoka')->post('kaytava')->post('ikkuna')->post('jalkatila')
                ->post('toive5')->post('toive6')->post('toive7');
        
        $this->model->confirmWishes($form->fetch(), Session::get('passenger'));
        success('Toiveet välitetty henkilökunnalle.');
        
        redirect('lennontiedot');
    }

}
