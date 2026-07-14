<?php

namespace App\Core;

class Application
{
    public function run(): void
    {

        $router = new Router();

        require_once __DIR__ . '/../../routes/api.php';

        $router->dispatch(
            $_SERVER['REQUEST_METHOD'],
            parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH)
        );

        // echo "Application Started 🚀";
    }
}