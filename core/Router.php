<?php

namespace App\Core;

use Exception;

class Router
{
    public $routes = [
        'GET' => [],
        'POST' => []
    ];

    public static function load($file)
    {
        $router = new static;

        require $file;

        return $router;
    }

    public function get($uri, $controller)
    {
        $this->routes['GET'][$uri] = $controller;
    }

    public function post($uri, $controller)
    {
        $this->routes['POST'][$uri] = $controller;
    }

    public function direct($uri, $requestType)
    {
        foreach ($this->routes[$requestType] as $route => $controller) {

            // Converte {id} em regex
            $pattern = preg_replace('#\{[^/]+\}#', '([^/]+)', $route);
            $pattern = "#^{$pattern}$#";

            if (preg_match($pattern, $uri, $matches)) {

                array_shift($matches); // remove match completo

                return $this->callAction(
                    ...array_merge(explode('@', $controller), [$matches])
                );
            }
        }

        throw new Exception('No route defined for this URI.');
    }

    protected function callAction($controller, $action, $params = [])
    {
        $controller = "App\\Controllers\\{$controller}";
        $controller = new $controller;

        if (!method_exists($controller, $action)) {
            throw new Exception(
                "{$controller} does not respond to the {$action} action."
            );
        }

        return call_user_func_array([$controller, $action], $params);
    }
}
