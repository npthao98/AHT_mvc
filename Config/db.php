<?php
namespace Config;

use PDO;

abstract class Db
{
    public static function getBdd() {
        $host = "localhost";
        $dbname = "AHT_mvc";
        $username = "root";
        $password = "root";
        static $db = null;

        if ($db === null) {
            $dsn = 'mysql:host=' . $host . ';dbname=' . $dbname . ';charset=utf8';
            $db = new PDO($dsn, $username, $password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return $db;
    }
}
