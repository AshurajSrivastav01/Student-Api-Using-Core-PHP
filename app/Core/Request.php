<?php

namespace App\Core;

class Request
{
    private array $get;
    private array $post;
    private array $server;

    public function __construct(){
        // var_dump(file_get_contents('php://input'));
        // die();

        $this->get = $_GET;
        $json = json_decode(file_get_contents('php://input'), true);
        $this->post = !empty($json) ? $json : $_POST;
        $this->server = $_SERVER;
    }

    public function method(): string
    {
        return $this->server['REQUEST_METHOD'];
    }

    public function uri(): string
    {
        return parse_url(
            $this->server['REQUEST_URI'] ?? '/',
            PHP_URL_PATH
        ) ?: '/';
    }

    // public function uri(): string
    // {
    //     var_dump($this->server['REQUEST_URI'] ?? 'REQUEST_URI NOT FOUND');
    //     die();
    // }

    public function input(string $key, mixed $default = null): mixed
    {
        return $this->post[$key] ?? $this->get[$key] ?? $default;
    }

    public function has(string $key): bool
    {
        return array_key_exists($key, $this->all());
    }

    public function all(): array
    {
        return array_merge($this->get, $this->post);
    }

}