<?php
declare(strict_types=1);

namespace Core;

class Router
{
    protected array $routes = [];


    public function add(string $uri, string $controller, string $method)
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method
        ];
    }

    public function get(string $uri, string $controller): void
    {
        $this->add($uri, $controller, 'GET');
    }

    public function post(string $uri, string $controller)
    {

        $this->add($uri, $controller, 'POST');

    }

    public function delete(string $uri, string $controller)
    {

        $this->add($uri, $controller, 'DELETE');

    }

    public function patch(string $uri, string $controller)
    {

        $this->add($uri, $controller, 'PATCH');

    }

    public function put(string $uri, string $controller)
    {

        $this->add($uri, $controller, 'PUT');

    }

    public function route(string $uri, string $method): mixed
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                return require base_path($route['controller']);
            }
        }

        $this->abort();
    }

    protected function abort(int $code = 404): never
    {
        http_response_code($code);

        require base_path("views/{$code}.php");

        die();
    }
}

