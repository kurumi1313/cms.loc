<?php

namespace Engine\Service;

use Engine\DI\DI;

abstract class AbstractProvider
{
    /**
     * @var DI
     * У каждого сервиса - провайдер.
     * Переменная получает все зависимости.
     */
    protected DI $di;

    /**
     * @param DI $di
     * Получает из DI весь массив контейнеров.
     */
    public function __construct(DI $di)
    {
        $this->di = $di;
    }

    /**
     * @return void
     * Обязательная для реализации функция инициализации
     */
    abstract function init(): void;
}