<?php

namespace Engine\Core\Router;

class UrlDispatcher
{
    /**
     * @var array|string[]
     * Массив HTTP-методов/запросов
     */
    private array $methods = [
        'GET',
        'POST'
    ];

    /**
     * @var array|array[]
     */
    private array $routes = [
        'GET'  => [],
        'POST' => []
    ];

    /**
     * @var array|string[]
     */
    private array $patterns = [
      'int' => '[0-9]+',
      'str' => '[a-zA-z\.\-_%]+',
      'any' => '[a-zA-z0-9\.\-_%]+'
    ];

    /**
     * @param $key
     * @param $pattern
     * @return void
     */
    public function addPattern($key, $pattern): void
    {
        $this->patterns[$key] = $pattern;
    }

    /**
     * @param $method
     * @return array
     */
    private function routes($method): array
    {
        return $this->routes[$method] ?? [];
    }

    public function register($method, $pattern, $controller): void
    {
        $convert = $this->convertPattern($pattern);
        $this->routes[strtoupper($method)][$convert] = $controller;
    }

    private function convertPattern($pattern)
    {
        if (!str_contains($pattern, '(')) {
            return $pattern;
        }
        return preg_replace_callback('#\((\w+):(\w+)\)#', [$this, 'replacePattern'], $pattern);
    }

    /**
     * @param $matches
     * @return string
     */
    private function replacePattern($matches): string
    {
        return '(?<' . $matches[1] . '>' . strtr($matches[2], $this->patterns) . ')';
    }

    /**
     * @param $parameters
     * @return array
     */
    private function processParam($parameters): array
    {
        foreach ($parameters as $key => $value) {
            if (is_int($key)) {
                unset($parameters[$key]);
            }
        }

        return $parameters;
    }

    /**
     * @param $method
     * @param $uri
     * @return object|null
     */
    public function dispatch($method, $uri): object|null
    {
        $routes = $this->routes(strtoupper($method));

        if (array_key_exists($uri, $routes)) {
            return new DispatchedRoute($routes[$uri]);
        }
        return $this->doDispatch($method, $uri);
    }

    /**
     * @param $method
     * @param $uri
     * @return DispatchedRoute|void
     */
    private function doDispatch($method, $uri)
    {
        foreach ($this->routes($method) as $route => $controller) {
            $pattern = '#^' . $route . '$#s';
            if (preg_match($pattern, $uri, $parameters)) {
                return new DispatchedRoute($controller, $this->processParam($parameters));
            }
        }
    }
}