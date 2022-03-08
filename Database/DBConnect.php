<?php
namespace Database;

class DBConnect
{
    private static $pdo;

    public static function connect()
    {
        if(self::$pdo == null)
        {
            try {
                self::$pdo = new \PDO("sqlite:" . PATH_TO_SQLITE);
            } catch (\PDOException $e) {
                var_dump($e);
                die;
            }
        }
        return self::$pdo;
    }
}