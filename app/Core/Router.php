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

        if(!isset($this->routes[$method])){
            http_response_code(404);
            die("Rota não encontrada");
        }

        foreach($this->routes[$method] as $route => $action){
            // id em regex
            $pattern = preg_replace('#\{[a-zA-Z]+\}#', '([0-9]+)', $route);
            $pattern = "#^{$pattern}$#";
            
            if(preg_match($pattern, $uri, $matches)){
                array_shift($matches);
                [$controller, $methodAction] = explode('@', $action);

                $controller = "App\\Controllers\\{$controller}";
                $controllerInstance = new $controller;

                if(!method_exists($controllerInstance, $methodAction)){
                    die("Método {$methodAction} não existe");
                }

                return call_user_func_array(
                    [$controllerInstance, $methodAction],
                    $matches
                );
            }
        }

        http_response_code(404);
        die('rota não encontrada');
        
    }
}