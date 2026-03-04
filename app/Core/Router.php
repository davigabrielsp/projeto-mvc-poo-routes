<?php

namespace App\Core;

class Router {
    private array $routes = [];

    public function get(string $uri, string $action) {
        $this->routes['GET'][$uri] = $action;
    }

    public function post(string $uri, string $action) {
        $this->routes['POST'][$uri] = $action;
    }

    public function dispatch(string $uri, string $method) {
        $uri = parse_url($uri, PHP_URL_PATH);

        if(!isset($this->routes[$method][$uri])){
            http_response_code(404);
            die("Rota não encontrada");
        }

        [$controller, $action] = explode('@', $this->routes[$method][$uri]);

        $controller = "App\\Controllers\\{$controller}";
        $controllerInstance = new $controller;

        call_user_func([$controllerInstance]);
        
    }
}