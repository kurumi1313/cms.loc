<?php

namespace Engine\Service\View;

use Engine\Service\AbstractProvider;
use Engine\Core\Template\View;

class Provider extends AbstractProvider
{
    /**
     * @var string
     * Имя подключаемого сервиса
     */
    public string $serviceName = 'view';

    /**
     * @return void
     * Инициализирует новый сервис в DI контейнер.
     * В данном случае - Вид.
     */
    public function init(): void
    {
        $view = new View();

        $this->di->set($this->serviceName, $view);
    }
}