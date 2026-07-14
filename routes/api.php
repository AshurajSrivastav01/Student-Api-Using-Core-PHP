<?php

use App\Core\Application;
use App\Controllers\UserController;

$router->get('/users', [UserController::class, 'index']);