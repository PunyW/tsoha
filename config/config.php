<?php

// DATABASE CONFIGURATION
define('DB_DSN', 'pgsql:');
define('DB_USERNAME', null);
define('DB_PASSWORD', null);
// END OF DATABASE CONFIGURATION

// App wide salting key for passwords, do not change after setting it up once!
define('SALT_KEY', 'Ostoskassi2014asd');
define('DEFAULT_TITLE', 'Ostoskassi');

define('ROOT_PATH', dirname(dirname(__FILE__)));
define('DS', DIRECTORY_SEPARATOR);
define('APP_PATH', ROOT_PATH . DS . 'app' . DS);
define('URL', dirname($_SERVER['PHP_SELF']) . "/");

define('CONTROLLER_PATH', APP_PATH . 'controllers' . DS);
define('MODEL_PATH', APP_PATH . 'models' . DS);
define('VIEW_PATH', APP_PATH . 'views' . DS);
define('TEMPLATE_PATH', APP_PATH . 'template' . DS);

define('LIB_PATH', APP_PATH . 'libs' . DS);

define('DEFAULT_TEMPLATE', 'default');
define('DEFAULT_ACTION', 'indexAction');

require LIB_PATH . 'Common.php';

