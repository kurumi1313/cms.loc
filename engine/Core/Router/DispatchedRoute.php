<?php

namespace Engine\Core\Router;

class DispatchedRoute
{
    /**
     * @var string
     * Имя контроллера
     */
    private string $controller;

    /**
     * @var array
     * Массив параметров
     */
    private array $parameters;

    public function __construct($controller, $parameters = [])
    {
        $this->controller = $controller;
        $this->parameters = $parameters;
    }

    /**
     * @return string
     * Получение имени контроллера
     */
    public function getController(): string
    {
        return $this->controller;
    }

    /**
     * @return array
     * Получение массива параметров
     */
    public function getParameters(): array
    {
        return $this->parameters;
    }

}