<?php

namespace Engine\Core\Database;

use PDO;
use Engine\Core\Config\Config;

class Connection
{
    /**
     * @var object
     * Тут будут хранится соединения с БД.
     */
    private object $link;

    //Создание коннекта
    public function __construct()
    {
        $this->connect();
    }

    /**
     * @return $this
     * Установка соединения с БД
     */
    private function connect(): object
    {
        $config = Config::file('database');

        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['db_name'] . ';charset=' . $config['charset'];

        $this->link = new PDO($dsn, $config['username'], $config['password']);

        //print_r($this->link);
        return $this;
    }

    /**
     * @param $sql
     * @return mixed
     * Подготавливает и возвращает идентификатор запроса
     */
    public function execute($sql): mixed
    {
        $sth = $this->link->prepare($sql);

        return $sth->execute();
    }

    /**
     * @param $sql
     * @return array
     * Выполняет запрос и выдаёт ассоциативный массив
     */
    public function query($sql): array
    {
        $sth = $this->link->prepare($sql);

        $sth->execute();

        $result = $sth->fetchALL(PDO::FETCH_ASSOC);

        if ($result === false) {
            return [];
        }

        return $result;
    }
}