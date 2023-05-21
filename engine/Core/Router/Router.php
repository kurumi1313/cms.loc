<?php

namespace Engine\Core\Router;

class Router
{
    /**
     * @var array
     * Хранит роуты.
     */
    private array $routes = [];

    /**
     * @var string
     * Имя сервера/адрес/домен
     */
    private string $host;

    /**
     * @var
     */
    private $dispatcher;

    /**
     * @param $host
     */
    public function __construct($host)
    {
        $this->host = $host;
    }

    /**
     * @param $key
     * @param $pattern
     * @param $controller
     * @param string $method
     * @return void
     * Добавление роутов.
     */
    public function add($key, $pattern, $controller, string $method = 'GET'): void
    {
        $this->routes[$key] = [
          'pattern'    => $pattern,
          'controller' => $controller,
          'method'     => $method
        ];
    }

    /**
     * @param $method
     * @param $uri
     * @return object|null
     */
    public function dispatch($method, $uri): object|null
    {
        return $this->getDispatcher()->dispatch($method, $uri);
    }

    /**
     * @return object
     */
    public function getDispatcher(): object
    {
        if ($this->dispatcher == null) {
            $this->dispatcher = new UrlDispatcher();

            foreach ($this->routes as $route) {
                $this->dispatcher->register($route['method'], $route['pattern'], $route['controller']);
            }
        }

        return $this->dispatcher;
    }
}