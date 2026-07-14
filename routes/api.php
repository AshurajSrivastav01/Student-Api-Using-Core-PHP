<?php

use App\Core\Router;
use App\Controllers\UserController;

return function (Router $router): void {
    $router->get('/users', [UserController::class, 'index']);
    $router->post('/users', [UserController::class, 'store']);
    $router->put('/users', [UserController::class, 'update']);
    $router->delete('/users', [UserController::class, 'destroy']);
};