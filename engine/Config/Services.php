<?php

//Хранит массив сервисов
return [
    Engine\Service\Database\Provider::class,
    Engine\Service\Router\Provider::class,
    Engine\Service\Config\Provider::class,
    Engine\Service\View\Provider::class
];