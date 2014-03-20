<?php

class Help extends Controller {

    function __construct() {
        parent::__construct();
        echo 'We are inside help';
    }

    public function other($arg = false) {
        require MODEL_PATH . 'helpModel.php';
        $model = new HelpModel();
    }

}
