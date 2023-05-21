<?php

namespace Engine\DI;

class DI
{
    /**
     * @var array
     * Сохрнаяет все зависимости и отсюда можно получать их
     */
    private array $container;

    /**
     * @param  $key
     * @param  $value
     * @return $this
     * Добавляет зависимости в контейнер
     */
    public function set($key, $value): object
    {
        $this->container[$key] = $value;

        return $this;
    }

    /**
     * @param $key
     * @return mixed
     * Возвращение зависимости по ключу из контейнера
     */
    public function get($key): mixed
    {
        return $this->has($key);
    }

    /**
     * @param $key
     * @return mixed
     * Проверяет, есть ли контейнер(по ключу) в массиве контейнеров.
     */
    public function has($key): mixed
    {
        return $this->container[$key] ?? [];
    }
}