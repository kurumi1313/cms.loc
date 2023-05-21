<?php

namespace Engine\Helper;

class Common
{
    /**
     * @return bool
     * Проверка, является ли запрос пользователя POST
     */
    static function isPost(): bool
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            return true;
        }

        return false;
    }

    /**
     * @return string
     * Возвращает метод запроса пользователя
     */
    static function getMethod(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * @return string
     * Что возвращает?
     */
    static function getPathUrl(): string
    {
        $pathUrl = $_SERVER['REQUEST_URI'];

        if ($position = strpos($pathUrl, '?')) {
            $pathUrl = substr($pathUrl ,0, $position);
        }

        return $pathUrl;
    }
}