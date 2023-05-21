<?php

namespace Engine\Service\Database;

use Engine\Service\AbstractProvider;
use Engine\Core\Database\Connection;

class Provider extends AbstractProvider
{
    /**
     * @var string
     * Имя подключаемого сервиса
     */
    public string $serviceName = 'db';

    /**
     * @return void
     * Инициализирует новый сервис в DI контейнер.
     * В данном случае - БД.
     */
    public function init(): void
    {
        $db = new Connection();

        $this->di->set($this->serviceName, $db);
    }
}