<?php

namespace App\Core;

class Router
{
    private array $routes = [];

    public function get(string $uri, callable|array $action): void
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function dispatch(string $method, string $uri): void
    {
        $action = $this->routes[$method][$uri] ?? null;

        if (!$action) {
            http_response_code(404);
            echo json_encode([
                'status' => false,
                'message' => 'Route Not Found'
            ]);
            return;
        }

        if (is_callable($action)) {
            call_user_func($action);
            return;
        }

        [$controller, $method] = $action;

        $instance = new $controller();

        $instance->$method();
    }
}