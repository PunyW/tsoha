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

    public function confirmWishes() {
        $form = new Form();

        $form->post('kasvisruoka')->post('kaytava')->post('ikkuna')->post('jalkatila')
                ->post('toive5')->post('toive6')->post('toive7');

        $data = $form->fetch();
        $wishesToBeRemoved = $this->checkExistingWishes($data);

        $this->model->confirmWishes($data, Session::get('passenger'), $wishesToBeRemoved);
        success('Toiveet välitetty henkilökunnalle.');

        redirect('lennontiedot');
    }
    
    public function cancelOrder() {
        Order::cancel(Session::get('passenger'));
        success('Tilaus peruttu');
        redirect('lennontiedot');
    }

    private function checkExistingWishes($data) {
        $remove = array();
        $passengerWishes = Wish::getPassengersWishes(Session::get('passenger'));
        foreach ($passengerWishes as $value => $wish) {
            if (!$this->checkWish($wish->getName(), $data)) {
                $remove[] = $wish->getId();
            }
        }
        return $remove;
    }

    private function checkWish($name, $data) {
        foreach ($data as $value => $key) {
            if ($name == $value) {
                return true;
            }
        }
        return false;
    }

}
