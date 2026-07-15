<?php

namespace App\Core;

class HttpKernel
{
    public function handle()
    {
        $router = new Router();

        $routes = require __DIR__ . '/../../routes/api.php';

        $routes($router);

        $request = new Request();

        $router->dispatch(
            $request->method(),
            $request->uri()
        );
    }
}