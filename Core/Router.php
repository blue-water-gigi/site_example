<?php
declare(strict_types=1);

namespace Core;

use Core\Middleware\Auth;
use Core\Middleware\Guest;
use Core\Middleware\Middleware;

class Router
{
    protected array $routes = [];


    public function add(string $uri, string $controller, string $method): self
    {
        $this->routes[] = [
            'uri' => $uri,
            'controller' => $controller,
            'method' => $method,
            'middleware' => null,
        ];

        return $this;
    }

    public function get(string $uri, string $controller): static
    {
        return $this->add($uri, $controller, 'GET');
    }

    public function post(string $uri, string $controller)
    {

        return $this->add($uri, $controller, 'POST');

    }

    public function delete(string $uri, string $controller)
    {

        return $this->add($uri, $controller, 'DELETE');

    }

    public function patch(string $uri, string $controller)
    {

        return $this->add($uri, $controller, 'PATCH');

    }

    public function put(string $uri, string $controller)
    {

        return $this->add($uri, $controller, 'PUT');

    }

    public function only($key)
    {
        $this->routes[array_key_last($this->routes)]['middleware'] = $key;
        return $this;
    }


    public function route(string $uri, string $method): mixed
    {
        foreach ($this->routes as $route) {
            if ($route['uri'] === $uri && $route['method'] === strtoupper($method)) {
                // apply the middleware
                Middleware::resolve($route['middleware']);

                return require base_path('Http/controllers/' . $route['controller']);
            }
        }

        $this->abort();
    }

    public function previousUrl(): string
    {
        return $_SERVER['HTTP_REFERER'];
    }

    protected function abort(int $code = 404): never
    {
        http_response_code($code);

        require base_path("views/{$code}.php");

        die();
    }
}

