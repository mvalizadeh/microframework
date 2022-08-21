<?php

use App\Models\User;
use App\Routing\Router;

require_once 'bootstrap/init.php';


$route = new Router();
$route->run();


$user = new User();
// // $user->create($data);
// var_dump($user->find('1'));
// var_dump($user->get());
