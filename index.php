<?php

require './config/config.php';

Session::init();
initShoppingCart();

$app = new Bootstrap();
