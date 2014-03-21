
<?php

define('DEFAULT_TITLE', 'Ostoskassi');

define('DB_DSN', 'pgsql:');
define('DB_USERNAME', null);
define('DB_PASSWORD', null);

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

require LIB_PATH . 'Controller.php';
require LIB_PATH . 'Database.php';
require LIB_PATH . 'Model.php';
require LIB_PATH . 'View.php';
require LIB_PATH . 'Template.php';
require LIB_PATH . 'Common.php';
require LIB_PATH . 'Session.php';
require LIB_PATH . 'Bootstrap.php';
