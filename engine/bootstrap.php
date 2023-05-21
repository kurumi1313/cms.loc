<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Engine\Cms;
use Engine\DI\DI;

/*
 * Конструкция для работы с исключениями
 * Все зависимости DI попадут в Cms
 */
try {
    // Создание DI-контейнера
    $di = new DI();

    // Получение массива сервисов
    $services = require_once (__DIR__ . '/Config/Services.php');

    //Инициализация сервисов
    foreach ($services as $service) {
        $provider = new $service($di);
        $provider->init();
    }

    // Передача DI-контейнера точке запуска Cms
    $cms = new Cms($di);
    $cms->run();

} catch (ErrorException $e) {
    echo $e->getMessage();
}