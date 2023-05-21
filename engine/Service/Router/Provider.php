<?php

namespace Engine\Service\Router;

use Engine\Service\AbstractProvider;
use Engine\Core\Router\Router;

class Provider extends AbstractProvider
{
    /**
     * @var string
     * Имя подключаемого сервиса
     */
    public string $serviceName = 'router';

    /**
     * @return void
     * Инициализирует новый сервис в DI контейнер.
     * В данном случае - Роутер.
     * Аргумент для создания класса - домен.
     */
    public function init(): void
    {
        $router = new Router('http://cms.loc/');

        $this->di->set($this->serviceName, $router);
    }
}