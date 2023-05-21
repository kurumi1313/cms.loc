<?php

namespace Engine\Service\Config;

use Engine\Service\AbstractProvider;
use Engine\Core\Config\Config;

class Provider extends AbstractProvider
{
    /**
     * @var string
     * Имя подключаемого сервиса
     */
    public string $serviceName = 'config';

    /**
     * @return void
     * Инициализирует новый сервис в DI контейнер.
     * В данном случае - Роутер.
     * Аргумент для создания класса - домен.
     */
    public function init(): void
    {
        $config['main']     = Config::file('main');
        $config['database'] = Config::file('database');
        $this->di->set($this->serviceName, $config);
    }
}