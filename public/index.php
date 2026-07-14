<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controllers\UserController;

$userController = new UserController();

echo $userController->index();