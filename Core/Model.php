<?php

namespace Core;

use PDO;

abstract class Model
{
    /**
     * @return mixed
     */
    protected static function getDB()
    {
        static $db = null;

        if ($db === null) {
            $host = 'localhost';
            $dbname = 'simvc';
            $username = 'user';
            $password = 'secret';

            try {
                $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8",
                    $username, $password);

            } catch (\PDOException $e) {
                echo $e->getMessage();
            }
        }

        return $db;
    }
}