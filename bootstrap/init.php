<?php

use App\Core\Request;

define('BASE_URL', 'http://localhost/e-commerce/');
define('BASE_DIR', dirname(__FILE__) . '/../');

require_once BASE_DIR . 'vendor/autoload.php';
require_once BASE_DIR . 'routes/web.php';


$request = new Request();
