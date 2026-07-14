<?php

namespace App\Core;

use App\Responses\Response;

class Router
{
    private array $routes = [];

    public function get(string $uri, callable|array $action): void
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function post(string $uri, callable|array $action): void
    {
        $this->routes['POST'][$uri] = $action;
    }

    public function put(string $uri, callable|array $action): void
    {
        $this->routes['PUT'][$uri] = $action;
    }

    public function delete(string $uri, callable|array $action): void
    {
        $this->routes['DELETE'][$uri] = $action;
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

        if (!method_exists($instance, $method)) {
            Response::json([
                'success' => false,
                'message' => 'Controller method not found.',
                'data' => null
            ], 500);

            return;
        }

        $instance->$method();
    }
}